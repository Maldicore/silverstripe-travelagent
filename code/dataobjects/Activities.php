<?php 
class Activities extends DataObject{
	
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
        'ActivityImages'		=> 'Image'
    );

	private static $singular_name = "Activity";
	private static $plural_name = "Activities";

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$fields->removeByName("ResortID");
		$fields->removeByName("SafariID");
		$fields->removeByName("CityHotelID");
		$fields->removeFieldFromTab("Root", "ActivityImages");
		$fields->dataFieldByName('Name')->SetTitle('Activity Name');

		$fields->addFieldToTab(
        	'Root.Main',
        	$uploadField = new uploadField(
        		$name = "ActivityImages",
        		$title = "Upload one or more images (max 10 in total)"
        		)
        	);
        $uploadField->setAllowedMaxFileNumber(10);

		return $fields;
	}

 }

 ?>