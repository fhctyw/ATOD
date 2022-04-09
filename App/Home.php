<?php

namespace App;

use \Core\View;


class Home extends \Core\Controller
{
    public function indexAction()
    {
        View::render('index.html');
    }
}