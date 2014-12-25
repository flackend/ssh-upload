# SSH Upload

This is a very simple SSH upload command-line app.

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
./sshupload.phar --help
```