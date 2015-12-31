<?php 
class TransferTypes extends DataObject
{
    
    private static $db = array(
        'Name'            => 'Varchar',
    );

    private static $has_one = array(
        'Resort'        => 'ResortPage',
        'Safari'        => 'SafariPage',
        'CityHotel'        => 'CityHotelPage'
    );

    private static $singular_name = "Transfer Type";
    private static $plural_name = "Transfer Types";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("ResortID");
        $fields->removeByName("SafariID");
        $fields->removeByName("CityHotelID");
        $fields->dataFieldByName('Name')->SetTitle('Transfer Type Name');

        return $fields;
    }
}
