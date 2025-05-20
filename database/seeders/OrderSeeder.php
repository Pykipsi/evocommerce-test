<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\{Order, Product};

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        Order::factory()->count(15)->create()->each(function ($order) use ($products) {
            $total = 0;

            $items = $products->random(rand(2, 4));

            foreach ($items as $product) {
                $quantity = rand(1, 3);
                $order->products()->attach($product->id, ['quantity' => $quantity]);
                $total += $product->price * $quantity;
            }

            $order->update(['total_amount' => $total]);
        });
    }
}
