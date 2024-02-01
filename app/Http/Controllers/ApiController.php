<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller; // Import the Controller class
use App\Models\Category;

class ApiController extends Controller
{
    public function View(){
        // Retrieve categories from the database
        $categories = Category::all();
        return view('categories',compact('categories'));
    }
    public function fetchDataAndStore()
    {
        // Make a request to the third-party API using Laravel's Http facade
        $response = Http::get('https://api.coingecko.com/api/v3/coins/categories/list');

        // Decode the JSON response
        $categories = $response->json();

        // Store the data in your database
        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['category_id' => $category['category_id'] ?? null],
                ['name' => $category['name'] ?? null]
            );
        } 
        // Return a JSON response along with rendering the view
        return redirect('view')->with('success','Data has been fetched');
    }
}

