<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
   function AddCar(Request $request){
      $carData = $request->except('image');
      if($request->hasFile('image')){
          $imagePath = $request->file('image')->store('images','public');
          $carData['image'] = $imagePath;
      }

      $car = Car::create($carData);
        if($car){
            return response()->json([
            'message'=>'Car added successfully',
            'status'=>'200'
        ]);
      }else{
            return response()->json([
            'message'=>'Car addition operaton fail',
            'status'=>'500'
        ]);
      
      
   }
}

function ShowCar(Request $request){
   $id = $request->id;
   $car = Car::where('id',$id)->first();  
   if($car){
            return response()->json([
            'car'=>$car
        ]);
      }else{
            return response()->json([
            'message'=>'operaton fail',
            'status'=>'500'
        ]);
      
      
   }
}

function UpdateCar(Request $request){
      $car = Car::find($request->input('id'));
      $carData = $request->except('image');
      if($request->hasFile('image')){
          if($car->image && Storage::disk('public')->exists($car->image)){
            Storage::disk('public')->delete($car->image);
          }
          $imagePath = $request->file('image')->store('images','public');
          $carData['image'] = $imagePath;
      }

      $carUpdate = $car->update($carData);
        if($carUpdate){
            return response()->json([
            'message'=>'Car Updated successfully',
            'status'=>'200'
        ]);
      }else{
            return response()->json([
            'message'=>'Car updation operaton fail',
            'status'=>'500'
        ]);
      
      
   }
}

function DeleteCar(Request $request){
    $id =$request->id;
    $car = Car::where('id',$id)->delete();
    if($car){
            return response()->json([
            'message'=>'Car Deleted successfully',
            'status'=>'200'
        ]);
      }else{
            return response()->json([
            'message'=>'Car deletion operaton fail',
            'status'=>'500'
        ]);
   }
}


}
