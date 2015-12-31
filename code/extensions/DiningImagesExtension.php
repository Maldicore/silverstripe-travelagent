<?php 
class DiningImagesExtension extends DataExtension
{
    private static $belongs_many_many = array('DiningImages' => 'Dining');
}
