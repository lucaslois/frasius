<?php

namespace App\Http\Controllers;

use App\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
    public function main() {
        return view('main');
    }

    public function index() {
        $fruits = Fruit::all();

        return response()->json($fruits);
    }

    public function store(Request $request) {
        $faker = \Faker\Factory::create();
        Fruit::create([
           'name' => $faker->userName,
           'description' => $faker->sentence
        ]);
    }
}
