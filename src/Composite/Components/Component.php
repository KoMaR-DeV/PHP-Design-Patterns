<?php

declare(strict_types=1);

namespace DesignPatterns\Composite\Components;

use DesignPatterns\Composite\Interfaces\BaseInformation;
use DesignPatterns\Composite\Product;

final class Component extends Product implements BaseInformation
{
    public function __construct(string $name, float $price, float $weight)
    {
        $this->name = $name;
        $this->price = $price;
        $this->weight = $weight;
    }
}
