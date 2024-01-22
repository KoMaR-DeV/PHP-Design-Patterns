<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations\Chain;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

class TaxIDValid extends Chain
{
    function check(ContractorInterfaces $contractor): array
    {
        if (!$this->validateNip($contractor->getId())) {
            self::$messages[] = 'Tax ID number errors.';

            if ($this->brake) {
                return self::$messages;
            }
        }

        return parent::check($contractor);
    }

    private function validateNip(int $nip): bool
    {
        $nip = (string)$nip;
        $nipWithoutDashes = preg_replace("/-/", "", $nip);
        $reg = '/^[0-9]{10}$/';
        if (!preg_match($reg, $nip))
            return false;
        else {
            $digits = str_split($nipWithoutDashes);
            $checksum = (6 * intval($digits[0]) + 5 * intval($digits[1]) + 7 * intval($digits[2]) + 2 * intval($digits[3]) + 3 * intval($digits[4]) + 4 * intval($digits[5]) + 5 * intval($digits[6]) + 6 * intval($digits[7]) + 7 * intval($digits[8])) % 11;

            return (intval($digits[9]) == $checksum);
        }
    }
}