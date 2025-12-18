<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarStoreRequest;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(CarStoreRequest $request)
    {
        $validated = $request->validated;
        Log::info('Trying to store a new car with data: ', $validated);

        $car = Car::query()->create($validated);

        return redirect()->with('success', "Created a new car with ID {$car->id}");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Car $car)
    {
        //
    }
}
