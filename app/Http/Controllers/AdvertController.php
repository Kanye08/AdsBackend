<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertResource;
use App\Models\Advert;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    public function index()
    {
        $advert = Advert::all();
        return response()->json($advert);
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string',
            'from' => 'required|date',
            'to' => 'required|date',
            'total_budget' => 'required|numeric',
            'daily_budget' => 'required|numeric',
            'image' => 'required|image',
        ]);

        // Save the creative file
        $file = $request->file('image');
        $path = $file->store('creative');

        // Create a new advert
        $advert = Advert::create([
            'name' => $request->input('name'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'total_budget' => $request->input('total_budget'),
            'daily_budget' => $request->input('daily_budget'),
            'image' => $path,
        ]);

        // Return a response
        return response()->json([

            'message' => 'Advert Campaign created successfully!'
        ], 201);
    }


    public function show($id)
    {
        // Find the advert by its ID
        if ($advert = Advert::findOrFail($id)) {
            // Return the advert
            return new AdvertResource($advert);
        } else {
            return response()->json([
                'message' => 'Advert Record Not Found!'
            ], 404);
        };
    }


    public function update(Request $request, $id)
    {
        // Find the advert by its ID
        if ($advert = Advert::findOrFail($id)) {
            // Validate the request data
            $request->validate([
                'name' => 'sometimes|string',
                'from' => 'sometimes|date',
                'to' => 'sometimes|date',
                'total_budget' => 'sometimes|numeric',
                'daily_budget' => 'sometimes|numeric',
                'image' => 'sometimes|image',
            ]);

            // Update the advert
            $advert->name = $request->input('name', $advert->name);
            $advert->from = $request->input('from', $advert->from);
            $advert->to = $request->input('to', $advert->to);
            $advert->total_budget = $request->input('total_budget', $advert->total_budget);
            $advert->daily_budget = $request->input('daily_budget', $advert->daily_budget);

            // Update the creative file if provided
            if ($request->hasFile('image')) {
                // Save the creative file
                $creative = $request->file('image');
                $filename = time() . '.' . $creative->getClientOriginalExtension();
                $path = $creative->storeAs('creatives', $filename);

                // Update the creative field
                $advert->creative = $path;
            }


            // Return a response
            return response()->json([
                'message' => 'Advert updated successfully!'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Advert Record Not Found!'
            ], 404);
        };
    }




    public function destroy($id)
    {
        // Find the advert by its ID
        $advert = Advert::findOrFail($id);

        // Delete the advert
        $advert->delete();

        // Return a response
        return response()->json([
            'message' => 'Advert deleted successfully!'
        ], 200);
    }
}