<?php declare(strict_types=1);

require '../../vendor/autoload.php';

use DesignPatterns\Composite\Accessories\{
    Accessory,
    Keyboard,
    Module,
    Mouse
};
use DesignPatterns\Composite\Components\{
    Component,
    CPU,
    GPU,
    RAM
};
use DesignPatterns\Composite\Order;

$orderComputer = new Order('Computer Mark I');

$cpu = new CPU('Intel', 100, 0.30);
$gpu = new GPU('GeForce', 100, 1.10);
$ram = new RAM('KingStone', 100, 0.10);
$componentFan = new Component('Led fan', 0.50, 0.20);
$componentLCD = new Component('LCD display', 180, 0.20);

$orderComputer->add($cpu);
$orderComputer->add($gpu);
$orderComputer->add($ram);
$orderComputer->add($ram);
$orderComputer->add($componentFan);
$orderComputer->add($componentLCD);

$orderAccessory = new Order('Accessory');

$keyboard = new Keyboard('Logi', 100, 2.2);
$module = new Module('Wireless', 150, 0.1);
$accessoryPad = new Accessory('Pad', 50, 0.2);

$orderAccessory->add($keyboard);
$orderAccessory->add($module);
$orderAccessory->add($accessoryPad);

$order = new Order('Sumary');

$mouse = new Mouse('Logi Ergo', 110, 0.700);
$order->add($mouse);

$order->add($orderComputer);
$order->add($orderAccessory);
?>
<style>

    table {
        margin-left: auto;
        margin-right: auto;
        width: 45%;
    }

    table tr td {
        text-align: center;
    }

    table tr th {
        text-align: center;
    }

    ul {
        list-style: none;
        padding: 0;
    }
</style>

<h1>Kompozyt (Composite)</h1>
<p></p>
<table>
    <tr>
        <th>Order</th>
        <th>Price</th>
        <th>Weight</th>
        <th>Components</th>
    </tr>
    <tr>
        <td><?= $orderComputer->name() ?></td>
        <td><?= $orderComputer->price() ?></td>
        <td><?= $orderComputer->weight() ?></td>
        <td>
            <ul>
                <?php foreach ($orderComputer->list() as $product): ?>
                    <li><?= $product->name() . ' - ' . $product->price() ?></li>
                <?php endforeach; ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td><?= $orderAccessory->name() ?></td>
        <td><?= $orderAccessory->price() ?></td>
        <td><?= $orderAccessory->weight() ?></td>
        <td>
            <ul>
                <?php foreach ($orderAccessory->list() as $product): ?>
                    <li><?= $product->name() . ' - ' . $product->price() ?></li>
                <?php endforeach; ?>
            </ul>
        </td>
    </tr>
    <tr>
        <td><?= $order->name() ?></td>
        <td><?= $order->price() ?></td>
        <td><?= $order->weight() ?></td>
        <td>
            <ul>
                <?php foreach ($order->list() as $product): ?>
                    <li><?= $product->name() . ' - ' . $product->price() ?></li>
                <?php endforeach; ?>
            </ul>
        </td>
    </tr>
</table>

