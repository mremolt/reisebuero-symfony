<?php

namespace Wma\ReisebueroBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WmaReisebueroBundle:Default:index.html.twig');
    }
}
