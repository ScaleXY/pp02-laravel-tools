# Easebuzz Handler

## Installation and usage

### Install via composer
```
composer require scalexy/laravel-tools
```

### Add to .env
```
```

### Add to config/services.php
```
```

## Why

We wanted it, we built it.

## Opensource

We licensed under the MIT License so that anyone can use it. But we don't intend to actively develop it. You are free to fork it and continue development. PR(s) will probably be ignored. 

## Urgent help

If there is some small bug that you need fixed like adding a new param, open an issue and we'll look into it. Don't do it to request new features, we'll close it.

## Security issues

If there are any security issues, please mail us security@scalexy.com

## Features implemented

- Traits
- - Autorun Functions
- - - AddMissingUUIDOnCreating
- - - AddMissingTOTPKeyOnCreating
- - - HashPasswordOnCreating
- - - HashPasswordOnUpdating
- - Exceptions
- - - FormatExceptionAsJSONForAPI

- Middlewares
- - FormatAPIResponse

## Auto-run methods

Use the `AutoRun` attribute with `AutoRunTrait` to run a model method during an Eloquent lifecycle event. Methods can be public, protected, or private, and may accept the model instance as an optional argument.

```php
use ScaleXY\Tools\Attributes\AutoRun;
use ScaleXY\Tools\Traits\AutoRunTrait;

class User extends Model
{
    use AutoRunTrait;

    #[AutoRun('creating')]
    protected function setDefaults(): void
    {
        // ...
    }

    #[AutoRun('updating', 'updated')]
    protected function syncSearchIndex($user): void
    {
        // ...
    }
}
```

Supported events are `creating`, `created`, `updating`, `updated`, `deleting`, and `deleted`. The `mutating` alias runs for all `*ing` events, while `mutated` runs for all `*ed` events.
