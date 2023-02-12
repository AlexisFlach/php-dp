## Design Patterns in PHP

This is a collection of design patterns in PHP. The goal is to provide a
collection of patterns that are easy to understand and easy to use.

### Snippets

**Composer**

```bash
composer require ramsey/uuid
```

**composer.json**

```json
{
  "require": {
    "ramsey/uuid": "^4.7"
  },
  "autoload": {
    "psr-4": {
      "App\\": "app/"
    }
  }
}
```

for development

```bash
composer dump-autoload
```

for production

```bash
composer dump-autoload -o
```

###### PHP UNIT

```bash

composer require --dev phpunit/phpunit

./vendor/bin/phpunit tests

-or-

./vendor/bin/phpunit App/Behavioral/Strategy/tests
```
