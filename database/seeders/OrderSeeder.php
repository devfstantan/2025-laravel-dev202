<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orders = Order::factory(10)->create();
        foreach ($orders as $order) {
            // jib 2 produits 3xwa2iyin.
            $p1 = Product::inRandomOrder()->first();
            $p2 = Product::where('id', '<>', $p1->id )->inRandomOrder()->first();
            // rbt had 2 produits m3a l'order
            $order->products()->attach([
                $p1->id => ['quantity' => 10],
                $p2->id => ['quantity' => 20]
            ]);
            // jm3 taman dial l produits
            $total = $p1->price*10 + $p2->price*20;
            // bdl price_total dial order
            $order->price_total = $total;
            $order->save();
        }
    }
}
