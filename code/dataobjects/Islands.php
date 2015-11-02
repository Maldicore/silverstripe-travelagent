<?php 
class Islands extends DataObject{
	
	private static $db = array(
		'Name'			=> 'Varchar',
	);

	private static $has_one = array(
		'Atoll'			=> 'Atolls'
	);

	private static $singular_name = "Atoll";
	private static $plural_name = "Atolls";

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();

		$fields->removeByName('AtollID');

		return $fields;
	}

 }

 ?>
