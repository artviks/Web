<?php

interface Supplier
{
    public function showStock(): FlowerCollection;

    public function remove(Flower $flower): void;

    public function findIndexByName(string $name): ?int;
}