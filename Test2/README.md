```
<?php

$item1 = new Item("Item 1", 5, 2);

$order1 = new Order();
$order1->addItem($item1);

$basket = new Basket();
$basket->addOrder($order1);

echo $basket->calculateTotalSum();

echo $basket->getItemsCount();

$basket->save();

$basket->load();

$basket->delete();

```