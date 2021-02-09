# AJAX in WordPress

> From https://wordpress.stackexchange.com/questions/276960/confused-on-ajax-submit-form-through-page-template

## 4 Fundamental Steps:

1. Send a request to the server asynchronously

2. Process the server side tasks

3. Retrieve the response from the server

4. Make changes to the client side based on the server's response

## Creating a Request to Server

There are many ways and methods to do this. This can be done both by jQuery and JavaScript. However, since jQuery made it easier, I'm going to use that. jQuery offers 3 different functions with similar functionality. These functions are:

* `$.ajax();` - Supports both POST and GET methods

* `$.get();` - Simple GET method

* `$.post()`; - Simple POST method

A sample code to the server, and then show a message based on server's response. Let's declare a jQuery function that handles our submission.

```javascript
function sendMyForm( string ) {
    // Begin an Ajax request
    $.ajax({
        type: 'POST',                   // Submission method
        url: url_object.url_string + '/wp-json/darthvader/ajax_submission', // I will explain this later
        data: { username : string },        // Data to be sent to server
        dataType: 'json',               // You should set this to JSON if you are going to use the REST api
        beforeSend: function(){         // Let's show a message while the request is being processed
            $('#status').html('<span>Processing</span>');
        },
        success: function ( response ) {
            // The Ajax request is successful. This doesn't mean the
            // sever was able to do the task, it just means that the
            // server did send a response. So, let's check the response
            if( response.success == true ) {
                $('#status').html('<span>Success</span>');
                $('#message').html('<span>' + response.message + '</span>');
            } else {
                $('#status').html('<span>Failed</span>');
                $('#message').html('<span>' + response.message + '</span>');
            }
        },
        error: function(){              // The request wasn't successful for some reason
            $('#status').html('<span>Unknown error.</span>');
        }
    });
};
```

Okay, now we need to bind an action to our button. There are many ways to do this too. For example, prevent form submission, serialization of data, and more. I'm not even going to create a form.

I'm going to create a custom HTML div to demonstrate we don't even need a form. Here is our HTML that looks like a form:

```html
<div>
    <p id="status"></p>
    <p id="message"></p>
    <input id="my-input" type="text"/>
    <span id="button">This is our button!</span>
</div>
```

Now let's bind a clink action to our button, which is actually not a button! Tricked you.

```javascript
$('#button').on('click',function(){
    // Get the value of our input box
    var username = $('#my-input').val();
    // Call our Ajax function and pass the username to it
    sendMyForm( string );
});
```

Alright, now the form will be submit on user's click.

## Creating a Route to Process the Request

Since I've declared the data type as `JSON`, I'm going to use the `REST API` that outputs our content as `JSON` by default.

You can use anything you wish such as `admin ajax`, as long as it's a good practice, and doesn't impact performance or cause a security issue.

Let's register a `REST` route for now.

```php
add_action( 'rest_api_init','my_rest_route' ); 
function my_rest_route() {
    register_rest_route( 
        'darthvader',   // Base path here
        '/ajax_submission/',    // Child path
        array(
            'methods' => 'POST',
            'callback' => 'darth_contact_form'
        ) 
    );
}
```

Let's handle the received data

```php
function darth_contact_form( \WP_REST_Request $request ){
    // Get the data that was sent to server
    $data = $request['username'];
    // Check if it's empty and send the response
    if( !empty( $data ) ){
        // Remember these from our Ajax call? This is where we set them
        $response['status'] =  true;
        $response['message'] =  'You have entered a username!';
    } else{
        $response['status'] =  false;
        $response['message'] =  'Why didn\'t you enter a username?';
    }
    // Don't forget to return the data
    return $response;
}
```

## A Final Touch

The line

`url: url_object.url_string`

This is the path to our REST route. Since the domain may change, it's wise to form this dynamically, by using `wp_localize_script`. To do this, we save all our scripts into a file named `script.js` and then enqueue & localize it.

```php
wp_enqueue_script( 'my-script', get_template_directory_uri().'/js/script.js', array( 'jquery' ), '', true );

$localized = array(
    'url_string' => site_url(), // This is where that url_string came from
);
wp_localize_script( 'my-script', 'url_object', $localized );
```

Now we can access the `site_url();` by using `url_object.url_string` in our script!

