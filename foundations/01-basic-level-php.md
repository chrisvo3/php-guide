# Basic Fundamental of PHP

## What is PHP?

PHP is server-side scripting language. A script only runs in response to an event. It also usually runs a set of instruction by working down the page from the start to the end. It has low or no user interaction after that initial event.

PHP does not run until a web page is requested. Then it launches, follows its instruction from top to bottom, and then quits until another action launches the script again.

### Script language vs Programming Language

A programming language runs even when not responding to evenets. It continues to run until wait for interaction, whether that interaction comes from a user making choices, or from other programs or input.

A program also jumps around its instructions a lot more, so there's often not a clear start and end point. It often involves lots of user interaction.

### Blurred line

As scripts getting more complex, they start to reseumble programs. And the simplest programs, they are just basically scripts.

### Server side vs Client side

Client-side is opposite to server side. The code run on our web server, which is server-side; or does on user's computer, which is client-side. When working on web page, the user's browser is client-side.

Constrast to this, JavaScript is an example of a popular scripting language. But JavaScript is a client-side scripting language. JavaScript code is sent to the user's browswer, then it does its work there. 

PHP never sent to the user, it runs entirely on the web server, and the results of that code is what's sent to the user's browser. PHP cannot run on its own because it runs on the web server. That means it need to have a running web serviver in order to use. PHP code does not need to be compiled. It is executed by the web server exactly as it's written.

While other code like C or Java require the code to be compiled, or translated into another form before it can be used.

PHP help create dynamic pages. Page content can change based on conditions, such as interactions with the user, or data stored in database. You can think of PHP as turbo charging your HTML.

## PHP Code

`<?php` is opening of the PHP tag, and `?>` is ysed to close the PHP tag.

To learn more about what PHP version you are using, you can use `<?php phpinfo(); ?>`. PHP doesn't care about white space.

These are the same tags but omitting the letter `php` from it, but they are also a bad forms to use.

```php
<?      ?>
<?=     ?>
```

ASP-Stlye Tags (very bad form) - Microsoft version of PHP
```php
<%      %>
<%=     %>
```

PHP is portable, which means you can use it on Window, Mac, or Linux. When using it in different tags, means you have to enable `php.init`, which it won't allow PHP to be portable anymore.

## String

`echo` this will send to user's browswer, and print out whever that come after echo.

```php
$name = Java;
echo 'Hello World!'; // Hello World!
echo 'Hello World, ' . $name . '!'; // Hello World, Java!
echo 2 + 3; // 5

// Single quote vs Double quote
echo "$name here"; // Java here
echo '$name here'; // $name here

// best way
echo "{$name} here"; // Java here
```

String can be concat with `.` such as

```php
$first = "The quick brown fox";
$second = " jumped over the lazy dog.";
  
$third = $first; // "The quick brown fox"
$third .= $second; // "The quick brown fox jumped over the lazy dog."
```

PHP also have documents with all these functions of what you can do with strings.

`strtolower()` : Turn string to lowercase

```php
// $third = "The quick brown fox jumped over the lazy dog."

strtolower($third);
// the quick brown fox jumped over the lazy dog.
```

`strtoupper()` : Turn string to uppercase

```php
// $third = "The quick brown fox jumped over the lazy dog."

strtoupper($third);
// THE QUICK BROWN FOX JUMPED OVER THE LAZY DOG.
```

`ucfirst()` : Turn string to uppcase first letter

```php
// $third = "The quick brown fox jumped over the lazy dog."

ucfirst($third);
// The quick brow fox jumped over the lazy dog.
```

`ucwords()` : Turn string to uppcase words

```php
// $third = "The quick brown fox jumped over the lazy dog."

ucwords($third);
// The Quick Brown Fox Jumped Over The Lazy Dog.
```

`strlen()` : Get length of the string

```php
// $third = "The quick brown fox jumped over the lazy dog."

strlen($third);
// 45
```

`trim()` : Trim the string

```php
echo "A" . trim(" B C D ") . "E";
// AB C DE
```

`strstr()` : Find the string in string

```php
// $third = "The quick brown fox jumped over the lazy dog."

strstr($third, "brown");
// brown fox jumped over the lazy dog.
```

`str_replace()` : Replace string1 by string2 in a string

```php
// $third = "The quick brown fox jumped over the lazy dog."

str_replace("quick", "super-fast", $third);
// The super-fast brown fox jumped over the lazy dog.
```

`str_repeat()` : Repeat

```php
// $third = "The quick brown fox jumped over the lazy dog."

str_repeat($third, 2);
// The quick brown fox jumped over the lazy dog.The quick brown fox jumped over the lazy dog. 
```

`substr()` : Make substring

```php
// $third = "The quick brown fox jumped over the lazy dog."

substr($third, 5, 10);
// uick brown
```

`strpos()` : Find position 

```php
// $third = "The quick brown fox jumped over the lazy dog."

strpos($third, "brown");
// 10
```

`strchr()` : Find character

```php
// $third = "The quick brown fox jumped over the lazy dog."

strchr($third, "z");
// zy dog.
```

## Numbers in PHP 

**Integers :** 

Basic operation that must known by now:

```php
$a = 6;
$b = 3;

$c = $a + $b; // $c = 9
$a += $b // $a = $a + b -> $a = 9

$c = $a - $b; // $c = 3
$a -= $b // $a = $a + b -> $a = 3

$c = $a * $b; // $c = 18
$a *= $b // $a = $a * b -> $a = 18

$c = $a / $b; // $c = 2
$a /= $b // $a = $a / b -> $a = 2

// increment
$b++;

// decrement
$b--;
```

Beside doing basic operation like `+`, `-`, `/`, `*`. PHP also have other functions that can be used such as:

`abs()` : absolute value

```php
abs(0 - 300);
// 300
```

`pow()` : exponential

```php
pow(2, 8);
// 256
```

`sqrt()` : square root

```php
sqrt(100);
// 10
```

`fmod` : modulo

```php
fmod(20, 7);
// 6
```

`rand()` : random or random(min, max)

```php
rand();
// 123421

rand(1, 10);
// 6
```

**Floats :** 

`round()` : 

```php

```

`ceil()` : 

```php

```

`floor()` : 

```php

```

``