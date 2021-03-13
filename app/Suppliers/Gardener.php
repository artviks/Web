<?php

namespace App\Suppliers;

use App\Flower;
use App\FlowerCollection;


class Gardener implements Supplier
{
    private FlowerCollection $flowers;

    public function __construct()
    {
        $this->flowers = new FlowerCollection();
    }

    public function grow(array $flowers): void
    {
        $this->flowers->add($flowers);
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

    public function deliverFlower(Flower $flower): Flower
    {
        $this->flowers->removeOne($flower);
        return $flower;
    }
}