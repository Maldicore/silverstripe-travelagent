<?php
class SafarisListingPage extends Page {
	private static $has_one = array(
        'DefaultPhoto' => 'Image'
    );
	
   	private static $allowed_children = array('SafariPage');
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
class SafarisListingPage_Controller extends Page_Controller {
	
	public function init() {
    	parent::init();
   	}

	function getSafaris() {
		return SafariPage::get()->sort("Created","DESC")->sort('RAND()');
	}

	public function PaginatedPages($num=15) {
	  	$PaginatedPages = new PaginatedList($this->getSafaris(), $this->request);
	  	$PaginatedPages->setPageLength($num);
	  	// Debug::show($PaginatedPages);
	  	// break;
	  	return $PaginatedPages;
	}
}