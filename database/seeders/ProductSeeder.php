<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    protected $data = [
        [
            'name' => 'Black Sneakers',
            'image' => 'https://res.cloudinary.com/ywaychitaung/image/upload/v1639837233/ecommerce/b2tza1uhk0r9vorglorf.png',
            'price' => 35.00,
            'description' => "A pair of lightweight mesh men's running shoes as seen from the back or heel of the shoe. These sneakers are great for any activity. Just lace up and get running, jumping, balling, or just straight up looking good.",
            'category' => 'Sneakers'
        ],
        [
            'name' => 'Sunglasses',
            'image' => 'https://res.cloudinary.com/ywaychitaung/image/upload/v1639837328/ecommerce/xyifn2xbggz2bc6dfarg.png',
            'price' => 25.00,
            'description' => 'Bold white framed sunglasses float against a white background.',
            'category' => 'Glasses'
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $product) {
            Product::create($product);
        }
    }
}
