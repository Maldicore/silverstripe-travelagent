<?php
class BookNowPage extends Page {

	private static $db = array(
		'Info'	=>	"Varchar(255)"
	);

	private static $has_one = array(
	);

	public function getCMSFields() {
	    $fields = parent::getCMSFields();
	    
	    $fields->insertBefore(TextareaField::create("Info")->setTitle("Additional Info"),'Content');

	    return $fields;
	}

}
class BookNowPage_Controller extends Page_Controller {

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
	private static $allowed_actions = array (
	'book'
	);

	public function init() {
		parent::init();

	}

	public function book($request){
		$type = $request['type'];
		$property = $request['property'];
		$room = $request['room'];
		if($type && $property){
			// TODO: check for allowed Types
			// TODO: List of Resorts or CityHotels or Safaris
			// TODO: check if the property exist
			$prpertyExist = true;

			if($propertyExist){
				// check if booking already exists
				
				// $bookCheck = BookingRequests::get()
				// ->filter(array(
				// 	'PropertyName' => $properyexist->Name,
				// 	'FirstName' => $request['FirstName'],
				// 	'LastName' => $request['LastName'],
				// 	'ArrivalDate' => $request['ArrivalDate'],
				// 	'ArrivalFlight' => $request['ArrivalFlight']
				// ))->First();

				$bookExist = false;

				if($bookExist){
					Session::set('ActionStatus', 'danger');
					Session::set('ActionMessage', 'You Already Have A Booking Request for ' . $properyexist->Name);
					return $this->redirectBack();
				} else {
					// save the booking
					// $res = new BookingRequests();
					// $res->PropertyType = $request['prpertyType'];
					// $res->PropertyName = $request['prpertyName'];
					// TODO: rest of the fields
					// $res->write();
					Session::set('ActionStatus', 'success');
					Session::set('ActionMessage', 'Your Booking is Saved');
					return $this->redirectBack();
				}
			} else {
				Session::set('ActionStatus', 'warning');
				Session::set('ActionMessage', 'Property Not Found!');
				return $this->redirectBack();
			}
		} else {
			Session::set('ActionStatus', 'warning');
			Session::set('ActionMessage', 'Property Not Found!');
			return $this->redirectBack();
		}
	}

	public function propertyType(){
		$type = $this->getRequest()->getVar('type');
		if($type){
			return $type;
		} else {
			return 'Any';
		}
	}

	public function propertyName(){
		$name = $this->getRequest()->getVar('name');
		if($name){
			return $name;
		} else {
			return 'Any';
		}
	}

	public function propertyRoom(){
		$room = $this->getRequest()->getVar('room');
		if($room){
			return $room;
		} else {
			return 'Any';
		}
	}

	public function countries(){
		return Countries::get();
	}
}
