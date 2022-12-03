# CodeIgniter 4 Framework

## What is CodeIgniter?

CodeIgniter is a PHP full-stack web framework that is light, fast, flexible and secure.
More information can be found at the [official site](http://codeigniter.com).

This repository holds the distributable version of the framework,
including the user guide. It has been built from the
[development repository](https://github.com/codeigniter4/CodeIgniter4).

More information about the plans for version 4 can be found in [the announcement](http://forum.codeigniter.com/thread-62615.html) on the forums.

The user guide corresponding to this version of the framework can be found
[here](https://codeigniter4.github.io/userguide/).


## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

**Please** read the user guide for a better explanation of how CI4 works!

## Repository Management

We use GitHub issues, in our main repository, to track **BUGS** and to track approved **DEVELOPMENT** work packages.
We use our [forum](http://forum.codeigniter.com) to provide SUPPORT and to discuss
FEATURE REQUESTS.

This repository is a "distribution" one, built by our release preparation script.
Problems with it can be raised on our forum, or as issues in the main repository.

## Contributing

We welcome contributions from the community.

Please read the [*Contributing to CodeIgniter*](https://github.com/codeigniter4/CodeIgniter4/blob/develop/CONTRIBUTING.md) section in the development repository.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
# Warehouse pharmacy
# The page in the warehouse-pharmacy
  - Page Home
      This page is the initial page when you have logged in
      ![image](https://user-images.githubusercontent.com/101650151/205431607-c0a1af30-e38e-421a-8982-cc1f143dfb55.png)
  
  - Page Dashboard
      This page contains lists of favorite drugs
      ![image](https://user-images.githubusercontent.com/101650151/205431726-5d6ca6a9-078e-4224-bf04-c90d22b5ce0a.png)
  
  - Page Categories
      On this page we can add the drug category in the warehouse
      ![image](https://user-images.githubusercontent.com/101650151/205431872-2db932e5-7143-4e62-aae0-0620c6066e5d.png)
      
  - Page Purchases
      This page is used for purchases and we can also view purchase details
      ![image](https://user-images.githubusercontent.com/101650151/205431973-f46b72ad-ff8f-4d1b-b864-9bfa7efc8c65.png)



