<?php

namespace App\Suppliers;

use App\Flower;
use App\FlowerCollection;

class LocalWarehouse implements Supplier
{
    private FlowerCollection $flowers;

    public function __construct()
    {
        $this->flowers = new FlowerCollection();
    }

    public function buyFlower(Flower $flower): void
    {
        $this->flowers->addOne($flower);
    }

    public function showStock(): FlowerCollection
    {
        return $this->flowers;
    }

    public function remove(Flower $flower): void
    {
        $this->flowers->removeOne($flower);
    }

    public function findIndexByName(string $name): ?int
    {
        return $this->flowers->findIndexByName($name);
    }
}