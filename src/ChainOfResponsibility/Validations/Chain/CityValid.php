<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations\Chain;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

final class CityValid extends Chain
{
    public function check(ContractorInterfaces $contractor): bool
    {
        if (strlen($contractor->getCity()) < 2) {
            self::$messages[] = 'No localities';

            return false;
        }

        return parent::check($contractor);
    }
}