# Basic Level of PHP

## What is PHP?

PHP stands for Hypertext Preprocessor. It is an open source server-side scripting language which is widely used for web development. It supports many databases like MySQL, Oracle, Sybase, Solid, PostgreSQL, generic ODBC etc.

---

## What is PEAR in PHP?

PEAR is a framework and repository for reusable PHP components. PEAR stands for PHP Extension and Application Repository. It contains all types of PHP code snippets and libraries.

It also provides a command line interface to install "packages" automatically.

---

## Who is known as the father of PHP?

Rasmus Lerdorf

---

## What was the old name of PHP?

The old name of PHP was Personal Home Page.

---

## Explain the difference b/w static and dynamic websites?

In static websites, content can't be changed after running the script. You can't change anything on the site. It is predefined.

In dynamic websites, content of script can be changed at the run time. Its content is regenerated every time a user visit or reload. Google, yahoo and every search engine is the example of dynamic website.

---

## What is the name of scripting engine in PHP?

The scripting engine that powers PHP is called Zend Engine 2.

---

## Explain the difference between PHP4 and PHP5.

PHP4 doesn't support oops concept and uses Zend Engine 1.

PHP5 supports oops concept and uses Zend Engine 2.

---

## What are the popular Content Management Systems (CMS) in PHP?

__WordPress:__ WordPress is a free and open-source content management system (CMS) based on PHP & MySQL. It includes a plug-in architecture and template system. It is mostly connected with blogging but supports another kind of web content, containing more traditional mailing lists and forums, media displays, and online stores.

__Joomla:__ Joomla is a free and open-source content management system (CMS) for distributing web content, created by Open Source Matters, Inc. It is based on a model-view-controller web application framework that can be used independently of the CMS.

__Magento:__ Magento is an open source E-trade programming, made by Varien Inc., which is valuable for online business. It has a flexible measured design and is versatile with many control alternatives that are useful for clients. Magento utilizes E-trade stage which offers organization extreme E-business arrangements and extensive support network.

__Drupal:__ Drupal is a CMS platform developed in PHP and distributed under the GNU (General Public License).

---

## What are the popular frameworks in PHP?

- CakePHP

- CodeIgniter

- Yii 2

- Symfony

- Zend Framework etc.

---

## Which programming language does PHP resemble to?

PHP has borrowed its syntax from Perl and C.

---

## List some of the features of PHP7.

- Scalar type declarations

- Return type declarations

- Null coalescing operator (??)

- Spaceship operator

- Constant arrays using define()

- Anonymous classes

- Closure::call method

- Group use declaration

- Generator return expressions

- Generator delegation

- Space ship operator

---

## What is "echo" in PHP?

PHP echo output one or more string. It is a language construct not a function. So the use of parentheses is not required. But if you want to pass more than one parameter to echo, the use of parentheses is required.

Syntax:
```php
void echo ( string $arg1 [, string $... ] )
```

---

## What is "print" in PHP?

PHP print output a string. It is a language construct not a function. So the use of parentheses is not required with the argument list. Unlike echo, it always returns 1.

Syntax:
```php
int print ( string $arg)  
```

---

## What is the difference between "echo" and "print" in PHP?

Echo can output one or more string but print can only output one string and always returns 1.

Echo is faster than print because it does not return any value.

---

## How a variable is declared in PHP?
A PHP variable is the name of the memory location that holds data. It is temporary storage.

Syntax:
```php
$variableName = value;  
```

---

## What is the difference between `$message` and `$$message`?

`$message` stores variable data while `$$message` is used to store variable of variables.

`$message` stores fixed data whereas the data stored in `$$message` may be changed dynamically.

---

## What are the ways to define a constant in PHP?

PHP constants are name or identifier that can't be changed during execution of the script. PHP constants are defined in two ways:

Using `define()` function
Using `const()` function

---

## What are magic constants in PHP?

PHP magic constants are predefined constants, which change based on their use. They start with a double underscore `__` and end with a double underscore `__`.

---

## How many data types are there in PHP?

PHP data types are used to hold different types of data or values. There are 8 primitive data types which are further categorized in 3 types:

- Scalar types

- Compound types

- Special types

---


