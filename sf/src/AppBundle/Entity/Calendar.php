<?php
/**
 * User: rmurray
 * Date: 9/26/2017
 * Time: 10:22 AM
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Util\Dates;

/**
 * @ORM\Entity
 * @ORM\Table(name="calendars")
 */
class Calendar {
    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $uid;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=500)
     */
    private $description;

    /**
     * @ORM\Column(type="date")
     */
    private $created;

    /**
     * @ORM\Column(type="date")
     */
    private $updated;

    public static function build($uid, $name, $description, $created, $updated) {
        // generate instance
        $entity = new Calendar();

        // populate
        $entity->uid = $uid;
        $entity->name = $name;
        $entity->description = $description;
        $entity->created = empty($created) ? Dates::toDateTime(Dates::now()) : $created;
        $entity->updated = empty($updated) ? Dates::toDateTime(Dates::now()) : $updated;
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
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription() {
        return $this->description;
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
