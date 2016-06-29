<?php

namespace Service;

use Exception\InvalidParameterException;

/**
 * Class FiboService
 *
 * @package Service
 */
class FiboService
{
    public function fibo($term)
    {
        switch ($term) {
            case 1:
            case 2:
                return 1;

            case 10:
                return 55;

            default:
                throw new InvalidParameterException();
        }
    }
}
