<?php

namespace App\Http\Controllers;

use App\Models\Car;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CarsController extends Controller
{ 
  public function service(Request $request)
  {
    $carsWithDriver = Car::where('with_driver', true)
      ->orderBy('name', 'asc')
      ->get();

    return view('service', [
      'cars' => $carsWithDriver
    ]);
  }
  
  public function getCarWithDriver(Request $request, $car_id)
  {
    $carWithDriver = Car::where('with_driver', true)
      ->where('id', $car_id)
      ->first();
      
    if (!is_null($carWithDriver)) { 
      return view('car-with-driver', [
        'car' => $carWithDriver
      ]);
    } else {
      abort(404);
    }
  }
  
  public function rent(Request $request)
  {
    $carsWithoutDriver = Car::where(function($query) {
        $query->where('with_driver', false)
          ->orWhereNull('with_driver');
      })
      ->orderBy('name', 'asc')
      ->get();

    return view('rent', [
      'cars' => $carsWithoutDriver
    ]);
  }
  
  public function getCarWithoutDriver(Request $request, $car_id)
  {
    $carWithoutDriver = Car::where(function($query) {
        $query->where('with_driver', false)
          ->orWhereNull('with_driver');
      })
      ->where('id', $car_id)
      ->first();
      
    if (!is_null($carWithoutDriver)) { 
      return view('car-without-driver', [
        'car' => $carWithoutDriver
      ]);
    } else {
      abort(404);
    }
  }
}
