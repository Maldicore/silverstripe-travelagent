<?php
 
class TravelAgentSiteConfig extends DataExtension {     
	
	 private static $has_one = array(
		'LogoImage' => 'Image',		
	);
		
	 private static $db = array(			
		'EmailAddress' => "Varchar(250)",
		'ContactNumber' => "Varchar(250)",
		'FacebookURL' => "Varchar(250)",
		'TwitterURL' => "Varchar(250)",
	  );
 
    public function updateCMSFields(FieldList $fields) {
	   $fields->addFieldToTab("Root.Main", new TextField("ContactNumber", "Enter the Contact Number"));	
	   $fields->addFieldToTab("Root.Main", new TextField("EmailAddress", "Enter the Email Address"));	
	   $fields->addFieldToTab("Root.Main", new UploadField("LogoImage", "Choose an image for Website logo"));
	   $fields->addFieldToTab("Root.Main", new TextField("FacebookURL", "Enter the full URL of Facebook page"));
	   $fields->addFieldToTab("Root.Main", new TextField("TwitterURL", "Enter the full URL of Twitter page"));
    }
}