<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 15.11.13
 * Time: 10:55
 * @TODO - Add comments to methods.
 */

namespace User\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Implements private master entity.
 *
 * @ORM\Entity
 * @ORM\Table(name="masters")
 *
 * @author Fail Mukhametdinov <mufanu@gmail.com>
 */
class Master
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $uid;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $surname;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $name;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $patronymic;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $birthday;

    /**
     * @var string
     * @ORM\Column(type="string", length=255)
     */
    protected $experience;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getUid()
    {
        return $this->uid;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;
    }

    public function getSurname()
    {
        return $this->surname;
    }

    public function setSurname($surname)
    {
        $this->surname = $surname;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getPatronymic()
    {
        return $this->patronymic;
    }

    public function setPatronymic($patronymic)
    {
        $this->patronymic = $patronymic;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }

    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    public function getExperience()
    {
        return $this->experience;
    }

    public function setExperience($experience)
    {
        $this->experience = $experience;
    }
}