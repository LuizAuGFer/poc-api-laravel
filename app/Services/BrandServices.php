<?php

namespace App\Services;

use App\Http\Requests\BrandRequest;
use Illuminate\Http\Request;
use App\Models\Brand;

class BrandServices
{
    public function list(Request $request)
    {
        $brand = Brand::query();
        return $brand->get();
    }

    public function store(BrandRequest $request): Brand
    {
        return Brand::create($request->validated());
    }

    public function show($id)
    {
        return Brand::find($id);
    }

    public function update(BrandRequest $request, $id)
    {
       $brand = Brand::find($id);

       if(!$brand) {
         return false;
       }

       $brand->update($request->validated());

       return $brand;
    }

    public function delete($id)
    {
        $brand = Brand::find($id);

        if(!$brand) {
          return false;
        }
 
        $brand->delete();
 
        return $brand;
    }
}