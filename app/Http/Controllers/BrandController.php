<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Services\BrandServices;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function __construct(protected BrandServices $brandServices)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $brand = $this->brandServices->list($request);
        return $brand;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BrandRequest $request)
    {
        $brand = $this->brandServices->store($request);
        return BrandResource::make($brand);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $brand = $this->brandServices->show($id);

        if (!$brand) {
            return response()->json([
                'message' => trans('message.not_found')
            ], 404);
        }
    
        return BrandResource::make($brand);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BrandRequest $request, string $id)
    {
        $brand = $this->brandServices->update($request, $id);

        if (!$brand) {
            return response()->json([
                'message' => trans('message.not_found')
            ], 404);
        }

        return BrandResource::make($brand);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = $this->brandServices->delete($id);

        if (!$brand) {
            return response()->json([
                'message' => trans('message.not_found')
            ], 404);
        }
        
        return BrandResource::make($brand);
    }
}
