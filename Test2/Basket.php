<?php

class Basket
{
    /**
     * @var Order[]
     */
    private array $orders = [];

    public function addOrder(Order $order): void
    {
        $this->orders[] = $order;
    }

    public function getItemsCount(): int
    {
        $totalCount = 0;
        foreach ($this->orders as $order) {
            $totalCount += $order->getItemsCount();
        }
        return $totalCount;
    }

    public function calculateTotalSum(): int
    {
        $total = 0;
        foreach ($this->orders as $order) {
            $total += $order->calculateTotalSum();
        }
        return $total;
    }

    public function load(): void
    {
    }

    public function save()
    {
    }

    public function delete(): void
    {
        $this->orders = [];
    }
}