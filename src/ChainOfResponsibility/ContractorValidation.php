<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;
use DesignPatterns\ChainOfResponsibility\Validations\Chain;

class ContractorValidation
{
    private Chain $validators;
    private ContractorInterfaces $contractor;

    /**
     * @param ContractorInterfaces $contractor
     */
    public function __construct(ContractorInterfaces $contractor)
    {
        $this->contractor = $contractor;
    }

    public function set(Chain $validators): void
    {
        $this->validators = $validators;
    }

    public function check(): array
    {
        return $this->validators->check($this->contractor);
    }
}