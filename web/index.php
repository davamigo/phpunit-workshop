<?php

require_once __DIR__ . '/../vendor/autoload.php';


use Domain\Entity\User;
use Domain\Service\ValidatePassword;
use Domain\Exception\InvalidPasswordException;
use Infrastructure\Service\ValidatePasswordFactory;

/** @var User[] $testUsers */
$testUsers = [
    new User(array(
        'user' => 'leo',
        'pass' => '123',
        'name' => 'Leo',
        'admin' => false
    )),
    new User(array(
        'user' => 'steve',
        'pass' => 'abcdefghijklmnopqrstuvwxyz',
        'name' => 'Steve',
        'admin' => false
    )),
    new User(array(
        'user' => 'bill',
        'pass' => '123456',
        'name' => 'Bill',
        'admin' => false
    )),
    new User(array(
        'user' => 'mick',
        'pass' => 'abcdef',
        'name' => 'Mick',
        'admin' => false
    )),
    new User(array(
        'user' => 'alice',
        'pass' => 'ABCDEF',
        'name' => 'Alice',
        'admin' => false
    )),
    new User(array(
        'user' => 'sarah',
        'pass' => '1Aa2Bbª#q',
        'name' => 'Sarah',
        'admin' => false
    )),
    new User(array(
        'user' => 'john',
        'pass' => 'Prueba1',
        'name' => 'John',
        'admin' => false
    )),
    new User(array(
        'user' => 'peter',
        'pass' => '1PRUEBa',
        'name' => 'Peter',
        'admin' => false
    )),
    new User(array(
        'user' => 'daniel',
        'pass' => 'pA5w0Rd',
        'name' => 'Daniel',
        'admin' => false
    )),
    new User(array(
        'user' => 'andrea',
        'pass' => 'p4$w0*D',
        'name' => 'Andrea',
        'admin' => false
    )),
    new User(array(
        'user' => 'martha',
        'pass' => 'Prueba1',
        'name' => 'Martha',
        'admin' => true
    )),
    new User(array(
        'user' => 'admin',
        'pass' => 'MyPassword9',
        'name' => 'Admin',
        'admin' => true
    )),
    new User(array(
        'user' => 'alex',
        'pass' => 'MyPassword#9',
        'name' => 'Alex',
        'admin' => true
    )),
    new User(array(
        'user' => 'thomas',
        'pass' => 'baSEBALL#123',
        'name' => 'Thomas',
        'admin' => true
    )),
    new User(array(
        'user' => 'admin',
        'pass' => 'MyPassword9',
        'name' => 'Admin',
        'admin' => true
    ))
];

$factory = new ValidatePasswordFactory();
$validator = new ValidatePassword($factory);

foreach ($testUsers as $user) {
    try {
        echo '<br>';
        echo 'Validating ' . $user->getName() . ': ';
        $validator->validate($user);
        echo 'The password is valid.';
    } catch (InvalidPasswordException $exc) {
        echo 'The password is not valid. ';
        echo $exc->getMessage();
    }
}
