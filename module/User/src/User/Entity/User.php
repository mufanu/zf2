<?php
/**
 * BjyAuthorize Module (https://github.com/bjyoungblood/BjyAuthorize)
 *
 * @link https://github.com/bjyoungblood/BjyAuthorize for the canonical source repository
 * @license http://framework.zend.com/license/new-bsd New BSD License
 */
 
namespace User\Entity;

use Doctrine\ORM\Mapping as ORM;
use ZfcUser\Entity\UserInterface;

/**
 * An example of how to implement a role aware user entity.
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 *
 * @author Fail Mukhametdinov <mufanu@gmail.com>
 */
class User implements UserInterface
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     */
    protected $username;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true,  length=255)
     */
    protected $email;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $displayName;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $telephone;

    /**
     * @var string
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    protected $site;

    /**
     * @var string
     * @ORM\Column(type="string", length=128)
     */
    protected $password;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $state;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $created;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $access;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $master;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $company;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     *
     * @return void
     */
    public function setId($id)
    {
        $this->id = (int) $id;
    }

    /**
     * Get username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set username.
     *
     * @param string $username
     *
     * @return void
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get email.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set email.
     *
     * @param string $email
     *
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get displayName.
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set displayName.
     *
     * @param string $displayName
     *
     * @return void
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * Get telephone.
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set telephone.
     *
     * @param string $telephone
     *
     * @return void
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * Get site.
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set site.
     *
     * @param string $site
     *
     * @return void
     */
    public function setSite($site)
    {
        $this->site = $site;
    }

    /**
     * Get password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set password.
     *
     * @param string $password
     *
     * @return void
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get state.
     *
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set state.
     *
     * @param int $state
     *
     * @return void
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Set created
     *
     * @param int $created
     *
     * @return void
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Set access
     *
     * @param int $access
     *
     * @return void
     */
    public function setAccess($access)
    {
        $this->access = $access;
    }

    /**
     * @TODO - Реализовать создание профиля.
     * @return int
     */
    public function createMaster()
    {
        return rand(1,100);
    }

    /**
     * @TODO - Add comments.
     * @return int
     */
    public function getMaster()
    {
        return $this->master;
    }

    public function setMaster($profile)
    {
        $this->master = $profile;
    }

    public function createCompany()
    {
        return rand(1,100);
    }

    public function getCompany()
    {
        return $this->company;
    }

    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * Helper function.
     */
    public function exchangeArray($data)
    {
        foreach ($data as $key => $val) {
            if (property_exists($this, $key)) {
                if ($val !== null) {
                    $this->$key = $val;
                }
            }
        }
    }

    /**
     * Get user directory, where stored avatars, img and etc.
     */
    public function getUserdir() {
        $userdir = 'public/users/' . $this->getId();

        if (!file_exists($userdir)) {
            mkdir($userdir);
        }

        return $userdir;
    }
}
