<?php
namespace AppBundle\Controller;

use AppBundle\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CalendarController extends Controller {
    /**
     * @Method("GET")
     * @Route("/calendar")
     */
    public function displayAction() {
        // check login
        $user = $this->validateLogin();
        $isEditor = empty($user) ? false : $user->hasRole('ROLE_EDITOR');

        $response = $this->render(
            ':calendar:calendar.html.twig',
            ['isEditor' => $isEditor]
        );

        return $response;
    }

    /**
     * @return User returns user if valid, otherwise null
     */
    private function validateLogin() {
        /** @var User $user */
        $user = $this->getUser();
        if (empty($user) || !$user->hasRole('ROLE_USER')) {
            return null;
        }

        return $user;
    }

    private function redirectLogin() {
        return $this->redirect("/login");
    }
}

