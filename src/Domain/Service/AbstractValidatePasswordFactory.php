<?php

namespace Domain\Service;

use Domain\Entity\User;

/**
 * Abstract factory class to select the right service for the password validation of an user.
 *
 * @package Domain\Service
 * @author David Amigo <davamigo@gmail.com>
 */
abstract class AbstractValidatePasswordFactory
{
    /** @var ValidatePasswordInterface[] */
    protected $validators;

    /**
     * Gets the right password validator for a user
     *
     * @param User $user
     * @return ValidatePasswordInterface
     */
    public abstract function getValidator(User $user);

    /**
     * AbstractValidatePasswordFactory constructor.
     */
    public function __construct()
    {
        $this->validators = array();
    }

    /**
     * Adds a validator to the factory
     *
     * @param string                    $key
     * @param ValidatePasswordInterface $validator
     * @return $this
     */
    public function addValidator($key, ValidatePasswordInterface $validator)
    {
        $this->validators[$key] = $validator;
        return $this;
    }
}
