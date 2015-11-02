<?php 
class Routes extends DataObject{
	
	private static $db = array(
		'Name'			=> 'Varchar',
		'Info'			=> 'Text',
	);

	private static $has_one = array(
		'Safari'		=> 'SafariPage',
        'RouteMap'		=> 'File'
    );

	private static $singular_name = "Route";
	private static $plural_name = "Routes";

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$fields->removeByName("SafariID");
		$fields->dataFieldByName('Name')->SetTitle('Route Name');

		return $fields;
	}

 }

 ?>