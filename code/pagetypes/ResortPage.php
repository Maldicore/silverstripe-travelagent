<?php
class ResortPage extends Page {

	private static $db = array(
		'NoOfRooms'			=> 'Int',
		'AirportDistance'	=> 'Varchar',
		'Rating'			=> 'Decimal',
		'InSide'			=> 'Boolean',
		'Featured'			=> 'Boolean',
		'Cordinates'		=> 'Varchar',
		);

	private static $has_one = array(
		'Atoll'				=> 'Atolls',
		'Island'			=> 'Islands',
		'Category'			=> 'Categories',
		'TransferType'		=> 'TransferTypes'
		);

	private static $has_many = array(
		'Rooms'				=> 'Rooms',
		'Dining'			=> 'Dining',
		'Facilities'		=> 'Facilities',
		'Activities'		=> 'Activities',
		);

	private static $many_many = array(
        'ResortImages'		=> 'Image',
		'Tags'				=> 'Tags',
		'HolidayTypes'		=> 'HolidayTypes'
    	);

	public function getCMSFields() {
	    $fields = parent::getCMSFields();
	    
	    $fields->dataFieldByName('Title')->setTitle('Resort Name');
	    $fields->dataFieldByName('Content')->setTitle('Resort Introduction');
	    $fields->insertBefore(NumericField::create("NoOfRooms")->setTitle("Total Number of Rooms"),'Content');
	    $fields->insertBefore(TextField::create("AirportDistance")->setTitle("Distance from Airport"),'Content');
	    $fields->addFieldToTab('Root.Main', new DropdownField('AtollID','Atoll', Atolls::get()->map('ID', 'Name')),'Content'); 
	    $fields->addFieldToTab('Root.Main', new DropdownField('IslandID','Island', Islands::get()->map('ID', 'Name')),'Content'); 
	    $fields->addFieldToTab('Root.Main', new DropdownField('CategoryID','Category', Categories::get()->map('ID', 'Name')),'Content'); 
	    $fields->addFieldToTab('Root.Main', new DropdownField('TransferTypeID','TransferType', TransferTypes::get()->map('ID', 'Name')),'Content'); 
	    $fields->insertBefore(NumericField::create("Rating")->setTitle("Star Rating"),'Content');
	    $fields->insertBefore(CheckboxField::create("InSide")->setTitle("Show Resort in Slide Show"),'Content');
	    $fields->insertBefore(CheckboxField::create("Featured")->setTitle("Show Resort in Featured List"),'Content');
	    $fields->insertBefore(TextField::create("Cordinates")->setTitle("Map Cordinates, Longitute & Latitude, separated by comma"),'Content');

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
        	'Root.ResortImages',
        	$uploadField = new uploadField(
        		$name = "ResortImages",
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

        return $fields;
      }
}

class ResortPage_Controller extends Page_Controller{

	public function init(){
		parent::init();
	}
}