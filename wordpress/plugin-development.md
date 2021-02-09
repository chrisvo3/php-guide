# Plugin Developement

## Setting Up Plugin

The folder name of the plugin need to have the matching namespace as the file name.

`admin-credit > admin-credit.php`

## Settting Pages

> This is menu item / high level pages

Custom function with wordpress function `add_menu_page()`. This custom function will be hook to `admin_menu`, which get call whenever the admin menu is build.

```php
function wpplugin_settings_page() {
    add_menu_page(
        'Plugin Name', // Name of the page itself, that appear on page
        'Plugin Menu', // Name of the menu, show up in the menu
        'manage_options', // typical user role capability to edit options
        'wpplugin', // slug for the url
        'wpplugin_settings_page_markup', // callback function to add content to the page
        'dashicons-wordpress-alt', // wordpress icon or customed one
        100, // prioty or order to place it on menu
    );
}
add_action( 'admin_menu', 'wpplugin_settings_page' );
```

The call back function to add content to the page that the function `wpplugin_settings_page()` called above.
```php
// call back function
function wpplugin_settings_page_markup() {

    // double check user capabilities - security practice
    if ( ! current_user_can( 'manage_options' ) ) {
        return;
    }
    ?>
    <!-- any html code or another php code -->
    <?php
}
```

## Setting Sub Pages

> If the case that you have to build robust pages

Let's say you already create a high level menu page with slug name `wpplugin` such as the code below:
```php
// high level menu page
add_menu_page(
    __( 'Plugin Name', 'wpplugin' ),
    __( 'Plugin Menu', 'wpplugin' ),
    'manage_options',
    'wpplugin', // slug on the page
    'wpplugin_settings_page_markup',
    'dashicons-wordpress-alt',
    100
);
```

You can create the sub page under one that already created.

```php
function wpplugin_settings_pages() {

    add_submenu_page(
        'wpplugin', // name of the page - the high level menu page
        __( 'Plugin Feature 1', 'wpplugin' ), // Name that appear on page
        __( 'Feature 1', 'wpplugin' ), // Name of the menu, show up in the menu
        'manage_options',  // typical user role capability to edit options
        'wpplugin-feature-1', // slug for the url
        'wpplugin_settings_subpage_markup' // callback function to add content to the page
    );

    add_submenu_page(
        'wpplugin',
        __( 'Plugin Feature 2', 'wpplugin' ),
        __( 'Feature 2', 'wpplugin' ),
        'manage_options',
        'wpplugin-feature-2',
        'wpplugin_settings_subpage_markup'
    );
}

add_action( 'admin_menu', 'wpplugin_settings_pages' );
```

Unless you want to create a sub page under an already created menu page by wordpress such as `Appearance`. There are many way to do that.

```php
// Can add page as a submenu using the following:
add_dashboard_page() // sub-page under dashboard
add_posts_page() // sub-page under post
add_media_page() // sub-page under media
add_pages_page() // sub-page under page
add_comments_page() // sub-page under comments
add_theme_page() // sub-page under theme
add_plugins_page() // sub-page under plugin
add_users_page() // sub-page under user
add_management_page() // sub-page under management
add_options_page() // sub-page under option
```

An example that use one of these function

```php
function wpplugin_default_sub_pages() {
    add_dashboard_page(
        __( 'Cool Default Sub Page', 'wpplugin' ), // Title/Name appear on the page
        __( 'Custom Sub Page', 'wpplugin' ), // Name that appear on menu
        'manage_options', // user capabilities
        'wpplugin-subpage', // slug name of this sub page
        'wpplugin_settings_page_markup' // call back function
    );
}
add_action( 'admin_menu', 'wpplugin_default_sub_pages' );
```

Another way to do this is to look at the URL of the menu page that want to work on. Such as

```
mywebsite.local/wp-admin/tools.php
```

Then use the function `add_submenu_page()` to add sub page to that WordPress menu.

```php
add_submenu_page(
    'tools.php',
    __( 'Plugin Feature 2', 'wpplugin' ),
    __( 'Feature 2', 'wpplugin' ),
    'manage_options',
    'wpplugin-feature-2',
    'wpplugin_settings_subpage_markup'
);
```

## Link to Settings

This is useful when trying to redirect user to the page that we created in our plugin.

After we add all the menu pages and sub menu pages that we need. We use function `add_filter()`.

```php
// Add a link to your settings page in your plugin
function wpplugin_add_settings_link( $links ) {
    // link to our setting page
    $settings_link = '<a href="admin.php?page=wpplugin">' . __( 'Settings', 'wpplugin' ) . '</a>';
    array_push( $links, $settings_link );
    return $links;
}

$filter_name = "plugin_action_links_" . plugin_basename( __FILE__ );
add_filter( $filter_name, 'wpplugin_add_settings_link' ); // hook in the function that we want to hook in
```

What is this:

Hook in a filter that called `plugin_action_links_` 

`plugin_basename( __FILE__ );` is unique identifier url for our plugin

## Plugin File Paths

Helpful any time that you need to link to a file that's inside your plugin from anotehr file of your plugin.

`plugin_basename( __FILE__ );` pass in a parameter usually from our plugin in root file where we set all to of these up. Take from plugin folder into main directory and main plugin file.

- Example: `plugin-name / plugin-name.php`

`plugin_dir_path( __FILE__ );` give a path from the root of our server to where our plugin folder is. Sometime we need this type of path.

- Example: `/ app / public / wp-content / plugins / plugin-name /`

`plugins_url();` In other case, we need actual URL such as loading javascript file or css file. This take us to the root of our plugin folder.

- Example: `http://mysite.local/wp-content/plugins`

`plugins_url( 'includes', __FILE__ );` pass paramenter into the plugin to url function. path `includes` which is our main root plug in file. This will have full url to plugin folder

- Example: `http://mysite.local/wp-content/plugins/plugin-name/includes`

`plugin_dir_url( __FILE__ );` put us directly into the plugin folder itsself

- Example: `http://mysite.local/wp-content/plugins/plugin-name/`

## Enqueueing CSS

During a large scale of web development, it is better to split front end and admin in two seperate folders directory.

To enqueue `CSS`, we use `wp_enqueue_style()`.

```php
// Load CSS on all admin pages
function wpplugin_admin_styles() {
    wp_enqueue_style(
        'wpplugin-admin',
        WPPLUGIN_URL . 'admin/css/wpplugin-admin-style.css', // use constant and path
        [], // null dependency set up
        time() // only time() during development
    );
}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );

// Load CSS on the frontend
function wpplugin_frontend_styles() {
    wp_enqueue_style(
        'wpplugin-frontend',
        WPPLUGIN_URL . 'frontend/css/wpplugin-frontend-style.css',
        [],
        time()
    );
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_styles', 100 );
```

*What happen?*

`WPPLUGIN_URL` is the constant that set up in `plugin-name.php` right under `plugin-name` folder. This help us to get proper path to our plug in

```php
define( 'WPPLUGIN_URL', plugin_dir_url( __FILE__ ) );

include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-styles.php');

include( plugin_dir_path( __FILE__ ) . 'includes/wpplugin-menus.php');
```

## Enqueueing JS

Similar to enqueue css, enqueue js use `wp_enqueue_script()`

```php
// Load JS on all admin pages
function wpplugin_admin_scripts() {
    wp_enqueue_script(
        'wpplugin-admin',
        WPPLUGIN_URL . 'admin/js/wpplugin-admin.js',
        ['jquery'],
        time()
    );

}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_scripts', 100 );


// Load JS on the frontend
function wpplugin_frontend_scripts() {
    wp_enqueue_script(
        'wpplugin-frontend',
        WPPLUGIN_URL . 'frontend/js/wpplugin-frontend.js',
        [],
        time()
    );
}
add_action( 'wp_enqueue_scripts', 'wpplugin_frontend_scripts', 100 );

```

## Enqueueing Conditionally

This allow you to load your css and js sometime, and not always because you don't want to load your js or css every single admin page or every front end page.

In order to do that, we break off the `enqueue_style` / `enqueue_scripts` into 2 seperate stages. We `wp_register_style` first, then we `wp_enqueue_style` when our top level page is hooked, when we hook into `admin_enqueue_scripts`.

`$hook` of the actual page that we've on. This will check to see if we specifically on that page.

```php
// Conditionally load CSS on plugin settings pages only
function wpplugin_admin_styles( $hook ) {
    wp_register_style(
        'wpplugin-admin',
        WPPLUGIN_URL . 'admin/css/wpplugin-admin-style.css',
        [],
        time()
    );

    if( 'toplevel_page_wpplugin' == $hook ) {
        wp_enqueue_style( 'wpplugin-admin' );
    }
}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_styles' );
```

Or same when enqueue script conditionally. In here, we `wp_localize_script` which allow us to send custom variable to our front end using javascript. So this would make a global variable `wpplugin` and a variable `'hook'` available.

```php
// Conditionally load JS on plugin settings pages only
function wpplugin_admin_scripts( $hook ) {
    wp_register_script(
        'wpplugin-admin',
        WPPLUGIN_URL . 'admin/js/wpplugin-admin.js',
        ['jquery'],
        time()
    );

    wp_localize_script( 'wpplugin-admin', 'wpplugin', [
        'hook' => $hook
    ]);

    if( 'toplevel_page_wpplugin' == $hook ) {
        wp_enqueue_script( 'wpplugin-admin' );
    }
}
add_action( 'admin_enqueue_scripts', 'wpplugin_admin_scripts' );
```

You can test your code with `console.log( wpplugin.hook );`

## Saving Data to Options Table



