<?php
require_once 'vendor/autoload.php';

use App\Flower;
use App\FlowerShop;
use App\Suppliers\Gardener;
use App\Suppliers\LocalWarehouse;

$csv = array();
$lines = file('storage/Gardener.csv', FILE_IGNORE_NEW_LINES);

foreach ($lines as $value) {
    $flower = explode(', ', $value);
    $csv[] = new Flower($flower[0], (int)$flower[1], (int)$flower[2]);
}

$gardener = new Gardener();
$gardener->grow($csv);

$file = file_get_contents('storage/local.json');
$json = json_decode($file, true);

$local = new LocalWarehouse();
$local->buyFlower(new Flower($json["name"], $json["amount"], $json["price"]));


$shop = new FlowerShop([$local, $gardener]);

?>

<html>
<body>

<h2>Flower Shop</h2>

<table style="width:250px">
    <tr>
        <th>Flower</th>
        <th>Amount</th>
        <th>Price</th>
    </tr>
    <?php foreach ($shop->getFlowers()->flowers() as $flower) : ?>
        <tr>
            <td><?= $flower->name() ?></td>
            <td><?= $flower->amount() ?></td>
            <td><?= $flower->price() ?></td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>

