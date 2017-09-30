<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CalendarController extends Controller {
    /**
     * @Route("/calendar")
     */
    public function displayAction() {
        return $this->render(':calendar:calendar.html.twig');
    }
}

