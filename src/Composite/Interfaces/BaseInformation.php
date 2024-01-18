<?php

declare(strict_types=1);

namespace DesignPatterns\Composite\Interfaces;

interface BaseInformation
{
    public function name(): string;

    public function price(): float;

    public function weight(): float;
}