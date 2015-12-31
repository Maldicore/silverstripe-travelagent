<?php 
class Tags extends DataObject
{
    
    private static $db = array(
        'Name'            => 'Varchar',
    );

    private static $has_many_many = array(
        'Resort'        => 'ResortPage',
        'Safari'        => 'SafariPage',
        'CityHotel'        => 'CityHotelPage'
    );

    private static $singular_name = "Tag";
    private static $plural_name = "Tags";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        $fields->dataFieldByName('Name')->SetTitle('Tag Name');

        $fields->removeByName("ResortID");
        $fields->removeByName("SafariID");
        $fields->removeByName("CityHotelID");

        return $fields;
    }
}
