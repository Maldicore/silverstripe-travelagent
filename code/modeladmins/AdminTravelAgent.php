<?php 
/**
* Common Data
* Common Data for Travel Agent
*/
class AdminTravelAgent extends ModelAdmin
{
    private static $managed_models = array('Atolls','Islands','Categories','Tags','HolidayTypes','TransferTypes','Countries','BookingRequests');
    private static $url_segment = 'ta_common';
    private static $menu_title = 'Travel Agent Data';
    private static $menu_priority = 1;
}
