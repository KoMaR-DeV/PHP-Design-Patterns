<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;

abstract class Chain
{
    private Chain $validations;
    protected static array $messages = [];
    
    public function __construct() {}

    public function set(Chain $validator,): Chain
    {
        $this->validations = $validator;
        return $validator;
    }

    public function check(ContractorInterfaces $contractor): bool
    {
        if (!isset($this->validations)) {
            return true;
        }

        return $this->validations->check($contractor);
    }

    public function message(): array
    {
        return self::$messages;
    }
}