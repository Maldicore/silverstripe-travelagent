<?php
class BookingRequests extends DataObject {
	private static $db = array(
		'Name' 				=> 'Varchar(255)',
		'Email' 			=> 'Varchar(255)',
		'Phone'				=> 'Varchar(255)',
		'Fax'				=> 'Varchar(255)',
		'Sex'				=> 'Enum(array("Male","Female"))',
		'NoOfAdults'		=> 'Decimal',
		'NoOfChildren'		=> 'Decimal',
		'NoOfInfants'		=> 'Decimal',
		'ArrivalDate'		=> 'Date',
		'ArrivalFlight'		=> 'Varchar(40)',
		'DepartureDate'		=> 'Date',
		'DepartureFlight'	=> 'Varchar(40)',
		'NoOfNights'		=> 'Decimal',
		'Comments'			=> 'Text',
	);

	private static $has_one = array(
		'Nationality'		=> 'Countries',
		'Resort'			=> 'ResortPage',
		'CityHotel'			=> 'CityHotelPage',
		'Safari'			=> 'SafariPage',
		'Room'				=> 'Rooms',
		'Route'				=> 'Routes'
	);
}