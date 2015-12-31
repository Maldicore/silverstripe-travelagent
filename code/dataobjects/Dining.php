<?php 
class Dining extends DataObject
{
    
    private static $db = array(
        'Name'            => 'Varchar',
        'Introduction'    => 'Text',
    );

    private static $has_one = array(
        'Resort'        => 'ResortPage',
        'Safari'        => 'SafariPage',
        'CityHotel'        => 'CityHotelPage'
    );

    private static $many_many = array(
        'DiningImages'            => 'Image'
    );

    private static $singular_name = "Dining";
    private static $plural_name = "Dining";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("ResortID");
        $fields->removeByName("SafariID");
        $fields->removeByName("CityHotelID");
        $fields->removeFieldFromTab("Root", "DiningImages");
        $fields->dataFieldByName('Name')->SetTitle('Dining Name');

        $fields->addFieldToTab(
            'Root.Main',
            $uploadField = new uploadField(
                $name = "DiningImages",
                $title = "Upload one or more images (max 10 in total)"
                )
            );
        $uploadField->setAllowedMaxFileNumber(10);

        return $fields;
    }
}
