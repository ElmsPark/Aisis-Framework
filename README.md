Aisis
====

Aisis is a framework in the sense that it is a theme for WordPress but the extensibility and the ability for a developer to go in and use or over write the existing API's to change, drastically or minimally the source code to allow the users to see and experience something completely different is what makes it an amazing tool for developers.

But we have not forgotten designers. Designers can use the tools built into the theme admin panel section to change the look and feel of the site and the way specific elements of the site work.

API
===

Aisis is not currently documented in such that there is some resource you can go to, to read up on the API, the methods, functions, classes and so on. However the source code is highly documented and every function, class and file has some documentation to state what’s going on and what part it plays in the overall application.

Aisis is a framework but it’s also software. Software that sits upon WordPress and utilizes the API's and functionality to build its self and create the theme you see before you.

Core Concepts
------------------

There are some very basic concepts that you as a developer who checks out the source should understand. Designers don't have to worry too much unless they are editing the files manually instead of through the code editors provided.

**Loaders**

Loaders are what load the content. In this case they are mostly used to load the templates in Aisis/AisisCore/Templates and they are also used to load the modules in Aisis/AdminPanel/Modules.

These loaders are then called into the CoreLoader.php in Aisis/AisisCore in which is then required in functions.php to load the whole AisisCore.

Aside from the Loaders we have in Aisis we also have specified files that will sit outside of directories containing large amounts of PHP files, for example:

`$load_aisis_exceptions = new AisisFileHandeling();`

`$load_aisis_exceptions->load_if_extension_is_php(AISIS_EXCEPTIONS);`

This lies within the Exceptions package in a file called ExceptionLoader and it essentially loads all the files in this package with .php extensions. The argument we pass is the path to the folder.
Note: We cannot load sub packages of that directory you point to. And this cannot be used to load whole template or module directories. We use Register for module and template directories.

You cannot also do:

`$load_aisis_exceptions = new AisisFileHandeling();`
`$load_aisis_exceptions->load_if_extension_is_php(AISIS_EXCEPTIONS);`

`$load_aisis_exceptions = new AisisFileHandeling();`

`$load_aisis_exceptions->load_if_extension_is_php(AISISCORE);`

As this will throw an error stating it could not load some file. What you want to do with this method is to use it once to load a directory of large files either in that directory or just outside it. For example in CoreLoader.php we use this to load the Admin Panel.

The function of this method is to load all the .php files such as classes and functions so that we do not have to constantly use require_once or include all the time when creating a new file. It just allows us to start coding as quickly as possible.



**Register**

Register is used for registering html based templates and modules that are used to display both the front end and the admin panel section for Aisis. The idea is that you register the HTML based layout and then use that element to display your content. The function is as such:

`aisis_register($filename, $path=’’);`

This states that if the path is not null then look where you have specified the path to look, such as the custom/Templates or the AisisCore/AdminPanel/Modules or where ever else. The file name is the file plus the extension (eg: template.php) that you want registered from that location. All template and Modules are .php extended as they are then required_once.


`load_if_extension_is_php($dir){}`

is used a lot throughout the AisisCore to load whole directories into a require_once(); This will take in the directory, check all the files and load only those that are php. Thisfunction is useful for those who have directories full of php. It does not do sub directories of that directory.

**Exceptions**

Exceptions are mostly used for developers. They are modelled after the Zend_Exceptions in such that all you have to do to create a new exception in the AisisCore/Exceptions package is:

`MyException extends AisisCoreExceptions{}`

then in your code where you want it thrown:

`new MyException('Error Message');`

It’s that easy and that simple.

**The Frameworks**

Aisis is a theme; Aisis Core is the package or framework that allows for the developers and designers to manipulate how Aisis looks to the end user. AdminPanel is a whole other framework that lays out the admin panel and associated options through the use of Modules that are registered then used throughout their respected places in the admin panel its self.

Overriding Functions (Pluggable methods)
-----------------------------------------

Aisis is considered a very flexible and very diverse theme framework for developers and designer to allow you to change what you want, how you want and when you want. We use a system of Templating, Modules and hooks to build Aisis. Templating is done through the Templates package in AisisCore and in custom. AisisCore templates are used to build the core default look and feel of Aisis the first time you load it. Modules are used to build the admin panel for Aisis and are highly flexible.

We then register these html based elements (as you read above) to build the look and feel of Aisis from the front end to the back end. We use Loaders to load core logic and components. We then use hooks to set the default content – such as the default 404 error messages or the default author bio at the bottom of each post. These hooks are then used by you along with the pluggable functions to change the look, the feel and pretty much EVERY thing about Aisis to make it what you want.

Aisis is a canvas for developers and designers while providing power and simplicity.

**if(!function_exists('name')){}**

This is considered to be a pluggable method because of the ability to override the method inside by predefining it elsewhere.

What happens here are essentially you are saying – if this function does not already exist then do this, create it with these defaults. However with this we can define this method elsewhere and tell it to do something else altogether.

**Hooks**

We also have hooks. Hooks are a fabulous way to tell WordPress to do something and we use them in Aisis to display default content. For example if a user who writes posts for your blog has not entered in there “bio” then you can go ahead and use one of the many hooks in Aisis to change the default bio text that displays for that author.

Hooks and pluggable methods are a powerful way to alter Aisis to your liking as a developer or as a designer.

Overriding Classes
-----------------------

Most of these can be done through the simplicity of following the [PHP Manual – Overloading](http://php.net/manual/en/language.oop5.overloading.php).

Git Branches
=========

It is exceptionally important you pay attention to these. Each branch is a different set of code and only the Master Branch has tags stating which release cycle we are in.

**Development**

This branch is unstable, nightly build code that is not guaranteed to work at all. It's kind of like “I’m done for the day lets push what I have.”

if you are looking to contribute a patch or a piece of code this is what you pull, fork, check out. Development goes on until I feel that what I have is stable enough for beta.

**Beta**

This branch – no one but me checks out from. This is when Development is stable enough for me to push here. I continue doing work on this branch and commit any new changes, code snippets and community work to development. When I feel that what people have committed won't break the beta we merge it together.

**Master**

Master makes use of tags to state what version Aisis is at. Aisis, Aisis Core and Admin Panel are three separate products with three separate version. Who's ever is higher is the one we use as the overall version. (See versioning below). No one but me has access to the Master. Everyone can fork from master. Its best to fork from development.

Versioning
========

Aisis, Aisis Core and Admin Panel are all three separate products. This means they are all bound to have separate versions.

However WordPress themes are versioned in the style.css file and this means that there is one version for the whole product.

**Aisis**

Aisis is the theme. It’s the core WordPress theme. Its everything you would need if you stripped out Aisis Core. This is the dominate figure when it comes to versioning the product.

**Aisis Core**

This is the brains behind Aisis. This is what makes the whole theme function. What makes it style it's self-according to the rules set in the various files. The classes, functions and associated files have say over how the theme acts and behaves.

**Admin Panel**

This is the brains behind the admin panel and a sub set of the Aisis Core. This package is responsible for how the theme administration section works looks and acts. It draws on various parts of Aisis Core such as File handling and exceptions among others.

**How versioning works**

Essentially you have Aisis+AisisCore+AdminPanel = Version.

So:

If Aisis is version 1.0, Aisis Core is 1.1 and Admin Panels 1.2 the version is 1.2

If Aisis is version 3.6, Aisis Core is 2.2 and Admin Panel is 3.6.3 the version is 3.6.3

It’s that simple. 

License’s
======

We use a strict GPL version 3.0 license to keep compatible with WordPress and we include this in with the source code. You can read the License [here](http://www.gnu.org/licenses/gpl.html).

**Please note:**

    Aisis – Theme Framework
    Copyright (C) 2012  Adam Kyle Balan

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.

**And Please Note: **

    Aisis - Theme Framework  Copyright (C) 2012  Adam Kyle Balan
    This program comes with ABSOLUTELY NO WARRANTY; for details type `show w'.
    This is free software, and you are welcome to redistribute it
    under certain conditions; type `show c' for details.

