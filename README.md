# Silverstripe direction link

Adds a direction link type to [gorriecoe/silverstripe-link](https://github.com/gorriecoe/silverstripe-link).  Allowing editor to select a location on google maps, that will then produce a google maps direction link.

## Installation

Composer is the recommended way of installing SilverStripe modules.

```
composer require gorriecoe/silverstripe-directionlink
```

Directions link uses [GoogleMapField](https://github.com/BetterBrief/silverstripe-googlemapfield).  So you will need to configure this in your config.yml.

```
BetterBrief\GoogleMapField:
  default_options:
    api_key: '[google-api-key]'
```

For more information check out [BetterBrief\GoogleMapField](https://github.com/BetterBrief/silverstripe-googlemapfield).

## Requirements

- [gorriecoe/silverstripe-link](https://github.com/gorriecoe/silverstripe-link) ^1.2.3

## Maintainers

- [Gorrie Coe](https://github.com/gorriecoe)

## Example

Below are examples of link output:

[Amberly NZ](https://maps.google.com/maps?saddr=Current+Location&amp;daddr=-43.15577642393746/172.72987286045432)
[Feilding NZ](https://maps.google.com/maps?saddr=Current+Location&daddr=-40.22610854373743/175.568486474398)
