<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations\Chain;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

final class NameValid extends Chain
{
    public function check(ContractorInterfaces $contractor): bool
    {
        if (strlen($contractor->getName()) < 2) {
            self::$messages[] = 'The name must min length two char.';

            return false;
        }

        return parent::check($contractor);
    }
}