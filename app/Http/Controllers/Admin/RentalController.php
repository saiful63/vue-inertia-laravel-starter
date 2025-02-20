<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    function RentalPage(){
      return Inertia::render('RentalPage');
    }
}
