<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations\Chain;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

class CityValid extends Chain
{
    function check(ContractorInterfaces $contractor): array
    {
        if (strlen($contractor->getCity()) < 2) {
            self::$messages[] = 'No localities';

            if ($this->brake) {
                return self::$messages;
            }
        }

        return parent::check($contractor);
    }
}