<?php

namespace Test\Unit\Domain\Entity;

use Domain\Entity\User;

/**
 * Unit test of the User entity.
 *
 * @package Test\Unit\Domain\Entity
 * @author David Amigo <davamigo@gmail.com>
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Method: User::__construct()
     */
    public function testConstructor()
    {
        $testData = $this->getTestData();
        $user = new User($testData);

        $this->assertEquals($testData['user'], $user->getUser());
        $this->assertEquals($testData['pass'], $user->getPass());
        $this->assertEquals($testData['name'], $user->getName());
        $this->assertEquals($testData['admin'], $user->isAdmin());
    }

    /**
     * Method: User::setUser()
     * Method: User::setPass()
     * Method: User::setName()
     * Method: User::setAdmin()
     * Method: User::getUser()
     * Method: User::getPass()
     * Method: User::getName()
     * Method: User::getAdmin()
     */
    public function testGettersAndSetters()
    {
        $testData = $this->getTestData();
        $user = new User();

        $user->setUser($testData['user']);
        $user->setPass($testData['pass']);
        $user->setName($testData['name']);
        $user->setAdmin($testData['admin']);

        $this->assertEquals($testData['user'], $user->getUser());
        $this->assertEquals($testData['pass'], $user->getPass());
        $this->assertEquals($testData['name'], $user->getName());
        $this->assertEquals($testData['admin'], $user->isAdmin());
    }

    /**
     * Get an array with the test data
     *
     * @return array
     */
    private function getTestData()
    {
        $testData = array(
            'user' => 'u' . strval(rand(101, 999)),
            'pass' => 'p' . strval(rand(101, 999)),
            'name' => 'n' . strval(rand(101, 999)),
            'admin' => rand(0, 1) ? false : true
        );

        return $testData;
    }
}
