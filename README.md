Y2Marketplace
=============

Initial project optimization
Application Settings
User specific Settings
Manage Users / Roles / Permissions

## Installing via Composer

The recommended way to install Composer is through
[Composer](http://getcomposer.org).

```bash
# Install Composer
curl -sS https://getcomposer.org/installer | php
```

Next, run the Composer command to install the latest stable version of Guzzle:

```bash
composer require flydreamers/shipwire
```

After installing, you need to require Composer's autoloader:

```php
require 'vendor/autoload.php';
```

## Documentation

### Initial configuration

To configure the library just call ShipwireConnector::init() function to and start using it.

To use it you only have to configure your username and password in The clientyour config-local file like this:

```php
ShipwireConnector::init($config['username'], $config['password'], 'sandbox');
```

### Stock

To check for Stock of a product:

```php
$response = $stock->getStockBySKUs(['CAPTRACKERBLUE']);
```

If you have more than one SKU, just add them to the array like:

```php
$response = $stock->getStockBySKUs(['CAPTRACKERBLUE', 'CAPTRACKERRED', 'ETCETERA']);
```
Extra parameters can be used. See \flydreamers\shipwire\Stock for more information.

### Rates

You can ask Shipwire API for a shipping rate using Rate class.


```php
$rate = new Rate;
$options = [
    "currency" => "USD",
    "groupBy" => "all",
    "canSplit" => 1,
    "warehouseArea" => "US"
];

$address = Address::createFromArray([
    "address1" => "6501 Railroad Avenue SE",
    "address2" => "Room 315",
    "address3" => "",
    "city" => "Snoqualmie",
    "postalCode" => "85283",
    "region" => "WA",
    "country" => "US",
    "isCommercial" => 0,
    "isPoBox" => 0
]);

$items = [
    ['sku' => 'CAPTRACKERBLUE', 'quantity' => 3]
];

$shippingInfo = $rate->quote($address, $items, $config);
```

### Orders

```php
$order = new \flydreamers\shipwire\Order();

```

**TBD**

##Issues and Feature Requests

If you have issues to report, or issues to request, use the issue tracker in Github.

##Contributing

Currently, the library isn't very feature rich or mature. If you'd like to offer improvements:

1. Fork it
2. Create your feature branch `git checkout -b feature-name`
3. Commit your changes `git commit -am 'Add feature'` \*
4. Push the branch `git push origin feature-name`
5. Create a pull request

##Contact

Have a question? I'm on twitter: [@sebathi](https://twitter.com/sebathi)


##License

[MIT](License)