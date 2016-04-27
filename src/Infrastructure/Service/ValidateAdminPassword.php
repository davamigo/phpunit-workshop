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
    /**
     * Validates a password for admin user
     *
     * @param User $user
     * @return void
     * @throws InvalidPasswordException
     */
    public function validate(User $user)
    {
        // TODO: Implement validate() method.
    }
}
