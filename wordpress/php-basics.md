# PHP Programming Basics

## PHP Files
PHP Files end have `.php` at the end.  This means they can include PHP code.  However, they can also include HTML code as well.  This is not really the best practice in the larger web development world, but is quite common in WordPress.

Although PHP files can include PHP, all PHP must be wrapped inside a PHP Block.

## PHP Block
A PHP Block looks like this.

```php
<?php 
  // This is a message inside a PHP block
?>
```

You can see a PHP block opens with `<?php` then has whatever code is needed and closes with `?>` at the end.

Some files will contain one large PHP block and interestingly, some all PHP files in WordPress do not have the closing `?>` at the end but it does not break the code.  Generally though you need to make sure to both open and close your PHP blocks.

Other files, especially template files, contain both HTML and PHP block mixed together like this.

```php
<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?>>
 
  <header class="entry-header">
 
    <?php the_title( '<h1>', '</h1>' ); ?>
 
  </header>
 
  <div class="entry-content">
 
    <?php the_content(); ?>
 
  </div>
 
</article>
```

Notice that a lot of this is HTML with some PHP blocks and PHP code mixed together.  In time you will get comfortable looking through and working with PHP blocks like this.

## Basic PHP Syntax

PHP has a two rules that we want to follow:

- Always put PHP inside of PHP blocks

- End all lines (or statements) with a semicolon

- Comments start with a // or go inside of /* */

We will learn more about syntax as we go, but this is an important start.

## Variables
A variable is a way to temporarily store values in memory.  

Variables names start with a `$` and should use an `_` (underscore) rather than spaces or camelCaseStyle.

```php
$first_name = "Zac";
$last_name = "Gordon";
$full_name = $first_name . " " . $last_name;
```

Strings of text should appear between single or double quotation marks like above. Spaces are possible inside of strings.

To combine strings or variables use a `.` (period) to concatenate them together.

## Echo
When you want to display something on a page with PHP you will often use echo.

```php
$name = "Zac Gordon";
echo $name; // Displays Zac Gordon on the page
Note that if you have an array or object saved as a variable then echo will not work.  In those cases you may have to use something like var_export below.

<pre>
<?php var_export( $posts ); // Displays a list of posts ?>
</pre>
```

Later in this course you will see code like this above when we want to output variables that contain more than just a string of text.  One example of such variables would be arrays.

## Arrays
Arrays are variables that store multiple values.

Here are some examples of arrays:

```php
$post_ids = [ 1, 2, 3, 4 ];
 
$post_titles = [
  'Hello World',
  'PHP for WordPress',
  'WP Development'
];
```

When creating an array we start the same way as when creating a normal variable.  Then after the `=` we open and close square brackets `[` `]`.  

It is possible to put line breaks between the square brackets.  If you are adding numbers you do not need quotation marks, but if you are adding in strings of text you need to wrap the text in single or double quotes.

When getting data from arrays it's helpful to use a `foreach` loop.

## Foreach Loop
A `foreach` loop will let you repeat a set of actions on each item in an array, one after another.

```php
$posts = [
  'Hello World',
  'PHP for WordPress',
  'WP Development'
];
 
foreach( $posts as $post ) {
  echo $post;
}
```

Notice that we have an array of posts and then the foreach with `$posts` as $post inside of parenthesis. `$posts` should be the name of the array we want to loop through.  $post is a name we make up on the spot for what we want to refer to a single item in the array as.  You can call it anything.

```php
$ids = [ 1, 2, 3 ];
 
foreach( $ids as $id ) {
  echo $id;
}
```

Notice in this example above we have an array called `$ids` and then decide to call an individual item in that array `$id`.  Then inside of our loop we can do whatever we want with `$id`.

These loops will repeat starting with the first item in the array and going until the end.

## Functions
Functions let us write, call and reuse blocks of code.  They are quite common in WordPress and lot of what we do when writing PHP in WordPress is call custom WordPress functions that have already been written for us.

Here is what a function looks like:

```php
// The function declaration - does not run yet
function display_post( $title ) {
  echo "<h3>$title</h3>";
}
 
// The function call - used when want function to run
display_post( "Hello PHP!" ); 
```

A function contains two parts:

The function declaration, or where you write out the reusable code.  Functions can take parameters (in this case the `$title`) that can be passed into the function.  A function declaration does nothing until it is called
The function call is when the function runs.  You can call a function multiple times.  If there are any parameters or values you want to pass into the function you can do that when you call it.  Calling a function involves writing its name followed by two parenthesis `()`.
Here is a simpler function that does not have parameters.

```php
// The function declaration - does not run yet
function say_hello() {
  echo "<h2>Hello</h2>";
}
 
// The function call - used when want function to run
say_hello();
say_hello();
```

Notice in this case we called the function twice, showing the reusable nature of working with functions.

To start off with WordPress we will not have to write too many of our own functions, but we will call a lot of WordPress functions.

## Next Up
You may need to come back to review the content above a number of times before it becomes second nature.  However, in the next section we are going to work on putting some of what we have learned here into practice.