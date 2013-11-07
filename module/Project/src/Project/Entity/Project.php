<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.11.13
 * Time: 15:31
 */

namespace Project\Entity;

//use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Implements Project Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="projects")
 *
 * @author Fail Mukhametdinov <mufanu@gmail.com>
 */

class Project
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
     * @ORM\Column(type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var text
     * @ORM\Column(type="text")
     */
    protected $body;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $userId;

    /**
     * @var int
     * @ORM\Column(type="integer")
     */
    protected $created;


    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $state;

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set body.
     *
     * @param string $body
     *
     * @return void
     */
    public function setText($body)
    {
        $this->text = $body;
    }

    /**
     * Get userId.
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set userId.
     *
     * @param int $userId
     *
     * @return void
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get created.
     *
     * @return int
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set created.
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
}