<?php

namespace Domain\Service;

use Domain\Entity\User;
use Domain\Exception\InvalidPasswordException;

/**
 * Interface to a service to validate a password for an user.
 *
 * @package Domain\Service
 * @author David Amigo <davamigo@gmail.com>
 */
interface ValidatePasswordInterface
{
    /**
     * Validates the password of an user
     *
     * @param User $user
     * @return void
     * @throws InvalidPasswordException
     */
    public function validate(User $user);
}
