<?php

class Countries extends DataObject
{

    private static $db = array(
        'Name'        => 'Varchar(255)',
        'IsoCode'    => 'Varchar(10)',
    );

    private static $singular_name = "Country";
    private static $plural_name = "Countries";

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
        return $fields;
    }
}
