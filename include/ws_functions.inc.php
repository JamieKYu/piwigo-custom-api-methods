<?php

function ws_custom_get_infos($params, &$service) {
    global $service;

    if (!isset($params['image_ids']) || !is_string($params['image_ids'])) {
        return new PwgError(400, 'Invalid input: image_ids must be a comma-separated string of integers.');
    }

    // Convert the comma-separated string into an array of integers
    $image_ids = array_filter(
        array_map('intval', explode(',', $params['image_ids']))
    );

    if (empty($image_ids)) {
        return new PwgError(400, 'No valid image IDs provided.');
    }

    $results = [];

    // Use Piwigo's API to fetch image information using the 'pwg.images.getInfo' method
    foreach ($image_ids as $image_id) {
        $params = ['image_id' => $image_id];

        // Call the web service method 'pwg.images.getInfo' to get the image info
        $image_info = $service->invoke('pwg.images.getInfo', $params);

        if (is_a($image_info, 'PwgError')) {
            continue;
        }

        $results[] = $image_info;
    }

    return ['images' => $results];
}

// Register the custom method
global $service;

if (!isset($service) || !is_object($service)) {
    error_log("Piwigo web service object (\$service) is not initialized.");
    return;
}

$service->addMethod('pwg.custom.getInfos', 'ws_custom_get_infos',
    array(
        'image_ids' => array()
    ),
    'Fetches details of multiple images based on a comma-separated string of image IDs'
);
