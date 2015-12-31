<?php
class ResortsListingPage extends Page
{
    private static $has_one = array(
        'DefaultPhoto' => 'Image'
    );

    public static $allowed_actions = array(
        'show'
    );

    private static $many_many = array(
        'Resort'        => 'Resorts'
    );
    
    private static $allowed_children = array('ResortPage');
    // private static $icon = TRAVEL_AGENT_DIR."/images/icons/resortlisting.gif";

    public function getCMSFields()
    {
        $imgfield = UploadField::create('DefaultPhoto')->setTitle("Default Cover Photo (Used on individual resort if feature photo is empty)");
        // $imgfield->folderName = "HolderPage"; 
        $imgfield->getValidator()->allowedExtensions = array('jpg','jpeg','gif','png');
        $fields = parent::getCMSFields();
        $fields->insertBefore($imgfield, 'Content');
        return $fields;
    }
}
class ResortsListingPage_Controller extends Page_Controller
{
    
    private static $allowed_actions = array('show');

    public function init()
    {
        parent::init();
    }

    public function getResorts()
    {
        return ResortPage::get()->filter("ParentID", "$this->ID")->sort('RAND()');
    }

    public function PaginatedPages($num=15)
    {
        $PaginatedPages = new PaginatedList($this->getResorts(), $this->request);
        $PaginatedPages->setPageLength($num);
        // Debug::show($PaginatedPages);
        // break;
        return $PaginatedPages;
    }
}
