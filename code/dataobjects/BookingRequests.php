<?php
class BookingRequests extends DataObject
{
    private static $db = array(
        'PropertyType'        => 'Varchar(255)',
        'PropertyName'        => 'Varchar(255)',
        'PropertyRoom'        => 'Varchar(255)',
        'PropertyRoute'        => 'Varchar(255)',
        'PropertyTransfer'    => 'Varchar(255)',
        'FirstName'            => 'Varchar(255)',
        'LastName'            => 'Varchar(255)',
        'Address'            => 'Varchar(255)',
        'City'                => 'Varchar(255)',
        'Email'            => 'Varchar(255)',
        'Phone'                => 'Varchar(255)',
        'Fax'                => 'Varchar(255)',
        'Sex'                => 'Enum(array("Male","Female"))',
        'NoOfAdults'        => 'Decimal',
        'NoOfChildren'        => 'Decimal',
        'NoOfInfants'        => 'Decimal',
        'ArrivalDate'        => 'Date',
        'ArrivalFlight'        => 'Varchar(40)',
        'DepartureDate'        => 'Date',
        'DepartureFlight'    => 'Varchar(40)',
        'NoOfNights'        => 'Decimal',
        'NoOfRooms'            => 'Decimal',
        'ExtraBed'            => 'Decimal',
        'Payment'            => 'Varchar(255)',
        'Comments'            => 'Text'
    );

    private static $has_one = array(
        'Nationality'        => 'Countries'
    );
}
