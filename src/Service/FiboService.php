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
        if ($term < 1) {
            throw new InvalidParameterException();
        }

        switch ($term) {
            case 1:
            case 2:
                return 1;

            default:
                return $this->fibo($term - 1) + $this->fibo($term - 2);
        }
    }
}
