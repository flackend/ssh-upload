# Hello App

This is a very simple "Hello, World" command-line app. The purpose was to learn how to use Symfony's [Console](https://github.com/symfony/Console) package to create a single-command CLI app and make it distributable as a single file with [Box](https://github.com/box-project/box2).

## Resources

- [https://laracasts.com/series/how-to-build-command-line-apps-in-php](https://laracasts.com/series/how-to-build-command-line-apps-in-php)
- [http://moquet.net/blog/distributing-php-cli/](http://moquet.net/blog/- distributing-php-cli/)
- [http://symfony.com/doc/current/components/console/single_command_tool.html](http://symfony.com/doc/current/components/console/single_command_tool.html)

## Building

### Install Composer

Visit Composer's website for [instructions](https://getcomposer.org/doc/00-intro.md).

```bash
curl -sS https://getcomposer.org/installer | php
```

### Install Box

[Instructions](https://github.com/box-project/box2) are on the Box GitHub page.

```bash
composer global require 'kherge/box=~2.4' --prefer-source
```

### Build

Download the source from this repo.

Then you'll need to install the composer dependencies:

```bash
composer install
```

Build with Box:

```bash
box build
```

View information about the tool:

```bash
./hello.phar --help
```