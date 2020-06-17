<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\News;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
 
use Carbon\Carbon;

class HomeController extends Controller
{
  public function index(Request $request)
  {
    $news = News::where('is_enabled', true)
      ->orderBy('created_at', 'desc')
      ->get();
    
    $carsWithDriver = Car::where('with_driver', true)
      ->get()
      ->random(2); 
    
    $carsWithoutDriver = Car::where(function($query) {
        $query->where('with_driver', false)
          ->orWhereNull('with_driver');
      })
      ->get()
      ->random(2); 
       
    return view('home', [
      'news' => $news,
      'carsWithDriver' => $carsWithDriver,
      'carsWithoutDriver' => $carsWithoutDriver
    ]);  
  }
}
