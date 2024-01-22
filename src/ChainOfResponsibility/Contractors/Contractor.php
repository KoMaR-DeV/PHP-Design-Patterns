<?php

declare(strict_types=1);

namespace DesignPatterns\ChainOfResponsibility\Contractors;

use DesignPatterns\ChainOfResponsibility\Interfaces\ContractorInterfaces;

final readonly class Contractor implements ContractorInterfaces
{
    private string $name;
    private string $city;
    private int $id;
    private string $bankAccountNumber;
    private string $bankAccountName;

    /**
     * @param string $name
     * @param string $city
     * @param int $id
     * @param string $bankAccountNumber
     * @param string $bankAccountName
     */
    public function __construct(string $name, string $city, int $id, string $bankAccountNumber, string $bankAccountName)
    {
        $this->name = $name;
        $this->city = $city;
        $this->id = $id;
        $this->bankAccountNumber = $bankAccountNumber;
        $this->bankAccountName = $bankAccountName;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBankAccountNumber(): string
    {
        return $this->bankAccountNumber;
    }

    public function getBankAccountName(): string
    {
        return $this->bankAccountName;
    }

}