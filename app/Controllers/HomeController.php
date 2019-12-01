<?php

namespace App\Controllers;

use Core\View;
use Core\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        View::renderTemplate('home');
    }
}