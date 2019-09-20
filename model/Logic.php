<?php
require 'DataHandler.php';


class Logic
{

    private $Datahandler;

    function __construct()
    {
        $this->DataHandler = new Datahandler("mysql","localhost", "portfolio", "root", "");
    }


/**
 * example of read all data from database
 * your request Query to get all skills from the database
 * @return a array af skils
 */
//    public function getSkils()
//    {
//        $sql = "SELECT * FROM `skils` WHERE ";
//        $stmt = $this->DataHandler->readAllData($sql);
//        return $stmt;
//    }


    /**
     * example of generate a html page for your content witch earlier
     * you requested from database
     * @return the skils html page.
     */
//    public function CV()
//    {
//        // call yor skils array
//        $skils = $this->getSkils();
//
//        $html = '<div class="container">';
//        $html .= '<ul>';
//        foreach ($skils as $value)
//        {
//            $html .= '<li>'.$value["skil_title"].'</li>';
//        }
//
//        $html .= '</div></ul>';
//        return $html;
//    }


}