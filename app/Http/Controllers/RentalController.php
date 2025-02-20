<?php

namespace App\Http\Controllers;
use App\Models\Rental;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    function CreateRental(Request $request){
       $rental_data = $request->all();
       $rental_data['user_id'] = '1';
       $rental = Rental::create($rental_data);

       if($rental){
            return response()->json([
            'message'=>'Rental created successfully',
            'status'=>'200'
        ]);
      }else{
            return response()->json([
            'message'=>'Rental creation operaton fail',
            'status'=>'500'
        ]);
   }
}

function index(){
  return Inertia::render('Index');
}

}
