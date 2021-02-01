# PHP Guide

> A self study repo for myself privately, and will be open to anyone and my friends to study together.

## Description



## Pages



## FAQ

> Questions that often asked by other Jr. PHP Developer

Check out these resource belows:

[PHP The Rigth Way](https://phptherightway.com/)

[Modern PHP](https://www.oreilly.com/library/view/modern-php/9781491905173/)

[Laracast](https://laracasts.com/)


### How to become better PHP developer

> Source: [10 Things You Can Do to Become a Better PHP Developer - William Craig](https://www.webfx.com/blog/web-design/10-things-you-can-do-to-become-a-better-php-developer)

__1. Use PHP Core Functions and Classes__

If you’re trying to do something that seems fairly common, chances are, there’s already a PHP function or class that you can take advantage of. Always check out the [PHP manual](https://www.php.net/manual/en/) before creating your own functions.

*Example:*

- There’s no need to create a function to remove the white space at the beginning and at the end of a string when you can just use the `trim()`` function.

- Why build an XML parser for RSS feeds when you can take advantage of PHP’s XML Parser functions (such as `xml_parse_into_struct`)?

__2. Create a Configuration File__

Instead of having your database connection settings scattered everywhere, why not just create one master file that contains its settings, and then include it in your PHP scripts? If you need to change details later on, you can do it in one file instead of several files. This is also very useful when you need to use other constants and functions throughout multiple scripts.

```php
/**
 * The language code used when no language is explicitly assigned.
 *
 * Defined by ISO639-2 for "Undetermined".
 */
define( 'LANGUAGE_NONE', 'und' );

/**
 * The type of language used to define the content language.
 */
define( 'LANGUAGE_TYPE_CONTENT', 'language_content' );

/**
 * The type of language used to select the user interface.
 */
define( 'LANGUAGE_TYPE_INTERFACE', 'language');
```

Using a `config` file is a popular web application pattern that makes your code more modular and easier to maintain.

__3. Always Sanitize Data That Will Go into Your Database__

[SQL injections](https://www.w3schools.com/sql/sql_injection.asp) are more common that you may think, and unless you want a big headache later on, sanitizing your database inputs is the only way to get rid of the problem. The first thing you should do is learn about popular ways your app can be compromised and get a good understanding of what SQL injections are; [read about examples of SQL injection attacks](http://unixwiz.net/techtips/sql-injection.html) and [check out this SQL injection cheat sheet](https://www.netsparker.com/blog/web-security/sql-injection-cheat-sheet/).

Luckily, there’s a PHP function that can help make a big heap of the problem go away: `mysql_real_escape_string`. [mysql_real_escape_string](https://www.php.net/manual/en/function.mysql-real-escape-string.php) will take a regular string (learn about data types through this PHP variables guide) and sanitize it for you. If you use the function together with [htmlspecialchars](https://www.php.net/manual/en/function.htmlspecialchars.php), which converts reserved HTML characters (like `<script>` becomes `&lt;script&gt;`), not only will your database be protected, but you’ll also safeguard your app against cross-site scripting (XSS) attacks when rendering user-submitted HTML (such as those posted in comments or forum threads).

__4. Leave Error Reporting Turned On in Development Stage__

Looking at the PHP White Screen of Death is never helpful except for knowing something is definitely wrong. When building your application, leave [error_reporting](https://www.php.net/manual/en/errorfunc.configuration.php#ini.error-reporting) and [display_errors](https://www.php.net/manual/en/errorfunc.configuration.php#ini.display-errors) turned on to see run-time errors that will help you quickly identify where errors are coming from.

You can set up these run-time configurations in your server’s php.ini file or, if you don’t have access to override the directives in this file, set them on top of your PHP scripts (using the [ini_set()](https://www.php.net/manual/en/function.ini-set.php) function to set display_errors to 1, but it has [its limitations when done this way](https://www.php.net/manual/en/errorfunc.configuration.php#89648)).

The reason behind turning on error reporting is quite simple — the sooner you know about your errors, the faster you can fix them. You might not care about the warning messages that PHP might give you, but even those usually signal towards a memory-related issue that you can take care of. When you’re done building out your application, turn error_reporting and display_errors off or set their values to a production-ready level.

__5. Don’t Over-Comment Your Code__

Proper documentation of your code through comments in your scripts is definitely a good practice, but is it really necessary to comment every single line? Probably not. Comment the complicated parts of your source code so that when you revisit it later you’ll quickly remember what’s going, but don’t comment simple things such as your MySQL connection code. Good code is self-explanatory most of the time.

Good Example of Commenting
```php
<?php
	/* CONNECT TO THE DATABASE */
	
	$hostname = "localhost";
	$username = "";
	$password = "";
	$dbname = "";
	    
	$connectionStatus = mysql_connect($hostname, $username, $password) or die(mysql_error());
	$selectionStatus = mysql_select_db($dbname) or die(mysql_error());
	
	/* END DATABASE CONNECTION */
?>
```

Bad Example of Commenting
```php
<?php
	
	/* DEFINE THE CONNECTION VARIABLES */
	$hostname = "localhost"; // Hostname
	$username = ""; // Username 
	$password = ""; // Password
	$dbname = ""; // Database name// Connect to the database or display an error
	$connectionStatus = mysql_connect($hostname, $username, $password) or die(mysql_error());
    // Select our database here	
    $selectionStatus = mysql_select_db($dbname) or die(mysql_error());

?>
```

__6. Keep Favorite Code Snippets Handy__

You’ll be coding a lot of the same things throughout your PHP development career, and keeping code snippets always available will help you save a lot of time. There are several apps that can keep and sync your code snippet collection for you, so no matter where you are, you can always have your snippets available. Some apps you can use to corral your code snippets are Snippet, [snippely](http://code.google.com/p/snippely/), [Code Collector](http://www.codecollector.net/), and [Snipplr](http://snipplr.com/) (web-based).

__7. Use a Good Source Editor to Save You Time__

Your editor is where you’ll spend the majority of your time, so you want to use something that helps you save time. Syntax highlighting is a must and definitely something you should be looking for as a software feature. Other bonuses include code hinting, code navigation and built-in debugging tools. All of these features can end up saving you massive amounts of time.

Take the time to get familiar with your source code editor’s features by reading the documentation and reading tutorials online. A bit of time investment in this arena can really streamline your coding workflow.

Checkout: [PHPStorm](https://www.jetbrains.com/phpstorm/) has a free year trial for student with student email.

__8. Use a MySQL Administration Tool (Like phpMyAdmin)__

I know some crazy hard-core developers who like working with MySQL (the popular [Database Management System](http://en.wikipedia.org/wiki/Database_management_system) pairing for PHP) via command line, which, to me, is inefficient and just, well, crazy. It’s a good thing to know how to administer your MySQL database using [mysqladmin](http://dev.mysql.com/doc/refman/5.5/en/mysqladmin.html), but afterwards, you should use a graphical user interface like [phpMyAdmin](http://www.phpmyadmin.net/home_page/index.php) to speed up database development and administration.

phpMyAdmin, in particular, is an excellent open source database viewer/manager that allows you to view your MySQL databases graphically so that you don’t have to waste time doing things via the command line. You can quickly build databases and their tables, export your databases into SQL files, run SQL queries, optimize tables, check for issues, create MySQL database users and set up their privileges quickly, and much more. There is a good chance your web host already has phpMyAdmin installed, and if not, it only takes minutes to install.

__9. Use a PHP Framework__

It took me a really long time to accept the fact that using a web application development/rapid application development framework would help me out. You have a small learning curve in the beginning, and there will be a lot of reading to do to learn how the API of the framework works, but you get amazing productivity and efficiency benefits later. Using a framework forces you to use better web development patterns that you might not be using right now.

Using a PHP framework pays off big time when you have to share your code with others later on or when you have to work together with someone; it gives you a standardized platform for building web applications. I learned the importance of this the hard way when I had to start hiring other developers.

Some popular PHP frameworks are [CakePHP](http://cakephp.org/), [CodeIgniter](http://codeigniter.com/), [symfony](http://www.symfony-project.org/), [Laravel](https://laravel.com/) and [Zend](http://www.zend.com/en/).

---

### What should a junior PHP developer know to get a decent job?

I think I'm very qualified to write an aswer to this question since I got my Junior PHP developer job not long ago. Below are what I would suggest you to know before applying:

- Understand plain PHP very very well. Know which functions to use when needed, super globals, file handling and among the other core PHP stuffs.

- Understand Object Oriented Programming (OOP). This is because most of the company's code base will be written with OOP style.
Know Structured Query Language (SQL) and understand it well. Though there are Non-SQL databases around but I think almost every job uses SQL databases.

- Understand Model View Controller (MVC) and/or Model View View-Model (MVVM). These are the basic structure of all PHP Frameworks.

- After all these, get to know at least one framework (I recommend Laravel). You don't need to master it, just know your "work-arounds" in it. Build some simple projects in them.

- Understand HTML and CSS. JavaScript is not compulsory for now but it will be a plus for you. And know some simple JQuery for DOM manipulation.

After you have gotten your first job:

- Be confident in yourself and don't be intimidated by Lead or Senior developers. But instead, learn from them and humble yourself. Know when to ask questions and when to work on your own. Be hard working and love your job. Most of the real experience in the development world would be revealed to you in your job.

- Don't quit learning. Learn JavaScript (the most popular language in the world) and some of its frameworks. This will make you a full stack developer.

- Expand your territories by learning mobile development or anything outside your comfort zone.