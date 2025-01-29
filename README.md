# piwigo-custom-api-methods

This Piwigo plugin allows you to create custom API methods for interacting with your Piwigo gallery. You can extend the Piwigo web service functionality by adding your own custom methods that respond to specific API requests.

## Installation Instructions

### 1. **Download the Plugin**

Download the **piwigo-custom-api-methods** plugin from the repository or copy the plugin folder from your local system.

### 2. **Copy the Plugin Folder**

- Copy the `piwigo-custom-api-methods` folder into the `plugins` directory of your Piwigo installation.

  Example:
  - If your Piwigo installation is in `/var/www/html/piwigo`, copy the folder to:
    ```
    /var/www/html/piwigo/plugins/piwigo-custom-api-methods
    ```

### 3. **Activate the Plugin**

- Log in to your Piwigo admin panel.
- Navigate to the **Administration** page.
- Go to **Plugins** → **Manage Plugins**.
- Find **Custom API Methods** in the list of available plugins.
- Click the **Activate** button next to **Custom API Methods**.

### 4. **Verify Plugin Activation**

After activation, you should see **Custom API Methods** listed under **Manage Plugins** as "Active." This means the plugin has been successfully activated and is ready for use.

## Testing the Plugin

### **Test Custom API Method**

After activating the plugin, you can test your custom API method using the following steps.

#### Example API Request

Use the following example `curl` request to call your custom API method (`pwg.custom_images_info`):

```bash
curl -X GET "https://your-piwigo-site/ws.php?method=pwg.custom_images_info&image_ids=1,2,3"

- Replace your-piwigo-site with your Piwigo instance URL.
- This example assumes you have added an API method that fetches image details based on a list of image IDs.
