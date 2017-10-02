<?php
namespace AppBundle\Controller;

use AppBundle\Entity\CalendarEvent;
use AppBundle\Entity\User;
use AppBundle\Util\Constants;
use AppBundle\Util\Dates;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class CalendarEventController extends Controller {
    /**
     * @Route("/calendar/events")
     * @Method("GET")
     * @param Request $request
     *
     * @return Response
     */
    public function getAction(Request $request) {
        // setup
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();

        // check login
        //if (!($user = $this->validateLogin())) {
        //    return $this->redirectLogin();
        //}

        // read filters
        $dateFilter = $request->query->get('date');
        $dateFilter = empty($dateFilter) ? null : Dates::toDateTime($dateFilter);

        // fetch calendar events
        $repository = $em->getRepository(CalendarEvent::class);
        if (!empty($dateFilter)) {
            $calendarEvents = $repository->findBy(array('date' => $dateFilter));
        } else {
            $calendarEvents = $repository->findBy(array('calendarUid' => Constants::CLASS_CALENDAR_UID));
        }

        // populate results for response content
        $results = array();
        foreach ($calendarEvents as $calendarEvent) {
            $row = new \stdClass();
            foreach ((array) $calendarEvent as $k => $v) {
                $tmp = explode("\0", $k);
                $k = $tmp[count($tmp) - 1];
                $row->$k = $v;
            }
            $row->dateDisplay = Dates::toString($row->date, Dates::FORMAT_DISPLAY);
            $row->dateJs = Dates::toString($row->date, Dates::FORMAT_JS);
            $row->htmlLabel = str_replace("\n", "", $this->render(
                ':calendarevent:label.html.twig', array('title' => $row->title)
            )->getContent());
            $row->htmlContent = str_replace("\n", "", $this->render(
                ':calendarevent:content.html.twig',
                array(
                    'title'       => $row->title,
                    'description' => $row->description,
                    'date'        => Dates::toString($row->date, Dates::FORMAT_DISPLAY),
                    'duration'    => $row->duration,
                )
            )->getContent());

            $results[] = (array) $row;
        }

        // generate response
        $serializer = $this->container->get('jms_serializer');
        $content = $serializer->serialize($results, 'json');
        $response = new Response($content);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/calendar/event")
     * @Method("POST")
     * @ParamConverter("postBody", class="array", converter="fos_rest.request_body")
     *
     * @return Response
     */
    public function addAction($postBody) {
        // setup
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();

        // check login
        if (!($user = $this->validateLogin())) {
//            return $this->redirectLogin();
        }

        // generate calendar event
        $calendarEvent = CalendarEvent::build(
            Constants::CLASS_CALENDAR_UID,
            $postBody['title'],
            $postBody['description'],
            Dates::toDateTime($postBody['date']),
            $postBody['duration'],
            null,
            null
        );

        // persist
        $em->persist($calendarEvent);
        $em->flush();

        // generate response
        $serializer = $this->container->get('jms_serializer');
        $content = $serializer->serialize($calendarEvent, 'json');
        $response = new Response($content);
        $response->headers->set('Content-Type', 'application/json');

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

