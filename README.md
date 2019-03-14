# select-or-text

Laravel Nova custom field that allows you to have a select drop-down or custom text!


## Install

You can install `select-or-text` using composer:

```
composer require lynndigital/select-or-custom
```

Then add the following code to your resources `fields` method:

```php
\Lynndigital\SelectOrCustom\SelectOrCustom::make('Field Name')->options([]);
```

The field has an `options` method similar to that of Laravel Nova's `Select` field, it allows you to pass default options that may be selected.

## Screenshots:

//todo: add screenshots
