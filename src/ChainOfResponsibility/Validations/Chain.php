<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Validations;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;

abstract class Chain
{
    private Chain $validations;
    protected bool $brake = false;
    protected static array $messages = [];

    /**
     * @param bool $brake
     */
    public function __construct(bool $brake = false)
    {
        $this->brake = $brake;
    }

    public function set(Chain $validator,): Chain
    {
        $this->validations = $validator;
        return $validator;
    }

    public function check(ContractorInterfaces $contractor): array
    {
        if (!isset($this->validations)) {
            return self::$messages;
        }

        return $this->validations->check($contractor);
    }

}