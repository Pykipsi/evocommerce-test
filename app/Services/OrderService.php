<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Order;
use App\Services\Input\OrderData;
use App\Services\Repositories\{OrderRepositoryInterface, ProductRepositoryInterface};

readonly class OrderService implements OrderServiceInterface
{
    public function __construct(
        private ProductRepositoryInterface $productRepository,
        private OrderRepositoryInterface   $orderRepository
    )
    {
    }

    public function store(OrderData $orderData): Order
    {
        $order = $this->orderRepository->create([
            'customer_name' => $orderData->getCustomerName(),
            'customer_email' => $orderData->getCustomerEmail(),
            'total_amount' => 0,
        ]);

        $totalAmount = 0;

        $products = $orderData->getProducts();
        $productModels = $this->productRepository->getProductsByIds($orderData->getProductIds());

        foreach ($products as $product) {
            $subtotal = $productModels->find($product['id'])->price * $product['quantity'];
            $totalAmount += $subtotal;

            $order->products()->attach($product['id'], ['quantity' => $product['quantity']]);
        }

        $order->update(['total_amount' => $totalAmount]);

        return $order;
    }

    public function find(int $id): ?Order
    {
        return $this->orderRepository->findWithProducts($id);
    }
}
