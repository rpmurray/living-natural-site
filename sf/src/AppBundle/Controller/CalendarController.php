<?php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CalendarController extends Controller {
    /**
     * @Method("GET")
     * @Route("/calendar")
     */
    public function displayAction() {
        return $this->render(':calendar:calendar.html.twig');
    }
}

