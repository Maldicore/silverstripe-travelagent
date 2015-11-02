<?php 
class BookNowPage extends Page{

}

class BookNowPage_Controller extends Page_Controller{

	private static $allowed_actions = array ('Form');

	public function init(){
		parent::init();
	}

	public function Form() { 
		// Retreive Form Fields
		$form_action = new FieldList(
			new FormAction('submit',"Book Now")
			);
		$form_validator = new RequiredFields('Name', 'Email');

		$form = new Form($this, 'Form', singleton('BookingRequests')->getFrontEndFields(), $form_action, $form_validator); 

		return $form;
	}

	function submit($data, $form){
		/* email the form data */
		$config = SiteConfig::current_site_config(); 
    	$site_email_address = $config->EmailAddress;

    	if(empty($site_email_address)){
    		$site_email_address = "info@maldicore.com";
    	}

        $email = new Email(); 
        
        $email->setTo($site_email_address); 
        $email->setFrom($data['Email']); 
        $email->setSubject("Booking Requestion from {$data["Name"]}"); 
        
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
        $email->send(); 
        

		/* save data to dataobject model */
	
		$form_data = new BookingRequests();
		$form_data->update($data);
		$form_data->write();

		return array(
            'Content' => '<p>Thank you for your reservation request.</p>',
            'Form' => ''
        );
	}
}

 ?>