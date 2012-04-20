Aisis
====

Aisis is a framework in the sense that it is a theme for WordPress but the extensibility and the ability for a developer to go in and use or over write the existing API's to change, drastically or minimally the source code to allow the users to see and experience something completely different is what makes it an amazing tool for developers.

But we have not forgotten designers. Designers can use the tools built into the theme admin panel section to change the look and feel of the site and the way specific elements of the site work.

API
===

Aisis is not currently documented in such that there is some resource you can go to, to read up on the API, the methods, functions, classes and so on. How ever the source code is highly documented and every function, class and file has some documentation to state whats going on and what part it plays in the over all application.

Aisis is a framework but its also software. Software that sits upon WordPress and utilizes the API's and functionality to build its self and create the theme you see before you.

Core Concepts
------------------

There are some very basic concepts that you as a developer who checks out the source should understand. Designers don't have to worry too much unless they are editing the files manually instead of through the code editors provided.

**Loaders**

Loaders are what load the content. In this case they are mostly used to load the templates in Aisis/AisisCore/Templates and they are also used to load the modules in Aisis/AdminPanel/Modules.

These loaders are then called into the CoreLoader.php in Aisis/AisisCore in which is then required in functions.php to load the whole AisisCore.

**Register**

There is a class: Class-AisisCoreRegister which contains two main functions: 

`aisis_register($filename, $custom=false){}`

Which will load the file you specify in the default folder of AisisCore/Templates, how ever if custom is set to true then it load the file specified through custom/Templates.

This is used in the AisisLoadTemplates.php to load the various templates for the theme.

`aisis_mod_register($filename, $custom=false){}`

is used to load in the modules in the Aisis/AdminPanel/Modules folder and register them to be used with the admin side of things to do a lay out.

`load_if_extension_is_php($dir){}`

is used a lot through out the AisisCore to load whole directories into a require_once(); This will take in the directory, check all the files and load only those that are php. Thisfunction is useful for those who have directories full of php. It does not do sub directories of that directory.

**Exceptions**

Exceptions are mostly used for developers. They are modelled after the Zend_Exceptions in such that all you have to do to create a new exception in the AisisCore/Exceptions package is:

`MyException extends AisisCoreExceptions{}`

then in your code where you want it thrown:

`new MyException('Error Message');`

Its that easy and that simple.

**The Frameworks**

Aisis is a theme, Aisis Core is the package or framework that allows for the developers and designers to manipulate how Aisis looks to the end user. AdminPanel is a whole other framework that lays out the admin panel and associated options through the use of Modules that are registered then used through out their respected places in the admin panel its self.

Overriding  Functions
--------------------------

**if(!function_exists('name')){}**

is the most popular command used. It states that if this function does not exist create it. If you write a function in your custom-functions.php file under custom/ that over rides a method by simply creating it then you are essentially over riding a function. How ever be careful to note that while most functions has this functionality some of them have else{throw error();} to state that you cannot override this function.

This is likely to happen in the case of loading jquery, core dependencies like css, js and some php files. How ever for templates and modules this does not happen. This allows the developer free access to say – no don't use this file at this location, use this one instead.

Overriding Classes
-----------------------

Most of these can be done through the simplicity of following the [PHP Manual – Overloading](http://php.net/manual/en/language.oop5.overloading.php).

Licences
======

We use a strict GPL version 3.0 license to keep compatible with WordPress and we include this in with the source code. You can read the License [here](http://www.gnu.org/licenses/gpl.html).

**Please note:**

    Aisis – Theme Framewor
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

    Aisis - Theme Framewor  Copyright (C) 2012  Adam Kyle Balan
    This program comes with ABSOLUTELY NO WARRANTY; for details type `show w'.
    This is free software, and you are welcome to redistribute it
    under certain conditions; type `show c' for details.
