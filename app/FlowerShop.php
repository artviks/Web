<?php

class FlowerShop
{
    private const DISCOUNT = 20;
    public Flower $order;
    private string $gender = '';
    private array $suppliers;
    private FlowerCollection $flowers;

    public function __construct(array $suppliers)
    {
        $this->flowers = new FlowerCollection();
        $this->addSuppliers($suppliers);

    }

    public function totalPrice(): int
    {
        if ($this->gender === 'f') {
            return $this->order->price() * $this->order->amount() * (1 - self::DISCOUNT / 100);
        }
        return $this->order->price() * $this->order->amount();
    }

    public function gender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function order(Flower $order): void
    {
        $index = $this->flowers->findIndexByName($order->name());
        $order->setPrice($this->flowers->flowers()[$index]->price());
        $this->order = $order;
    }

    public function addSupplier(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
        $this->flowers->add($supplier->showStock()->flowers());
    }

    public function addSuppliers(array $suppliers): void
    {
        foreach ($suppliers as $supplier) {
            $this->addSupplier($supplier);
        }
    }

    public function getFlowers(): FlowerCollection
    {
        return $this->flowers;
    }

    public function remove(): void
    {
        $this->flowers->removeOne($this->order);
    }
}
