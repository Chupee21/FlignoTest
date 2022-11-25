<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    //
    public function index(){
        return view('Brands.add');
    }

    public function store(Request $request){
        $brand = new Brand;
        $brand->name = $request->brand;
        $brand->save();

        return redirect()->back();
    }

    public function view(){
        $brands = Brand::all();
        return view('Brands.index',compact('brands'));
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('Brands.edit', compact('brand'));
    }

    public function update(Request $request){
        $brand = Brand::find($request->id);
        //$brand->name = $request->brand;
        //$brand->save();

        $brand->update(['name'=> $request->brand]);
        return redirect()->back();
    }

    public function destroy($id){
        $brand = Brand::find($id);
        $brand->delete();
        return redirect()->back();
    }

}
