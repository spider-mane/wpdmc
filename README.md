# WPDMC

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

This package allows you to disable 'WP debug mode checks' using a constant.

## Installation

Via Composer

```bash
composer require webtheory/wpdmc
```

## Usage

Simply add the following in `wp-config.php` or any point before loading `wp-settings.php`

```php
define('WP_DEBUG_MODE_CHECKS', false);
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email spider.mane.web@gmail.com instead of using the issue tracker.

## Credits

* [Chris Williams][link-author]
* [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/webtheory/wpdmc.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/webtheory/wpdmc.svg?style=flat-square
[link-packagist]: https://packagist.org/packages/webtheory/wpdmc
[link-downloads]: https://packagist.org/packages/webtheory/wpdmc
[link-author]: https://github.com/spider-mane
[link-contributors]: ../../contributors
