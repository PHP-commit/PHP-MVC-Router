<?php

/**
 * Class Router calls the controller with methods and optional parameters
 *  controller, method and parameters are determined by the current url
 */
class Router
{

    public function __construct()
    {
        // Get the current url
        $url = $_SERVER['REQUEST_URI'];

        // Convert url to a array
        $packets = explode('/',$url);

        //call determineDestination()
        $this->determineDestination($packets);


    }

    public function filterPackets($packets)
    {
        // searches through the array and returns index of router
        $keyResult = array_search("router",$packets);
        if ($keyResult!= null)
        {
            // if index exists then remove router from array
            unset($packets[$keyResult]);
            //removes all empty indexes in array and puts them in numerical order
        }
        else
        {
            return $packets;
        }
    }
    public function determineDestination($packets='')
    {
        //slice index 4 from array packets and puts it into variable params
        $params = array_slice($packets, 4);

        // calls filterPackets()
        $packets = $this->filterPackets($packets);

        //if packets are empty than set to default location.
        if (isset($packets[1]) && isset($packets[2]) && !empty($packets[1] && $packets[2]))
        {
            $this->sendToDestination($packets[2],$packets[3],$params);
        }
        else
        {

            //this sets website to page home
            $classname = "Page";
            $method = "Home";
            // call sendToDestination()
            $this->sendToDestination($classname, $method);
        }
    }

    public function sendToDestination($classname,$method,$params = [])
    {
        //sets class variable to path of controller//
        $class =  APP_DIR . '/controller/' . $classname . '.php';

        require_once($class);
        // make instance of class
        $obj = new $classname;
        // call class with method and params as an array
        die(call_user_func_array(array($obj, $method), $params));
    }


}

