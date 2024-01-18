<?php

declare(strict_types=1);

namespace DesignPatterns\Composite;

use DesignPatterns\Composite\Interfaces\{OrderAction, BaseInformation};

final class Order extends Product implements OrderAction
{
    private array $products = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function price(): float
    {
        $price = 0;

        foreach ($this->products as $product) {
            $price += $product->price();
        }

        return $price;
    }

    public function weight(): float
    {
        $weight = 0;
        foreach ($this->products as $product) {
            $weight += $product->weight();
        }

        return $weight;
    }

    public function add(BaseInformation $product): void
    {
        $this->products[] = $product;
    }

    public function list(): string
    {
        $list = '<ul>';

        foreach ($this->products as $product) {
            $list .= '<li>' . $product->name() . ' - ' . $product->price() . '</li>';
        }

        return $list . '</ul>';
    }
}