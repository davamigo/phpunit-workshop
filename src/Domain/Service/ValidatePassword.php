<?php

namespace Domain\Service;

use Domain\Entity\User;
use Domain\Exception\InvalidPasswordException;

/**
 * Service to validate the password of an user.
 *
 * @package Infrastructure\Service
 * @author David Amigo <davamigo@gmail.com>
 */
class ValidatePassword implements ValidatePasswordInterface
{
    /** @var AbstractValidatePasswordFactory */
    protected $factory;

    /**
     * ValidatePassword constructor.
     *
     * @param AbstractValidatePasswordFactory $factory
     */
    public function __construct(AbstractValidatePasswordFactory $factory)
    {
        $this->factory = $factory;
    }

    /**
     * Validates the password of an user
     *
     * @param User $user
     * @return void
     * @throws InvalidPasswordException
     */
    public function validate(User $user)
    {
        $validator = $this->factory->getValidator($user);
        $validator->validate($user);
    }
}
