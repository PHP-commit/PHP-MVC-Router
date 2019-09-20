<?php

require_once 'model/Logic.php';

class Page
{

    public function __construct()
    {
        $this->Logic = new Logic();

    }



    public function Home()
    {
        $content = '<h1>Home Page</h1>';
        include "view/page/content.php";

    }

    /**
     * Example of request reading all the skills from the database.
     * send request to Logic
     */

//    public function Skils()
//    {
//        $content = $this->Logic->CV();
//        include "view/page/content.php";
//
//    }

}