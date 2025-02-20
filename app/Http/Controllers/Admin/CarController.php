<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Car;

class CarController extends Controller
{
    function CarPage(){
      $cars = Car::all();
      return Inertia::render('CarPage',['cars'=>$cars]);
    }
}
