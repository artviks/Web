<?php

class FlowerCollection
{
    private array $flowers = [];

    public function flowers(): array
    {
        return $this->flowers;
    }

    public function add(array $flowers): void
    {
        foreach ($flowers as $flower) {
            $this->addOne($flower);
        }
    }

    public function addOne(Flower $flower): void
    {
        if ($this->findIndexByName($flower->name()) === null) {
            $this->flowers[] = $flower;
        } else {
            $this->flowers()[$this->findIndexByName($flower->name())]->add($flower->amount());
        }
    }

    public function removeOne(Flower $removedFlower): void
    {
        foreach ($this->flowers() as $flower) {
            if ($flower->name() === $removedFlower->name()) {
                $flower->pick($removedFlower->amount());
            }
        }
    }

    public function findIndexByName(string $name): ?int
    {
        foreach ($this->flowers as $i => $flower) {
            if ($flower->name() === $name) {
                return $i;
            }
        }
        return null;
    }
}