<?php

namespace gorriecoe\DirectionsLink;

use BetterBrief\GoogleMapField;
use SilverStripe\Forms\FieldList;
use SilverStripe\ORM\DataExtension;
use UncleCheese\DisplayLogic\Forms\Wrapper;

/**
 * Adds a directions link type to Link Object.
 *
 * @package silverstripe-DirectionsLink
 */
class DirectionsLink extends DataExtension
{
    /**
     * A map of object types that can be linked to
     * Custom dataobjects can be added to this
     *
     * @var array
     **/
    private static $types = [
        'Directions' => 'Directions link',
    ];

    /**
     * Database fields
     * @var array
     */
    private static $db = [
        'Latitude' => 'Varchar',
        'Longitude' => 'Varchar'
    ];

    /**
     * Update Fields
     * @return FieldList
     */
    public function updateCMSFields(FieldList $fields)
    {
        $owner = $this->owner;
        $fields->removeByName([
            'Latitude',
            'Longitude'
        ]);
        $fields->insertAfter(
            'Type',
            Wrapper::create(
                GoogleMapField::create(
                    $owner,
                    _t(__CLASS__ . '.LOCATION', 'Location')
                )
            )
            ->displayIf('Type')->isEqualTo('Directions')->end()
        );
        return $fields;
    }

    /**
     * Update LinkURL
     */
    public function updateLinkURL(&$linkURL)
    {
        $owner = $this->owner;
        if ($owner->Type == 'Directions') {
            $linkURL = 'https://maps.google.com/maps?saddr=Current+Location&daddr=';
            $linkURL .= $owner->Latitude;
            $linkURL .= '/';
            $linkURL .= $owner->Longitude;
        }
    }
}
