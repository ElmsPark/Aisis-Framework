#Aisis
------

Aisis is a highly dynamic, beautiful, responsive and clean theme framework designed and developed for developers of child themes. Its core mission statement and goal is to:
Get the hell out of the way and let you do what you want to do. We are the developer’s wet dream in terms of ease of use, documentation and flexibility.

##Aisis – Theme frame work as a theme?
--------------------------------------

While we boast about the ability to use it as a developer’s platform to build rich, engaging and beautiful child themes with the tools at hand. We also allow for it to be used as a theme with basic options for changing few things on the front end through the admin panel.

#How is Aisis Different?
------------------------

Aisis is not a theme framework in the typical sense of the word. While we do give the option and the ability to utilize it as a theme, we do not promote it as a theme framework. We promote it as a framework in which you can use the stable and rich API’s to develop rich, interactive and beautiful child themes.

We strive on providing you the developer/designer with the tools you need to be productive while making sure our platform is both fast, free, open and non-restricting. We also strive to give you what you want without getting in your way.

#Aisis API?
-----------

Aisis API is the [wiki](https://github.com/AdamKyle/Aisis-Framework/wiki), a heavily documented place with tons of API, Examples, explanations and how to

#Aisis Issues, Enhancements and ideas?
--------------------------------------

You can head over to the [issues](https://github.com/AdamKyle/Aisis-Framework/issues) section and see the Aisis issues, ideas, and enhancements and take part in the discussion, bug fixing and more.

#Building a child theme with Aisis
----------------------------------


Since the way a wordpress child theme and parent theme works, the parent theme function.php file is loaded first and since most of the functions
are pluggables and calling a class is as easy as going

```javascript
$some_variable = new className();
```

Creating child themes are easy and simplistic as all you would need in your child theme is functions.php and the style.css
to create your changes.

#Building Packages
------------------

Packages are used for making quick, simple changes to the core theme its self. The idea is here is to make a quick change in a php file
or in a whole package (which is a folder containing php, phtml and other associated file) drop it into the packages folder in
custom and watch it come to live when you go to the front end of the theme (assuming that was where the changes took place).

The idea of packages is to make quick, easy, simple changes to the core software its self with out actually creating a child theme
or having to touch the core files. Plus these changes dont require activation - They auto load.

You can read more [here](https://github.com/AdamKyle/Aisis-Framework/wiki/Packages-in-Aisis) on packages.

=======
Is as easy as including the Aisis functions.php in to your child themes function.php, this gives you access to every Aisis function, class and API that’s out there. You won’t have to worry about doing:

```javascript
require_once('aisisfile');
```

Instead if that file is not a class you just call its function, if that file is a class you can just instantiate the class and call its functions from there.

##Contributing
--------------

Check the [wiki](https://github.com/AdamKyle/Aisis-Framework/wiki) for guidelines on contribution to the source. Currently we accept any one who knows how to use git and who knows how to write php.

#License?
---------

We are currently using the GPL 3.0 License which states that:

Aisis is a framework for WordPress that gives stable and rich API’s for developing rich and interactive child themes.
Copyright (C) 2012 Adam
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
This license can be read in full at [GPL 3.0] (http://www.gnu.org/licenses/gpl.html)
We package a copy of the license with the software starting as of 5/14/2012.


