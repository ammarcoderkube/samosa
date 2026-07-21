<?php

namespace App\Http\Controllers;

class Controller
{
    function webPage()
    {
        $product = [

            [
                'id' => 1,
                'title' => 'Classic Potato Samosa',
                'desc' => 'Golden crisp crust stuffed with seasoned potato & green pea filling.',
                'price' => '$2.99',
                'image' => 'product1.jpeg'
            ],
            [
                'id' => 2,
                'title' => 'Crispy Mini Samosas',
                'desc' => 'Bite-sized crunch packed with signature spices and fresh herbs.',
                'price' => '$4.49',
                'image' => 'product2.jpeg'
            ],
            [
                'id' => 3,
                'title' => 'Classic Potato Samosa',
                'desc' => 'Golden crisp crust stuffed with seasoned potato & green pea filling.',
                'price' => '$2.99',
                'image' => 'product3.jpeg'
            ],
            [
                'id' => 2,
                'title' => 'Crispy Mini Samosas',
                'desc' => 'Bite-sized crunch packed with signature spices and fresh herbs.',
                'price' => '$4.49',
                'image' => 'product2.jpeg'
            ],
            [
                'id' => 3,
                'title' => 'Classic Potato Samosa',
                'desc' => 'Golden crisp crust stuffed with seasoned potato & green pea filling.',
                'price' => '$2.99',
                'image' => 'product3.jpeg'
            ],
            [
                'id' => 1,
                'title' => 'Classic Potato Samosa',
                'desc' => 'Golden crisp crust stuffed with seasoned potato & green pea filling.',
                'price' => '$2.99',
                'image' => 'product1.jpeg'
            ],
        ];
        return view('homepage', compact('product'));
    }
}
