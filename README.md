# Laravel GeoIP Log Cleaner

[![Latest Stable Version](https://poser.pugx.org/erdaldemirci/laravel-geoip-log-cleaner/v/stable)](https://packagist.org/packages/erdaldemirci/laravel-geoip-log-cleaner)
[![Total Downloads](https://poser.pugx.org/erdaldemirci/laravel-geoip-log-cleaner/downloads)](https://packagist.org/packages/erdaldemirci/laravel-geoip-log-cleaner)
[![Latest Unstable Version](https://poser.pugx.org/erdaldemirci/laravel-geoip-log-cleaner/v/unstable)](https://packagist.org/packages/erdaldemirci/laravel-geoip-log-cleaner)
[![License](https://poser.pugx.org/erdaldemirci/laravel-geoip-log-cleaner/license)](https://packagist.org/packages/erdaldemirci/laravel-geoip-log-cleaner)

# Documentation

* [Installation](#installation)
* [Usage](#usage)
    - [Working with facade](#working-with-facade)
    - [Working with Artisan CLI](#working-with-artisan-cli)
* [License](#license)
* [Thanks from author](#thanks-for-use)

## Installation
You can install this package through [Composer](https://getcomposer.org).

- First, edit your project's `composer.json` file to require `erdaldemirci/laravel-geoip-log-cleaner`:
```php
"require": {
    // other require packages
    "laravel-geoip-log-cleaner": "1.*"
},
```
- Next, run the composer update command in your command line interface:
```shell
$ composer update
```
> **Note:** Instead of performing the above two steps, you can perform faster with the command line `$ composer require erdaldemirci/laravel-geoip-log-cleaner:1.*`.
- Add following code to app\Console\Kernel.php.
```php
protected $commands = [
    // other kernel commands
    \ErdalDemirci\GeoIPLogCleaner\Command\LogClearCommand::class,
];
```

## Usage

#### Working with facade
Laravel Log Cleaner has a facade with name is `ErdalDemirci\GeoIPLogCleaner\Facades\Cleaner`. You can do any operation through this facade. For example:
```php
<?php

namespace YourNamespace;

// your code

use ErdalDemirci\GeoIPLogCleaner\Facades\Cleaner;

class YourClass
{
    public function yourMethod()
    {
        Cleaner::doSomething();
    }
}
```

#### Method chaining
Some functions of loading, writing, backing up, restoring are implementation and usage of method chaining. So these functions can be called to chained together in a single statement. Examples:
```php
$cleaner = Cleaner::rotate(14);

if ($cleaner->clear()) {
    echo 'GeoIP Log files older than 14 days in default folder were cleared successfully.';
} else {
    echo 'GeoIP Log files older than 14 days in default folder were cleared with errors.';
}

if ($cleaner->dir('path_to_logs')->clear()) {
    echo 'GeoIP Log files older than 14 days in `path_to_logs` folder were cleared successfully.';
} else {
    echo 'GeoIP Log files older than 14 days in `path_to_logs` folder were cleared with errors.';
}
```
```php
if (Cleaner::dir('path_to_logs')->clear()) {
    echo 'Log files in `path_to_logs` folder were cleared successfully.';
} else {
    echo 'Log files in `path_to_logs` folder were cleared with errors.';
}
```

#### Working with Artisan CLI
Laravel GeoIP Log Cleaner have command can use easily with Artisan CLI. Example:
```shell
$ php artisan geoiplog:clear --path=/path/to/log/files --rotate=14
```

Please use each above command with option --help for details of usage. Example:
```shell
$ php artisan geoiplog:clear --help
```

## License
The Laravel GeoIP Log Cleaner is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Thanks for use
Hopefully, this package is useful to you.
