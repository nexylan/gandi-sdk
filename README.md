# Gandi SDK

Gandi API PHP SDK.

[![Latest Stable Version](https://poser.pugx.org/nexylan/gandi-sdk/v/stable)](https://packagist.org/packages/nexylan/gandi-sdk)
[![Latest Unstable Version](https://poser.pugx.org/nexylan/gandi-sdk/v/unstable)](https://packagist.org/packages/nexylan/gandi-sdk)
[![License](https://poser.pugx.org/nexylan/gandi-sdk/license)](https://packagist.org/packages/nexylan/gandi-sdk)

[![Total Downloads](https://poser.pugx.org/nexylan/gandi-sdk/downloads)](https://packagist.org/packages/nexylan/gandi-sdk)
[![Monthly Downloads](https://poser.pugx.org/nexylan/gandi-sdk/d/monthly)](https://packagist.org/packages/nexylan/gandi-sdk)
[![Daily Downloads](https://poser.pugx.org/nexylan/gandi-sdk/d/daily)](https://packagist.org/packages/nexylan/gandi-sdk)

## Documentation

All the installation and usage instructions are located in this README.
Check it for a specific versions:

* [__0.x__](https://github.com/nexylan/gandi-sdk/tree/master)

## Prerequisites

The project requires:

* PHP 7.1+

## Installation

First of all, you need to require this library through Composer:

``` bash
composer require nexylan/gandi-sdk
```

With Symfony:

* Register the bundle

```php
new Nexy\Gandi\Bridge\Symfony\Bundle\NexyGandiBundle()
```

* In your `config.yml`

```yaml
nexy_gandi:
    # Change to https://rpc.gandi.net/xmlrpc/ in prod
    server_url: https://rpc.ote.gandi.net/xmlrpc/
    api_key: 'youApiKey'
```

## Usage

Use the predefined methods and/or use Gandi methods directly

```php
$gandi = new Gandi('server_url', 'api_key');

# $gandi->setup()->proxyName->methodName(params);
$gandi->setup()->domain->info('mydomain.net');
```
