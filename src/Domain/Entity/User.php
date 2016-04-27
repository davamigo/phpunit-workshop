<?php

namespace Domain\Entity;

/**
 * User entity.
 *
 * @package Domain\Entity
 * @author David Amigo <davamigo@gmail.com>
 */
class User
{
    /** @var string */
    private $user;

    /** @var string */
    private  $pass;

    /** @var string */
    private  $name;

    /** @var bool */
    private  $admin;

    /**
     * User constructor.
     *
     * @param array $properties
     */
    public function __construct(array $properties = array())
    {
        $empty = array(
            'user' => null,
            'pass' => null,
            'name' => null,
            'admin' => false
        );

        $properties = array_merge($empty, $properties);

        $this->user = $properties['user'];
        $this->pass = $properties['pass'];
        $this->name = $properties['name'];
        $this->admin = $properties['admin'];
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     * @return $this
     */
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param string $pass
     * @return $this
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->admin;
    }

    /**
     * @param boolean $admin
     * @return $this
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
        return $this;
    }
}
