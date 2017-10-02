<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 10:22 AM
 */

namespace AppBundle\Entity;

use AppBundle\Util\Dates;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="calendar_events")
 */
class CalendarEvent {
    /**
     * @var string
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $uid;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="guid")
     */
    private $calendarUid;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=100)
     */
    private $title;

    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @var int
     * @Assert\NotBlank()
     * @ORM\Column(type="integer")
     */
    private $duration;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @var \DateTime
     * @ORM\Column(type="date")
     */
    private $updated;

    /**
     * @param string    $calendarUid
     * @param string    $title
     * @param string    $description
     * @param \DateTime $date
     * @param int       $duration
     * @param \DateTime $created
     * @param \DateTime $updated
     *
     * @return CalendarEvent
     */
    public static function build($calendarUid, $title, $description,
                                 $date, $duration, $created, $updated) {
        // generate instance
        $entity = new CalendarEvent();

        // populate
        $entity->calendarUid = $calendarUid;
        $entity->title = $title;
        $entity->description = $description;
        $entity->date = $date;
        $entity->duration = $duration;
        $entity->created = empty($created) ? Dates::toDateTime(Dates::now()) : $created;
        $entity->updated = empty($updated) ? Dates::toDateTime(Dates::now()) : $updated;

        return $entity;
    }

    /**
     * @return string
     */
    public function getUid() {
        return $this->uid;
    }

    /**
     * @return string
     */
    public function getCalendarUid() {
        return $this->calendarUid;
    }

    /**
     * @param string $calendarUid
     */
    public function setCalendarUid($calendarUid) {
        $this->calendarUid = $calendarUid;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description) {
        $this->description = $description;
    }

    /**
     * @return \DateTime
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * Duration of calendar event in minutes
     * @return int
     */
    public function getDuration() {
        return $this->duration;
    }

    /**
     * @param int $duration
     */
    public function setDuration($duration) {
        $this->duration = $duration;
    }

    /**
     * @return \DateTime
     */
    public function getCreated() {
        return $this->created;
    }

    /**
     * @return \DateTime
     */
    public function getUpdated() {
        return $this->updated;
    }
}
