<?php 
class Atolls extends DataObject{
	
	private static $db = array(
		'Name'			=> 'Varchar',
		'DhivehiName'	=> 'Varchar',
		'Code'			=> 'Varchar'
	);

	private static $has_many = array(
		'Island'		=> 'Islands'
	);

	private static $singular_name = "Atoll";
	private static $plural_name = "Atolls";

	public function getCMSFields(){
		
		$fields = parent::getCMSFields();
		return $fields;
	}

 }

 ?>