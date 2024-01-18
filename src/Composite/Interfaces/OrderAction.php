<?php

declare(strict_types=1);

namespace DesignPatterns\Composite\Interfaces;

interface OrderAction extends BaseInformation
{
    public function add(BaseInformation $product): void;

    public function list(): string;
}