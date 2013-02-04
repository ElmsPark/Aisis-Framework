#Aisis Core Development
=======================

Aisis Core development is the development branch where we push new releases before pushing to beta and then to master. The purpose of development is to be in the early to somewhat stable releases.
At this time the development branch is used to develop the 1.0 release, 
in the future it will be used as a hub of other branches to be pushed to, before they 
are pushed to beta and then master.

#Documentation?
===============

Because Aisis Core is not 1.0 at this time and we are looking to use PHP doc to document the product we are working feverishly to make sure that documentation is being written and pushed. We are also working hard to make sure we follow PHP documentation standards. 

#How is it tested?
==================

Aisis Core is not tested in the typical way of using unit tests like most web frameworks are.
instead we rely on the building process of the theme for WordPress to test the functionality and the
exteniveness and flexabillity of the framework.

We have thought of testing Aisis Core much like a framework, how ever because it is used soly for
the purpose of building WordPress theme frameworks we assumed th testing would come from the ease
of use of the framework it's self. The actual implementation of the framework.

#Functionality - What to expect?
================================

There are several key features to expect from Aisis Core when building WordPress themes and theme frameworks.
One of the majour features is how easy the system is to implement. Some of the key features to expect are:

* Form and Form elements - Allows for the building of forms and elements through OO Concepts.
* Factory pattern - Allows for the passing in the class or object and its dependencies and returning a object back.
* Loader - Allows for you to load classes, dependencies and other objects
  * Auto Loader - Allows for all the componets of the system to be auto loaded.
  * Asset Loader - Allows you to build an array of assets to be loaded through wordpress.
* File Handeling and HTTP - Easy ways to deal with files and http based calls.
  * HTTP (Get and Set) - Easy way to deal with $_GET[] and $_SET[]
* Templates and Helpers - Allows for you to create templates that contain .phtml files.
  * Builder - Allows for you to build various types of templates that can then be "rendered" into .php WordPress templates.
  * Helpers - Contains the loop function and also provides a helper to build content based sections that are used over and over again.
    * loop - The loop is a class that allows you to build a loop by passing in an array of options.
    
These are some the things you can look forward too in Aisis Core. Among these are other features such as:

* Bootstrap - For easy setup of the framework with in your theme
* Plugins - Much like many frameworks - you can write plugins for the framework and use them with in your own.

Among these are other features with in the framework that make it a dream to use. WordPress needed a 
framework that would make building themes and theme frameworks much easier then before. 