<?php 
/**
* Common Data
* Common Data for Travel Agent
*/
class AdminCommon extends ModelAdmin {
	private static $managed_models = array('Atolls','Categories','Tags','HolidayTypes','TransferTypes','Countries','BookingRequests');
	private static $url_segment = 'ta_common';
	private static $menu_title = 'Common Data';
	private static $menu_priority = 1;
}

 ?>