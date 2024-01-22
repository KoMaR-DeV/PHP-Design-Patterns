<?php

declare(strict_types=1);

namespace DesignPatterns\Composite;

use DesignPatterns\Composite\Interfaces\BaseInformation;

abstract class Product implements BaseInformation
{
    protected string $name = '';
    protected float $price = 0;
    protected float $weight = 0;

    public function name(): string
    {
        return $this->name;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function weight(): float
    {
        return $this->weight;
    }
}