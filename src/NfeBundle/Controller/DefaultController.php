<?php

namespace NfeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('NfeBundle:Page:index.html.twig');
    }
}
