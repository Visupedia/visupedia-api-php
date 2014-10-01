# visupedia-api-php

Official Visupedia API library client for PHP

__This library is generated by [alpaca](https://github.com/pksunkara/alpaca)__

## Installation

Make sure you have [composer](https://getcomposer.org) installed.

Add the following to your composer.json

```js
{
    "require": {
        "visupedia/visupedia": "@dev"
    }
}
```

Update your dependencies

```bash
$ php composer.phar update
```

> This package follows the `PSR-0` convention names for its classes, which means you can easily integrate these classes loading in your own autoloader.

#### Versions

Works with [ 5.4 / 5.5 ]

## Usage

```php
<?php

// This file is generated by Composer
require_once 'vendor/autoload.php';

// Then we instantiate a client (as shown below)
```

### Build a client

##### Without any authentication

```php
$client = new Visupedia\Client();

// If you need to send options
$client = new Visupedia\Client(array(), $clientOptions);
```

### Client Options

The following options are available while instantiating a client:

 * __base__: Base url for the api
 * __api_version__: Default version of the api (to be used in url)
 * __user_agent__: Default user-agent for all requests
 * __headers__: Default headers for all requests
 * __request_type__: Default format of the request body

### Response information

__All the callbacks provided to an api call will recieve the response as shown below__

```php
$response = $client->klass('args')->method('args', $methodOptions);

$response->code;
// >>> 200

$response->headers;
// >>> array('x-server' => 'apache')
```

### Method Options

The following options are available while calling a method of an api:

 * __api_version__: Version of the api (to be used in url)
 * __headers__: Headers for the request
 * __query__: Query parameters for the url
 * __body__: Body of the request
 * __request_type__: Format of the request body

### Request body information

Set __request_type__ in options to modify the body accordingly

##### RAW request

When the value is set to __raw__, don't modify the body at all.

```php
$body = 'username=pksunkara';
// >>> 'username=pksunkara'
```

### Visu api

Returns an MyVisu api instance

The following arguments are required:

 * __key__: The api key provided by Visupedia

```php
$visu = $client->visu("53214f86e2ae54.93050075");
```

##### Query a Visu (GET /api?key=:key&id=:id&lang=:lang&version=:version)

Returns all information about the wanted Visu

The following arguments are required:

 * __id__: The unique ID of the Visu
 * __lang__: The language code wanted for the Visu
 * __version__: Use a specific version of our API

```php
$response = $visu->get("5396d8c752cfd8.93460735", "fr", "2", $options);
```

## Contributors
Here is a list of [Contributors](https://github.com/visupedia/visupedia-api-php/contributors)

### TODO

## License
MIT

## Bug Reports
Report [here](https://github.com/visupedia/visupedia-api-php/issues).

## Contact
Gaël Gillard (dev@visupedia.net)
