<?php
/**
 * Created by JetBrains PhpStorm.
 * User: artsem
 * Date: 8/20/13
 * Time: 10:35 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Model\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 *
 * @ORM\Table(name="Address")
 **/

class Address {
    /**
     *
     * @var integer $id
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
