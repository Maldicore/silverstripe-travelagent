<?php
class ContactPage extends Page {

	private static $db = array(
		"Address" 		=> "Text",
		"Email" 		=> "Text",
		"Phone" 		=> "Text",
		"Hotline"		=> "Text",
		"Fax"			=> "Text",
		"LatLon" 		=> "Text",
		"Facebook" 		=> "Text",
		"Twitter" 		=> "Text",
		"GooglePlus" 	=> "Text",
		"LinkedIn" 		=> "Text",
		"Skype"			=> "Text",
		"Viber"			=> "Text"
	);

	public function getCMSFields() {
        $fields = parent::getCMSFields();
	    $fields->addFieldToTab('Root.Main', TextareaField::create("Address")->setTitle("Mail Address"), 'Content');
	    $fields->addFieldToTab('Root.Main', EmailField::create("Email")->setTitle("Email Address"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Phone")->setTitle("Phone Number"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Hotline")->setTitle("Hotline Number"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Fax")->setTitle("Fax Number"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Skype")->setTitle("Skype"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Viber")->setTitle("Viber Number"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("LatLon")->setTitle("Latitute,Longitude (separated by comma)"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Facebook")->setTitle("Facebook (complete link with https://"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("Twitter")->setTitle("Twitter (complete link with https://"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("GooglePlus")->setTitle("Google Plus (complete link with https://"), 'Content');
	    $fields->addFieldToTab('Root.Main', TextField::create("LinkedIn")->setTitle("LinkedIn (complete link with https://"), 'Content');
	    return $fields;
    }
}
class ContactPage_Controller extends Page_Controller {

	/**
	 * An array of actions that can be accessed via a request. Each array element should be an action name, and the
	 * permissions or conditions required to allow the user to access it.
	 *
	 * <code>
	 * array (
	 *     'action', // anyone can access this action
	 *     'action' => true, // same as above
	 *     'action' => 'ADMIN', // you must have ADMIN permissions to access this action
	 *     'action' => '->checkAction' // you can only access this action if $this->checkAction() returns true
	 * );
	 * </code>
	 *
	 * @var array
	 */
	private static $allowed_actions = array ('Form');

	public function init() {
		parent::init();

		// Note: you should use SS template require tags inside your templates 
		// instead of putting Requirements calls here.  However these are 
		// included so that our older themes still work
		// Requirements::combine_js_with_jsmin = false;
		Requirements::themedCSS('reset');
		Requirements::themedCSS('layout'); 
		Requirements::themedCSS('typography'); 
		Requirements::themedCSS('form'); 

	}

	public function Form() { 
        $fields = new FieldList( 
            new TextField('Name'), 
            new EmailField('Email'), 
            new TextareaField('Message')
        ); 
        $actions = new FieldList( 
            new FormAction('submit', 'Submit') 
        ); 

        $validator = new RequiredFields('Name', 'Email', 'Message');

        return new Form($this, 'Form', $fields, $actions, $validator); 
    }

    public function submit($data, $form) { 

    	$config = SiteConfig::current_site_config(); 
    	$site_email_address = $config->EmailAddress;

    	if(empty($site_email_address)){
    		$site_email_address = "info@maldicore.com";
    	}


        $email = new Email(); 
        
        $email->setTo($site_email_address); 
        $email->setFrom($data['Email']); 
        $email->setSubject("Contact Message from {$data["Name"]}"); 
        
        unset($data['url']);
        unset($data['SecurityID']);
        unset($data['action_submit']);
    	
    	$messageBody = "";
    	foreach ($data as $key => $value) {
    		if(!empty($value)){
    			$messageBody = $messageBody . "<p><strong>". $key ."</strong> " . $value . "</p>";
    		}
    	}
        
        $email->setBody($messageBody); 
        // $email->send(); 
        return array(
            'Content' => '<p>Thank you for your feedback.</p>',
            'Form' => ''
        );
    }
}
