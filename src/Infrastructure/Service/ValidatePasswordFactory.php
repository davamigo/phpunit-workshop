<?php

namespace Infrastructure\Service;

use Domain\Entity\User;
use Domain\Service\AbstractValidatePasswordFactory;
use Domain\Service\ValidatePasswordInterface;

/**
 * Factory class to select the right service for the password validation of an user.
 *
 * @package Infrastructure\Service
 * @author David Amigo <davamigo@gmail.com>
 */
class ValidatePasswordFactory extends AbstractValidatePasswordFactory
{
    /** Constants: Validator keys */
    const VALIDATOR_ADMIN = 'admin';
    const VALIDATOR_USER  = 'user';

    /**
     * ValidatePasswordFactory constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->addValidator(static::VALIDATOR_ADMIN, new ValidateAdminPassword());
        $this->addValidator(static::VALIDATOR_USER, new ValidateCommonPassword());
    }

    /**
     * Gets the right password validator for a user
     *
     * @param User $user
     * @return ValidatePasswordInterface
     */
    public function getValidator(User $user)
    {
        if ($user->isAdmin()) {
            return $this->validators[static::VALIDATOR_ADMIN];
        } else {
            return $this->validators[static::VALIDATOR_USER];
        }
    }
}
