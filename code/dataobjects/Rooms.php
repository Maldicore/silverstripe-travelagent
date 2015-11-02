<?php 
class Rooms extends DataObject{
	
	private static $db = array(
		'Name'			=> 'Varchar',
		'Introduction'	=> 'Text',
	);

	private static $has_one = array(
		'Resort'		=> 'ResortPage',
		'Safari'		=> 'SafariPage',
		'CityHotel'		=> 'CityHotelPage'
	);

	private static $many_many = array(
        'RoomImages'			=> 'Image'
    );

	private static $singular_name = "Room";
	private static $plural_name = "Rooms";

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$fields->removeByName("ResortID");
		$fields->removeByName("SafariID");
		$fields->removeByName("CityHotelID");
		$fields->removeFieldFromTab("Root", "RoomImages");
		$fields->dataFieldByName('Name')->SetTitle('Room Name');

		$fields->addFieldToTab(
        	'Root.Main',
        	$uploadField = new uploadField(
        		$name = "RoomImages",
        		$title = "Upload one or more images (max 10 in total)"
        		)
        	);
        $uploadField->setAllowedMaxFileNumber(10);

		return $fields;
	}

 }

 ?>