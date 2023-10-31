<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $menu = [
                ['category' => 'Northern Cuisine','name' => 'Aloo paratha', 'image' => 'aloo-paratha.jpg', 'description' => 'A delectable flatbread stuffed with a savory spiced potato filling, the aloo paratha is a staple of North Indian cuisine. Its soft, flaky exterior yields to a hearty, flavorful interior, making it a satisfying and delicious meal.', 'price' => 5.99],
                ['category' => 'Northern Cuisine','name' => 'Paneer paratha', 'image' => 'paneer-paratha.jpg', 'description' => 'A delectable flatbread stuffed with a savory spiced paneer cheese filling, the paneer paratha is a popular vegetarian dish in North Indian cuisine. Its soft, flaky exterior yields to a creamy, flavorful interior, making it a satisfying and delicious meal.', 'price' => 6.99],
                ['category' => 'Northern Cuisine','name' => 'Paneer masala', 'image' => 'paneer-masala.jpg', 'description' => 'A velvety smooth and flavorful curry made with paneer cheese and a rich tomato-based sauce, paneer masala is a popular North Indian dish. The paneer cheese is soft and creamy, and the sauce is rich and flavorful, making this dish a truly delectable experience.', 'price' => 8.99],
                ['category' => 'Northern Cuisine','name' => 'Paneer matar', 'image' => 'paneer-matar.jpg', 'description' => 'A hearty and flavorful curry made with paneer cheese, peas, and a rich tomato-based sauce, paneer matar is a popular North Indian dish. The paneer cheese is soft and creamy, and the peas add a touch of sweetness, making this dish a delicious and satisfying meal.', 'price' => 9.99],
                ['category' => 'Northern Cuisine','name' => 'Rajma', 'image' => 'rajma.jpg', 'description' => 'A creamy and flavorful curry made with kidney beans and a rich tomato-based sauce, rajma is a popular North Indian dish. The kidney beans are soft and tender, and the sauce is rich and flavorful, making this dish a delicious and satisfying meal.', 'price' => 10.99],
                ['category' => 'Northern Cuisine','name' => 'Naan', 'image' => 'naan.jpg', 'description' => 'A delectable flatbread that is soft and chewy on the inside and crispy on the outside, naan is the perfect accompaniment to any Indian dish. Its smoky flavor and slightly charred exterior add a touch of authenticity and excitement to your meal.', 'price' => 4.99],
                ['category' => 'Northern Cuisine','name' => 'Tandoori chicken', 'image' => 'tandoori-chicken.jpg', 'description' => 'Succulent and juicy, tandoori chicken is a dish that is sure to tantalize your taste buds. The chicken is marinated in a blend of yogurt and spices, which gives it a unique and flavorful taste. The cooking process in a tandoor oven imparts a smoky flavor that is simply irresistible.', 'price' => 14.99],
                ['category' => 'Northern Cuisine','name' => 'Butter chicken', 'image' => 'butter-chicken.jpg', 'description' => 'A velvety smooth and flavorful curry made with chicken, tomatoes, and butter, butter chicken is a dish that is sure to melt in your mouth. The chicken is tender and juicy, and the sauce is rich and creamy. This dish is the perfect combination of flavors and textures.', 'price' => 15.99],
                ['category' => 'Northern Cuisine','name' => 'Biryani', 'image' => 'biryani.jpg', 'description' => 'A fragrant and flavorful rice dish cooked with meat, vegetables, and spices, biryani is a dish that is sure to impress. The rice is fluffy and aromatic, and the meat is tender and flavorful. This dish is the perfect way to experience the rich culinary traditions of India.', 'price' => 16.99],
                ['category' => 'Northern Cuisine','name' => 'Dal makhani', 'image' => 'dal-makhani.jpg', 'description' => 'A rich and creamy lentil curry made with black lentils and kidney beans, dal makhani is a popular North Indian dish. The lentils are soft and flavorful, and the sauce is rich and creamy, making this dish a delicious and satisfying meal.', 'price' => 11.99],
                ['category' => 'Northern Cuisine','name' => 'Chana masala', 'image' => 'chana-masala.jpg', 'description' => 'A hearty and flavorful curry made with chickpeas and a rich tomato-based sauce, chana masala is a popular North Indian dish. The chickpeas are soft and tender, and the sauce is rich and flavorful, making this dish a delicious and satisfying meal.', 'price' => 12.99],
                [
                    'category' => 'Southern Cuisine',
                    'name' => 'Idli Sambhar',
                    'image' => 'idli-sambhar.jpg',
                    'description' => 'A classic South Indian dish of steamed rice and lentil cakes served with a lentil-based stew.',
                    'price' => 6.99
                ],
                [
                    'category' => 'Southern Cuisine',
                    'name' => 'Masala Dosa',
                    'image' => 'masala-dosa.jpg',
                    'description' => 'A thin crepe made from fermented rice and lentil batter and filled with a spicy potato filling.',
                    'price' => 7.99
                ],
                [
                    'category' => 'Southern Cuisine',
                    'name' => 'Vada Sambhar',
                    'image' => 'vada-sambhar.jpg',
                    'description' => 'A savory donut made from lentil batter served with a lentil-based stew.',
                    'price' => 5.99
                ],
                [
                    'category' => 'Southern Cuisine',
                    'name' => 'Plain Dosa',
                    'image' => 'plain-dosa.jpg',
                    'description' => 'A thin crepe made from fermented rice and lentil batter.',
                    'price' => 4.99
                ],
                [
                    'category' => 'Southern Cuisine',
                    'name' => 'Upma',
                    'image' => 'upma.jpg',
                    'description' => 'A savory porridge made from semolina or rice.',
                    'price' => 3.99
                ],
                [
                    'category' => 'Beverages',
                    'name' => 'Masala Chai',
                    'image' => 'masala-chai.jpg',
                    'description' => 'A spiced tea made with black tea, milk, and a variety of spices, including ginger, cardamom, and cinnamon.',
                    'price' => 2.99,
                ],
                [
                    'category' => 'Beverages',
                    'name' => 'Filter Coffee',
                    'image' => 'filter-coffee.jpg',
                    'description' => 'A strong, dark coffee made by pouring hot water over ground coffee beans in a filter.',
                    'price' => 2.99,
                ],
                [
                    'category' => 'Beverages', 
                    'name' => 'Lassi',
                    'image' => 'lassi.jpg',
                    'description' => 'A yogurt-based drink that can be sweet or savory. Sweet lassis are often flavored with fruits, such as mango or strawberry, while savory lassis are often flavored with cumin and mint.',
                    'price' => 3.99
                ],
                [
                    'category' => 'Beverages',
                    'name' => 'Nimbu Pani',
                    'image' => 'nimbu-pani.jpg',
                    'description' => 'A refreshing lemonade made with lemon juice, water, sugar, and salt.',
                    'price' => 2.99
                ],
                [
                    'category' => 'Beverages',
                    'name' => 'Jaljeera',
                    'image' => 'jaljeera.jpg',
                    'description' => 'A savory drink made with cumin seeds, mint leaves, ginger, and black pepper. It is often served with a side of lemon juice and coriander leaves.',
                    'price' => 3.99
                ],
                [
                    'category' => 'Beverages',
                    'name' => 'Aam Panna',
                    'image' => 'aam-panna.jpg',
                    'description' => 'A sweet and tangy drink made with raw mango pulp, water, sugar, and cumin powder.',
                    'price' => 3.99
                ],
                [
                    'category' => 'Beverages',
                    'name' => 'Coconut Water',
                    'image' => 'coconut-water.jpg',
                    'description' =>  "The clear liquid found inside a coconut. It is a refreshing and hydrating drink that is also a good source of electrolytes.",
                    "price" => 2.99
                ],
                [
                    'category' => 'Beverages',
                    "name" => "Buttermilk",
                    "image" => "buttermilk.jpg",
                    "description" => "A fermented milk drink that is low in fat and calories. It is often served with meals or as a drink on its own.",
                    "price" => 2.99
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Gulab Jamun',
                    'image' => 'gulab-jamun.jpg',
                    'description' => 'Sweet, deep-fried dough balls soaked in a sugar syrup flavored with rose water and cardamom.',
                    'price' => 4.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Rasgulla',
                    'image' => 'rasgulla.jpg',
                    'description' => 'Soft, spongy cheese balls soaked in a sugar syrup flavored with cardamom.',
                    'price' => 3.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Mishti Doi',
                    'image' => 'mishti-doi.jpg',
                    'description' => 'Sweet, fermented yogurt with a rich, creamy texture.',
                    'price' => 4.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Jalebi',
                    'image' => 'jalebi.jpg',
                    'description' => 'Deep-fried batter spirals soaked in a sugar syrup.',
                    'price' => 3.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Gajar ka Halwa',
                    'image' => 'gajar-ka-halwa.jpg',
                    'description' => 'A delicious carrot pudding made with carrots, milk, sugar, and nuts.',
                    'price' => 4.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Kheer',
                    'image' => 'kheer.jpg',
                    'description' => 'A rice pudding made with milk, sugar, and rice.',
                    'price' => 3.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Ladoo',
                    'image' => 'ladoo.jpg',
                    'description' => 'A sweet ball made with a variety of ingredients, such as milk, sugar, nuts, and dried fruit.',
                    'price' => 4.99,
                ],
                [
                    'category' => 'Desserts',
                    'name' => 'Rasmalai',
                    'image' => 'rasmalai.jpg',
                    'description' => 'Soft, spongy cheese balls soaked in a sweet, creamy milk sauce.',
                    'price' => 5.99,
                ],
        ];
        foreach ($menu as $dish) {
            $folderName = str_replace(' ', '-', strtolower($dish['category']));
            DB::table('food_items')->insert([
                'category' => $dish['category'],
                'name' => $dish['name'],
                'image' => "assets/Categories/$folderName/{$dish['image']}",
                'description' => $dish['description'],
                'price' => $dish['price'],
            ]);
        }
        
    }
}
