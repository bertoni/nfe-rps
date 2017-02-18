<?php

namespace NfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        phpinfo();
        /* return $this->render('NfeBundle:Default:index.html.twig'); */
    }
}
