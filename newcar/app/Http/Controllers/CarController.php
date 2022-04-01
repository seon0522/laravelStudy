<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Post;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    //
    public function create(){

            return view('car.create');
    }

    public function store(Request $request){
        $this->validate($request, ["carname"=>'required', "manufacturer"=>'required',
            "caryear"=>'required', "carmodel"=>'required',
            "price"=>'required', "appearance"=>'required']);

//        dd($request);

        $fileName = null;

        if($request->hasFile('image')){
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public/images',$fileName);
        }

        $input = array_merge($request->all(),
            ["user_id"=>Auth::user()->id]);

        if($fileName){
            $input = array_merge($input, [$input, 'image' => $fileName]);
        }



        Car::create($input);

        return redirect()->route('car.index');
    }

    public function index(){
        $cars = Car::latest()->paginate(4);

        return view('car.index', ['cars'=>$cars]);
    }

    public function show($car){
        $cars = Car::findOrFail($car);

//        dd($cars);

//        dd($cars);

        return view('car.show', ["cars"=>$cars]);
    }

    public function edit($car){
        $cars = Car::find($car);

        return view('car.edit', ["cars"=>$cars]);
    }

    public function update(Request $request, $car){
        $this->validate($request, ["carname"=>'required', "manufacturer"=>'required',
            "caryear"=>'required', "carmodel"=>'required',
            "price"=>'required', "appearance"=>'required']);

        $cars = Car::find($car);
        $cars->carname = $request->carname;
        $cars->manufacturer = $request->manufacturer;
        $cars->caryear = $request->caryear;
        $cars->carmodel = $request->carmodel;
        $cars->price = $request->price;
        $cars->appearance = $request->appearance;

        if($request->image){
            if($cars->image){
                Storage::delete('public/images/'.$cars->image);
            }
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $cars->image = $fileName;
            $request->image->storeAs('public/images/'.$fileName);
        }

        $cars->save();

        return redirect()->route('posts.show',['car'=>$cars->id]);
    }

    public function destroy($car){
        $cars = Car::find($car);

        $cars->delete();

        return redirect()->route('car.index');
    }

    public function deleteImage($id)
    {
        $cars = Car::find($id);
        Storage::delete('public/images', $cars->image);

        $cars->image = null;
        $cars->save();

        return redirect()->route('car.edit', ['car' => $cars->id]);
    }
}
