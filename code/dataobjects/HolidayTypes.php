<?php 
class HolidayTypes extends DataObject{
	
	private static $db = array(
		'Name'			=> 'Varchar',
		'Introduction'	=> 'Text'
	);

	private static $has_many_many = array(
		'Resort'		=> 'ResortPage',
		'Safari'		=> 'SafariPage',
		'CityHotel'		=> 'CityHotelPage',
	);

	private static $has_one = array(
        'HolidayImage'	=> 'Image'
	);

	private static $singular_name = "Holiday Type";
	private static $plural_name = "Holiday Types";

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$fields->removeByName("ResortID");
		$fields->removeByName("SafariID");
		$fields->removeByName("CityHotelID");
		$fields->removeFieldFromTab("Root", "HolidayImages");
		$fields->dataFieldByName('Name')->SetTitle('Holiday Type Name');

		return $fields;
	}

 }

 ?>