<?php

class Order
{
    /**
     * @var Item[]
     */
    private array $items = [];

    public function addItem(Item $item): void
    {
        foreach ($this->items as $existingItem) {
            if ($existingItem->getName() == $item->getName()) {
                $existingItem->setQuantity($existingItem->getQuantity() + 1);
                return;
            }
        }
        $this->items[] = $item;
    }

    public function deleteItem(Item $item): void
    {
        foreach ($this->items as $key => $existingItem) {
            if ($existingItem->getName() == $item->getName()) {
                unset($this->items[$key]);
                $this->items = array_values($this->items);
                return;
            }
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getItemsCount(): int
    {
        return count($this->items);
    }

    public function calculateTotalSum(): float
    {
        $total = 0.0;
        foreach ($this->items as $item) {
            $total += $item->getPrice() * $item->getQuantity();
        }
        return $total;
    }

    public function printOrder(): void
    {
        foreach ($this->items as $item) {
            echo $item->getName() . " - " . $item->getPrice() . " x " . $item->getQuantity() . "<br>";
        }
    }

    // Показать заказ в виде строки
    public function showOrder(): string
    {
        $output = [];
        foreach ($this->items as $item) {
            $output[] = $item->getName() . " (" . $item->getPrice() . " x " . $item->getQuantity() . ")";
        }
        return implode(", ", $output);
    }
}