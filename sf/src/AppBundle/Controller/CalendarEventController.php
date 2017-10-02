<?php
namespace AppBundle\Controller;

use AppBundle\Component\Type\CalendarEventFormType;
use AppBundle\Entity\CalendarEvent;
use AppBundle\Entity\User;
use AppBundle\Util\Constants;
use AppBundle\Util\Dates;
use Doctrine\ORM\EntityRepository;
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
    public function getListAction(Request $request) {
        // setup
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();

        // check login
        $user = $this->validateLogin();
        $isEditor = empty($user) ? false : $user->hasRole('ROLE_EDITOR');

        // read filters
        $dateFilter = $request->query->get('date');
        $dateFilter = empty($dateFilter) ? null : Dates::toDateTime($dateFilter);

        // fetch calendar events
        /** @var EntityRepository $repository */
        $repository = $em->getRepository(CalendarEvent::class);
        if (!empty($dateFilter)) {
            $calendarEvents = $repository->findBy(array('date' => $dateFilter));
        } else {
            $calendarEvents = $repository->findBy(array('calendarUid' => Constants::CLASS_CALENDAR_UID), null, 1000, 0);
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
            $row->dateDisplay = Dates::toString($calendarEvent->getDate(), Dates::FORMAT_DISPLAY);
            $row->dateJs = Dates::toString($calendarEvent->getDate(), Dates::FORMAT_JS);
            $row->htmlLabel = $this->render(
                ':calendarevent:label.html.twig',
                array('title' => $calendarEvent->getTitle())
            )->getContent();
            $row->htmlContent = $this->getContent($calendarEvent)->getContent();

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
     * @Route("/calendar/event", name="create_calendar_event")
     * @Method({"GET","POST"})
     * @param Request $request
     *
     * @return Response
     */
    public function addAction(Request $request) {
        // check login
        if (!($user = $this->validateLogin())) {
//            return $this->redirectLogin();
        }
        $isEditor = $user->hasRole('ROLE_EDITOR');

        // create calendar event
        $calendarEvent = CalendarEvent::build(
            Constants::CLASS_CALENDAR_UID,
            "Title",
            "Description",
            Dates::toDateTime(Dates::now()),
            0,
            null,
            null
        );

        // generate form
        $form = $this->createForm('\AppBundle\Component\Type\CalendarEventFormType', $calendarEvent);

        // handle request content
        $isPost = $request->isMethod('POST');

        if ($isPost) {
            // process request
            $form->handleRequest($request);
//          $form->bind( $request );
        }

        // handle save or render form with errors
        if ($isPost && $form->isSubmitted() && $form->isValid()) {
            // fetch object from form
            $calendarEvent = $form->getData();

            // save calendar event
            $this->save($calendarEvent);

            // generate response
            $response = $this->getContent($calendarEvent, $isEditor);
        } else {
            // render
            $response = $this->render(
                ':calendarevent:form.html.twig',
                array(
                    'form' => $form->createView(),
                )
            );
        }

        return $response;
    }

    /**
     * @param CalendarEvent $calendarEvent
     */
    private function save($calendarEvent) {
        // setup
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getManager();

        // persist
        $em->persist($calendarEvent);
        $em->flush();
    }

    /**
     * @param CalendarEvent $calendarEvent
     * @param bool          $showEditorActions
     *
     * @return Response
     */
    private function getContent(CalendarEvent $calendarEvent, $showEditorActions = false) {
        $content = $this->render(
            ':calendarevent:content.html.twig',
            array(
                'title' => $calendarEvent->getTitle(),
                'description' => $calendarEvent->getDescription(),
                'date' => Dates::toString($calendarEvent->getDate(), Dates::FORMAT_DISPLAY),
                'duration' => $calendarEvent->getDuration(),
                'showEditorActions' => $showEditorActions
            )
        );

        return $content;
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

