<?php
class SafariPage extends Page {

	private static $db = array(
        'NoOfRooms'         => 'Int',
        'Rating'			=> 'Decimal',
        'inSlide'			=> 'Boolean',
        'Featured'			=> 'Boolean'
	);

	private static $has_one = array(
		'Category'			=> 'Categories'
	);

	private static $has_many = array(
		'Rooms'				=> 'Rooms',
		'Dining'			=> 'Dining',
		'Facilities'		=> 'Facilities',
		'Activities'		=> 'Activities',
        'Routes'            => 'Routes',
	);

	private static $many_many = array(
        'SafariImages'		=> 'Image',
        'Tags'              => 'Tags',
        'HolidayTypes'      => 'HolidayTypes'
    );


	public function getCMSFields() {
	    $fields = parent::getCMSFields();
	    
        $fields->dataFieldByName('Title')->setTitle('Safari Name');
	    $fields->dataFieldByName('Content')->setTitle('Safari Introduction');
	    $fields->insertBefore(NumericField::create("NoOfRooms")->setTitle("Total Number of Rooms"),'Content');
	    $fields->insertBefore(NumericField::create("Rating")->setTitle("Star Rating"),'Content');
	    $fields->addFieldToTab('Root.Main', new DropdownField('CategoryID','Category', Categories::get()->map('ID', 'Name')),'Content'); 
	    $fields->insertBefore(CheckboxField::create("InSide")->setTitle("Show Safari in Slide Show"),'Content');
	    $fields->insertBefore(CheckboxField::create("Featured")->setTitle("Show Safari in Featured List"),'Content');

        $defaultTag = $this->Tags()->column('ID');
        $tagMap = Tags::get()->map('ID','Name')->toArray();
        $tagList = ListboxField::create('Tags','Tags')
        	->setMultiple(true)
        	->setSource($tagMap)
        	->setDefaultItems($defaultTag);
        $fields->addFieldToTab('Root.Main',$tagList,'Content');

        $defaultItem = $this->HolidayTypes()->column('ID');
        $Map = HolidayTypes::get()->map('ID','Name')->toArray();
        $List = ListboxField::create('HolidayTypes','Holiday Types')
        	->setMultiple(true)
        	->setSource($Map)
        	->setDefaultItems($defaultItem);
        $fields->addFieldToTab('Root.Main',$List,'Content');

        $fields->addFieldToTab(
        	'Root.SafariImages',
        	$uploadField = new uploadField(
        		$name = "SafariImages",
        		$title = "Upload one or more images (max 10 in total)"
        		)
        	);
        $uploadField->setAllowedMaxFileNumber(10);

        $gridConfig = GridFieldConfig_RelationEditor::create();

        $GridField = new GridField('Rooms', 'Rooms', $this->Rooms(), $gridConfig);
        $fields->addFieldToTab("Root.Rooms", $GridField);

        $GridField = new GridField('Dining', 'Dining', $this->Dining(), $gridConfig);
        $fields->addFieldToTab("Root.Dining", $GridField);

        $GridField = new GridField('Facilities', 'Facilities', $this->Facilities(), $gridConfig);
        $fields->addFieldToTab("Root.Facilities", $GridField);

        $GridField = new GridField('Activities', 'Activities', $this->Activities(), $gridConfig);
        $fields->addFieldToTab("Root.Activities", $GridField);

        $GridField = new GridField('Routes', 'Routes', $this->Routes(), $gridConfig);
        $fields->addFieldToTab("Root.Routes", $GridField);

        return $fields;
      }
}

class SafariPage_Controller extends Page_Controller {

	public function init(){
		parent::init();
	}
}