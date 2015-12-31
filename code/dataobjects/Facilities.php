<?php 
class Facilities extends DataObject
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
        'FacilityImages'        => 'Image'
    );

    private static $singular_name = "Facility";
    private static $plural_name = "Facilities";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->removeByName("ResortID");
        $fields->removeByName("SafariID");
        $fields->removeByName("CityHotelID");
        $fields->removeFieldFromTab("Root", "FacilityImages");
        $fields->dataFieldByName('Name')->SetTitle('Facility Name');

        $fields->addFieldToTab(
            'Root.Main',
            $uploadField = new uploadField(
                $name = "FacilityImages",
                $title = "Upload one or more images (max 10 in total)"
                )
            );
        $uploadField->setAllowedMaxFileNumber(10);

        return $fields;
    }
}
