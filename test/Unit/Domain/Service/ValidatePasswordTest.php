<?php

namespace Test\Unit\Domain\Service;

use Domain\Entity\User;
use Domain\Service\ValidatePassword;
use Infrastructure\Service\ValidatePasswordFactory;

/**
 * Class ValidatePasswordTest
 *
 * @package Test\Unit\Domain\Service
 * @author David Amigo <davamigo@gmail.com>
 */
class ValidatePasswordTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test to validate a valid password of a common user
     */
    public function testValidUserPassword()
    {
        $user = new User(array(
            'pass' => 'T=e-s_t*0$0%1'
        ));

        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
        $this->assertTrue(true);
    }

    /**
     * Test to validate a too short password of a common user
     */
    public function testUserPasswordTooShort()
    {
        $user = new User(array(
            'pass' => 'Tt000'
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a too long password of a common user
     */
    public function testUserPasswordTooLong()
    {
        $user = new User(array(
            'pass' => 'Tt02345678901234567890'
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of a common user without any lower case letter
     */
    public function testUserPasswordWithoutLowerCharacters()
    {
        $user = new User(array(
            'pass' => 'TTT%%%000'
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of a common user without any upper case letter
     */
    public function testUserPasswordWithoutUpperCharacters()
    {
        $user = new User(array(
            'pass' => 'ttt%%%000'
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of a common user without any number
     */
    public function testUserPasswordWithoutNumbers()
    {
        $user = new User(array(
            'pass' => 'ttt%%%TTT'
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of a common user with invalid symbols
     */
    public function testUserPasswordWithInvalidSymbols()
    {
        $user = new User(array(
            'pass' => '/vAlid4t3\\'
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a valid password of an admin user
     */
    public function testValidAdminPassword()
    {
        $user = new User(array(
            'pass' => 'T=e-s_t*0$0%1',
            'admin' => true
        ));

        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
        $this->assertTrue(true);
    }

    /**
     * Test to validate a too short password of an admin user
     */
    public function testAdminPasswordTooShort()
    {
        $user = new User(array(
            'pass' => 'Tt0Xx0Ww0',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a too long password of an admin user
     */
    public function testAdminPasswordTooLong()
    {
        $user = new User(array(
            'pass' => 'Tt02345678901234567890',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of an admin user without any lower case letter
     */
    public function testAdminPasswordWithoutLowerCharacters()
    {
        $user = new User(array(
            'pass' => 'TTTT%%%%0000',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of an admin user without any upper case letter
     */
    public function testAdminPasswordWithoutUpperCharacters()
    {
        $user = new User(array(
            'pass' => 'tttt%%%%0000',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of an admin user without any number
     */
    public function testAdminPasswordWithoutNumbers()
    {
        $user = new User(array(
            'pass' => 'tttt%%%%TTTT',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of an admin user without any symbol
     */
    public function testAdminPasswordWithoutSymbols()
    {
        $user = new User(array(
            'pass' => 'tttt0000TTTT',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of an admin user with invalid symbols
     */
    public function testAdminPasswordWithInvalidSymbols()
    {
        $user = new User(array(
            'pass' => '/vAl!d4t3\\',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Test to validate a password of an admin user with a forbbiden word
     */
    public function testAdminPasswordWithForbbidenWord()
    {
        $user = new User(array(
            'pass' => '_Passw0rd_',
            'admin' => true
        ));

        $this->setExpectedException('Domain\Exception\InvalidPasswordException');
        $validator = $this->getValidatePasswordService();
        $validator->validate($user);
    }

    /**
     * Gets the ValidatePassword service fully configured.
     *
     * @return ValidatePassword
     */
    private function getValidatePasswordService()
    {
        $factory = new ValidatePasswordFactory();
        $validator = new ValidatePassword($factory);
        return $validator;
    }
}
