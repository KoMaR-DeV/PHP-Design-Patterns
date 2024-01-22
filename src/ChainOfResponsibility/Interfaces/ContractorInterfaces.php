<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Interfaces;

interface ContractorInterfaces
{
    public function getName(): string;
    
    public function getCity(): string;

    public function getId(): int;

    public function getBankAccountNumber(): string;

    public function getBankAccountName(): string;
}