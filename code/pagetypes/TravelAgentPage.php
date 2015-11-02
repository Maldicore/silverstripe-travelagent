<?php
class TravelAgentPage extends Page {
	
	// private static $db = array();

	private static $has_one = array(
		'FeaturePhoto' 		=> 'Image'
		);

	// private static $has_many = array();

	// private static $belong_to = array();

	// private static $many_many = array();

	// private static $has_many_many = array();

	public function getCMSFields(){
        $imgfield = UploadField::create('FeaturePhoto')->setTitle("Feature Photo");
        // $imgfield->folderName = "TravelAgentImages"; 
        $imgfield->getValidator()->allowedExtensions = array('jpg','jpeg','gif','png');
	    $fields = parent::getCMSFields();
	    $fields->insertBefore($imgfield, 'Content');
	    return $fields;
	}
}

class TravelAgentPage_Controller extends Page_Controller {

	// private static $allowed_actions = array();

	public function init(){
		parent::init();
	}
}
?>