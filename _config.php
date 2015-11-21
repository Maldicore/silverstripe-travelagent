<?php
// Constants
define('TRAVEL_AGENT_DIR',basename(dirname(__FILE__)));

// Extensions
Image::add_extension('ResortImagesExtension');
Image::add_extension('SafariImagesExtension');
Image::add_extension('RoomImagesExtension');
Image::add_extension('DiningImagesExtension');
Image::add_extension('FacilityImagesExtension');
Image::add_extension('ActivityImagesExtension');
Image::add_extension('CityHotelImagesExtension');
Page::add_extension('PageExtension');

// Site Configuration
Object::add_extension('SiteConfig', 'TravelAgentSiteConfig');
?>