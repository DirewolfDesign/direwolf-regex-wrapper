# PHP RegEx Wrapper

> A simple wrapper class for RegEx making it a little easier to remember and
> access `preg_` methods. *Really just a coding project, but might be useful
> for some project at some point*.

---

* Contributors: [Direwolf Design](https://github.com/DirewolfDesign)
* Tags: php, regex
* Requires PHP: 7.2
* Stable Tag: n/a
* License: GNU GPLv3.0 or later
* License URI: http://www.gnu.org/licenses/gpl-3.0.html

---

> This project is a work in progress. You're more than welcome to clone/fork
> this repo and develop your own set of defaults for creating your own WordPress
> plugins!

---

## Description

This package contains a simple wrapper class that allows the use of the
`$re->{method}()`. It's really just a technical exercise that wraps the
standard `preg_{method}()` function calls that are available in vanilla PHP.

---

## Usage

> The package uses PHP 7 namespacing to contain the package code and avoid
> function conflicts, therefore it requires at least PHP 7 to run.

### Include the package

To include the package, simply include the `regex.php` file in your project,
then reference the `\DirewolfDesign\RegEx` class at the top of your file.

```
<?php

    require '/path/to/direwolf-regex-wrapper/regex.php';

    use function \DirewolfDesign\re;

```

You can either call the `re()` function directly or assign it to a variable for
easier reference later.

### Assign to a variable

```
<?php

    $re = re(); // Returns the current instance of the RegEx class

    $txt = "String to split";

    // Important note: When passing in strings, make sure to wrap them in
    // single quotes (''), and not double quotes ("") so the string doesn't get
    // parsed before being passed to the callable.
    $res = $re->split( '\s', $txt );

    print_r( $res );

    // Returns:
    // array( 'String', 'to', 'split' );
```

### Call the function directly

```
<?php

    $txt = "String to split";

    // Important note: When passing in strings, make sure to wrap them in
    // single quotes (''), and not double quotes ("") so the string doesn't get
    // parsed before being passed to the callable.
    $res = re()->split( '\s', $txt );

    print_r( $res );

    // Returns:
    // array( 'String', 'to', 'split' );
```
