<?php 
class ResortImagesExtension extends DataExtension
{
    private static $belongs_many_many = array('ResortImages' => 'ResortPage');
}
