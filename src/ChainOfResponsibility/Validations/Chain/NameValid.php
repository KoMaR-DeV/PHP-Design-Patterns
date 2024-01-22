<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations\Chain;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

final class NameValid extends Chain
{
    function check(ContractorInterfaces $contractor): array
    {
        if (strlen($contractor->getName()) < 2) {
            self::$messages[] = 'The name must min length two char.';

            if ($this->brake) {
                return self::$messages;
            }
        }

        return parent::check($contractor);
    }
}