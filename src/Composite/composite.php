<?php declare(strict_types=1);

require '../../vendor/autoload.php';

use DesignPatterns\Composite\Accessories\{Keyboard, Module, Mouse};
use DesignPatterns\Composite\Components\{CPU, GPU, RAM};
use DesignPatterns\Composite\Order;

$orderComputer = new Order('Computer Mark I');

$cpu = new CPU('Intel', 100, 0.30);
$gpu = new GPU('GeForce', 100, 1.10);
$ram = new RAM('KingStone', 100, 0.10);

$orderComputer->add($cpu);
$orderComputer->add($gpu);
$orderComputer->add($ram);
$orderComputer->add($ram);

$orderAccessory = new Order('Accessory');

$keyboard = new Keyboard('Logi', 100, 2.2);
$module = new Module('Wireless', 150, 0.1);

$orderAccessory->add($keyboard);
$orderAccessory->add($module);

$order = new Order('Sumary');

$mouse = new Mouse('Logi Ergo', 110, 0.700);
$order->add($mouse);

$order->add($orderComputer);
$order->add($orderAccessory);
?>

<h1>Kompozyt (Composite)</h1>
<p></p>
<table>
    <tr>
        <td>Order</td>
        <td>Price</td>
        <td>Weight</td>
        <td>Components</td>
    </tr>
    <tr>
        <td><?= $orderComputer->name() ?></td>
        <td><?= $orderComputer->price() ?></td>
        <td><?= $orderComputer->weight() ?></td>
        <td><?= $orderComputer->list() ?></td>
    </tr>
    <tr>
        <td><?= $orderAccessory->name() ?></td>
        <td><?= $orderAccessory->price() ?></td>
        <td><?= $orderAccessory->weight() ?></td>
        <td><?= $orderAccessory->list() ?></td>
    </tr>
    <tr>
        <td><?= $order->name() ?></td>
        <td><?= $order->price() ?></td>
        <td><?= $order->weight() ?></td>
        <td><?= $order->list() ?></td>
    </tr>
</table>

