<?php

namespace App;

class Flower
{
    private string $name;
    private int $amount;
    private ?int $price;

    public function __construct(string $name, int $amount, int $price = null)
     {
         $this->name = $name;
         $this->amount = $amount;
         $this->price = $price;
     }

    public function name(): string
    {
        return $this->name;
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function pick(int $amount): void
    {
        $this->amount -= $amount;
    }

    public function add(int $amount): void
    {
        $this->amount += $amount;
    }

    public function price(): ?int
    {
        return $this->price;
    }

    public function setPrice(int $price): void
    {
        $this->price = $price;
    }
}