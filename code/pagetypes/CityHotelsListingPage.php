<?php
class CityHotelsListingPage extends Page {
	private static $has_one = array(
        'DefaultPhoto' => 'Image'
    );
	
   	private static $allowed_children = array('CityHotelPage');
	// private static $icon = TRAVEL_AGENT_DIR."/images/icons/resortlisting.gif";

	public function getCMSFields() {
        $imgfield = UploadField::create('DefaultPhoto')->setTitle("Default Cover Photo (Used on individual safari if feature photo is empty)");
        // $imgfield->folderName = "HolderPage"; 
        $imgfield->getValidator()->allowedExtensions = array('jpg','jpeg','gif','png');
	    $fields = parent::getCMSFields();
    	$fields->insertBefore($imgfield, 'Content');
	    return $fields;
    }
}
class CityHotelsListingPage_Controller extends Page_Controller {
	
	public function init() {
    	parent::init();
   	}

	function getCityHotels() {
		return CityHotelPage::get()->sort("Created","DESC");
	}

	public function PaginatedPages($num=15) {
	  	$PaginatedPages = new PaginatedList($this->getCityHotels(), $this->request);
	  	$PaginatedPages->setPageLength($num);
	  	// Debug::show($PaginatedPages);
	  	// break;
	  	return $PaginatedPages;
	}
}