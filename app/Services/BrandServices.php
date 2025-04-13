<?php

namespace App\Services;

use App\Http\Requests\BrandRequest;
use App\Models\Brand;

class BrandServices
{
    public function store(BrandRequest $request): Brand
    {
        return Brand::create($request->validated());
    }
}