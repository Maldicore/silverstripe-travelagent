<?php 
class PageExtension extends DataExtension
{
    
    public function BookingPageURL()
    {
        $page = BookNowPage::get()->First();
        if ($page) {
            return $page->Link();
        } else {
            return "booking";
        }
    }
}
