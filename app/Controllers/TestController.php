<?php

namespace App\Controllers;

use Core\Controller;

class TestController extends Controller
{
    public function indexAction()
    {
        echo 'This is a message from the TestController';
    }
}