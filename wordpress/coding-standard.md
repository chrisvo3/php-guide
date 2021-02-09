# PHP Coding Standard

> https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/

## Single and Double Quotes

Use single if not evaluating anything in the string, almost never have to escape quotes in a string, because you can just alternate your quote style:

```php
echo '<a href="/static/link" title="Yeah yeah!">Link name</a>';

echo "<a href='$link' title='$linktitle'>$linkname</a>";
```

Text that goes into attributes should be run through esc_attr() so that single or double quotes do not end the attribute value and invalidate the HTML and cause a security issue.

[Check out Attribute](https://codex.wordpress.org/Data_Validation#Attribute_Nodes)

## Indentation

Use real `tabs` and not `spaces`, as this allows the most flexibility across clients. Block of code would be more readable if things are aligned, use spaces:

Align `=` using `space`

```php
    $foo   = 'somevalue';
    $foo2  = 'somevalue2';
    $foo34 = 'somevalue3';
    $foo5  = 'somevalue4';
```

*Each item* in `array` should start on new line if the `array` contain more than 1 item. The last array item is recommended to have a comma at the end.

```
$query = new WP_Query( array( 'ID' => 123 ) );

$args = array(
    'post_type'   => 'page',
    'post_author' => 123,
    'post_status' => 'publish',
);
 
$query = new WP_Query( $args );
```

`Tabs` should be used at the beginning of the line for identation, while `spaces` can be used mid-line for alignment.

## Brace Style

Brace means *single-statement inline control structures* are prohibited. Braces shall be used for all blocks in the style:

```php
if ( condition ) {
    action1();
} else {
    defaultaction();
}
```

However, alternative syntax for control structure: `if` & `endif`, `while` & `endwhile`, `foreach` & `endforeach` can be use especially in template where php code is embedded within HTML.

```php
<?php if ( have_posts() ) : ?>
    <div class="hfeed">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID() ?>" class="<?php post_class() ?>">
                <!-- ... -->
            </article>
        <?php endwhile; ?>
    </div>
<?php endif; ?>
```

## Use `elseif`, not `else if`

`else if` is not compatible with colon syntax for `if | elseif` blocks.

## Declaring Arrays

Array must be declared using long array syntax. Use long array syntax like `array()` for declaring arrays is more readable thatn short array syntax like `[]`.

## Closures (Anonymous Functions)

Closures may be used as an alternative to creating new functions to pass as callbacks.

```php
$caption = preg_replace_callback(
    '/<[a-zA-Z0-9]+(?: [^<>]+>)*/',
    function ( $matches ) {
        return preg_replace( '/[\r\n\t]+/', ' ', $matches[0] );
    },
    $caption
);
```

Closure must not be passed as filter or action callbacks, they cannot be removed by `remove_action()` or `remove_filter()`.

## Multiline Function Calls

When the function call has multiple parameters, they must be on seperate line. Single line comments can take up their own line.

Each parameter must take up no more than a single line. Multi line parameter values must be assigned to a variiable and then that variable should be passed to the function call.

```php
$bar = array(
    'use_this' => true,
    'meta_key' => 'field_name',
);
$baz = sprintf(
    /* translators: %s: Friend's name */
    esc_html__( 'Hello, %s!', 'yourtextdomain' ),
    $friend_name
);
 
$a = foo(
    $bar,
    $baz,
    /* translators: %s: cat */
    sprintf( __( 'The best pet is a %s.' ), 'cat' )
);
```

## Regular Expressions

## Opening and Closing PHP Tags

When embedding multi-line PHP snippets within an HTML block, the PHP open and close tags must be on a line by themselves.

Multi-line

```php
function foo() {
    ?>
        <div>
        <?php
        echo bar(
            $baz,
            $bat
        );
        ?>
        </div>
    <?php
}
```

Single line

```php
<input name="<?php echo esc_attr( $name ); ?>" />
```

## No Shorthand PHP Tags

Never use shorthand PHP start tags. Always use full PHP tags.

```php
// full php tags
<?php ... ?>
<?php echo $var; ?>

//short php tags
<? ... ?>
<?= $var ?>
```

## Remove Trailing Spaces

Remove trailing whitespace at the end of each line of code.

## Naming Conventions

Use lowercase letters in variable, action/filter, and function names (never camelCase). Separate words via underscores.

```php
function some_name( $some_variable ) { [...] }
```

Class names should use capitalized words separated by underscores. Any acronyms should be all upper case.

```php
class Walker_Category extends Walker { [...] }
class WP_HTTP { [...] }
```

Constants should be in all upper-case with underscores separating words:

```php
define( 'DOING_AJAX', true );
```

Files should be named descriptively using lowercase letters. Hyphens should separate words

```
my-plugin-name.php
```

Class file names should be based on the class name with class- prepended and the underscores in the class name replaced with hyphens, for example WP_Error becomes

```
class-wp-error.php
```

## Yoda Condition

This applies to ==, !=, ===, and !==. Yoda conditions for <, >, <= or >= are significantly more difficult to read and are best avoided.

```php
if ( true === $the_force ) {
    $victorious = you_will( $be );
}
```
