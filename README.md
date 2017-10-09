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

## Installation

First of all, you need to require this library through Composer:

``` bash
composer require nexylan/gandi-sdk
```

With Symfony:

Enable the bundle on the `AppKernel` class:

```php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Nexy\SlackBundle\NexySlackBundle(),
    );

    // ...

    return $bundles
}
```

## Configuration

Configure the bundle to your needs:

```yaml
# parameters.yml
parameters:
    # Change to https://rpc.gandi.net/xmlrpc/ in prod
    gandi_rpc_url: https://rpc.ote.gandi.net/xmlrpc/
```


```yaml
# config.yml
nexy_gandi:
    api_url: %gandi_rpc_url%
    api_key: 'yourApiKey'
```

## Usage

Use the predefined methods and/or use Gandi methods directly

```php
$gandi = new Gandi('api_url', 'api_key');

$gandi->setup()->domain->info('mydomain.net');

# Results
[
    status => [
        0 => clientTransferProhibited
    ]
    zone_id => 42
    contacts => [
        owner => [
            handle => FLN123-GANDI
            id => 12345
        ]
        admin => [
            handle => FLN123-GANDI
            id => 12345
        ]
        bill => [
            handle => FLN123-GANDI
            id => 12345
        ]
        tech => [
            handle => FLN123-GANDI
            id => 12345
        ]
        reseller =>
    ]
    date_updated => {
        scalar => 20110902T18:27:34
        timestamp => 1314980854
        xmlrpc_type => datetime
    }
    date_registry_end => {
        scalar => 20120902T16:27:33
        timestamp => 1346596053
        xmlrpc_type => datetime
    }
    tags => []
    fqdn => mydomain.net
    nameservers => [
        0 => a.dns.gandi.net
        1 => b.dns.gandi.net
        2 => c.dns.gandi.net
    ]
    authinfo => xxx
    tld => com
    date_created => {
        scalar => 20110902T16:27:34
        timestamp => 1314973654
        xmlrpc_type => datetime
    }
    id => 123
]
```
