<?php

namespace Infrastructure\Service;

use Domain\Entity\User;
use Domain\Exception\InvalidPasswordException;
use Domain\Service\ValidatePasswordInterface;

/**
 * service to validate the password of an admin user.
 *
 * @package Infrastructure\Service
 * @author David Amigo <davamigo@gmail.com>
 */
class ValidateAdminPassword implements ValidatePasswordInterface
{
    const PASSWORD_MIN_LENGTH = 10;
    const PASSWORD_MAX_LENGTH = 20;
    const PASSWORD_REGEX_TEST = '/((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@CHARS]).{@MIN,@MAX})/';
    const PASSWORD_REGEX_CHARS = '/^[a-zA-Z0-9@CHARS]+$/';
    const PASSWORD_SPECIAL_CHARS = '_-+*=$%#!?';

    protected static $forbbidenWords = array(
        'password',
        'passw0rd',
        'qwerty',
        'dragon',
        'football',
        'baseball',
        'monkey',
        'shadow',
        'superman',
        'welcome',
        'bye',
        'login',
        'fuck',
        'abc',
        '1111',
        '1234',
        '69'
    );

    /**
     * Validates a password for non-admin user
     *
     * @param User $user
     * @return void
     * @throws InvalidPasswordException
     */
    public function validate(User $user)
    {
        $this->validatePasswordLength($user->getPass());
        $this->validateWithRegex($user->getPass());
        $this->validateSpecialChars($user->getPass());
        $this->validateForbbidenWords($user->getPass());
    }

    /**
     * Validates the password length.
     *
     * @param $password
     * @return void
     * @throws InvalidPasswordException
     */
    protected function validatePasswordLength($password)
    {
        if (strlen($password) < static::PASSWORD_MIN_LENGTH) {
            throw new InvalidPasswordException(
                'The password has to have minimum ' . static::PASSWORD_MIN_LENGTH . ' characters.'
            );
        }

        if (strlen($password) > static::PASSWORD_MAX_LENGTH) {
            throw new InvalidPasswordException(
                'The password has to have maximum ' . static::PASSWORD_MAX_LENGTH. ' characters.'
            );
        }
    }

    /**
     * Validates the password with a regular expression.
     *
     * @param $password
     * @return void
     * @throws InvalidPasswordException
     */
    protected function validateWithRegex($password)
    {
        $pattern = static::PASSWORD_REGEX_TEST;
        $pattern = str_replace('@MIN', static::PASSWORD_MIN_LENGTH, $pattern);
        $pattern = str_replace('@MAX', static::PASSWORD_MAX_LENGTH, $pattern);
        $pattern = str_replace('@CHARS', $this->getSpecialChars(), $pattern);

        $result = preg_match($pattern, $password);
        if (!$result) {
            throw new InvalidPasswordException(
                'The password has to have at least an upper case letter, a lower case letter, a number and a symbol.'
            );
        }
    }

    /**
     * Validates the special chars in the password
     *
     * @param $password
     * @return void
     * @throws InvalidPasswordException
     */
    protected function validateSpecialChars($password)
    {
        $pattern = str_replace('@CHARS', $this->getSpecialChars(), static::PASSWORD_REGEX_CHARS);

        $result = preg_match($pattern, $password);
        if (!$result) {
            throw new InvalidPasswordException(
                'The password can only hace lower case letters, upper case letters, numbers and some special chars: ' .
                static::PASSWORD_SPECIAL_CHARS
            );
        }
    }

    /**
     * Validates the forbbiden words not i password
     *
     * @param $password
     * @return void
     * @throws InvalidPasswordException
     */
    protected function validateForbbidenWords($password)
    {
        foreach (static::$forbbidenWords as $word) {
            $pos = stripos($password, $word);
            if ($pos !== false) {
                throw new InvalidPasswordException(
                    'You can not use the word "' . $word . '" inside the password.'
                );
            }
        }
    }

    /**
     * Get special chars string to use in a regex expression
     *
     * @return string
     */
    private function getSpecialChars()
    {
        return '\\' . implode('\\', str_split(static::PASSWORD_SPECIAL_CHARS));
    }
}
