<?php 
class Categories extends DataObject
{
    
    private static $db = array(
        'Name'            => 'Varchar'
    );

    private static $has_many = array(
        'Resort'        => 'ResortPage',
        'Safari'        => 'SafariPage',
        'CityHotel'        => 'CityHotelPage'
    );

    private static $singular_name = "Category";
    private static $plural_name = "Categories";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        return $fields;
    }
}
