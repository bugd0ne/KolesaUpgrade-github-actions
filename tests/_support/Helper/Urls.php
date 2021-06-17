<?php
namespace Helper;

// here you can define custom actions
// all public methods declared in helper class will be available in $I

class Urls extends \Codeception\Module
{
    /**
     * value for POST request
     */
    public static $createUser = '/human';

    /**
     * value for GET request
     */
    public static $getUserByOwner = '/people';

    /**
     * value for PUT request
     */
    public static $editUser = '/human?_id=';

    /**
     * value for PUT request
     */
    public static $deleteUser = '/human?_id=';
}
