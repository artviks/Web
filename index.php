<?php

require_once 'vendor/autoload.php';

$gardener = new Gardener();
$gardener->grow([
    new Flower('YellowTulip', 10, 100),
    new Flower('RedTulip', 10, 110),
    new Flower('BlueTulip', 10, 120),
    new Flower('WhiteRose', 10, 200),
    new Flower('PinkRose', 10, 210),
    new Flower('RedRose', 10, 220),
]);

$local = new LocalWarehouse();
$local->buyFlower($gardener->deliverFlower(new Flower('RedTulip', 4, 110)));

$other = new OtherWarehouse();
$other->buyFlower($gardener->deliverFlower(new Flower('RedTulip', 2, 110)));


$shop = new FlowerShop([$local, $gardener, $other]);

foreach ($shop->getFlowers()->flowers() as $flower) {
    echo $flower->name() . ', ' . $flower->amount() . ' pcs, price ' . $flower->price() . PHP_EOL;
}


$input = 'RedTulip 4';
$data = explode(' ', $input);
$order = new Flower($data[0], (int)$data[1]);
$shop->order($order);

$gender = 'f';
$shop->gender($gender);

echo 'Total price: ' . $shop->totalPrice();

$shop->remove();