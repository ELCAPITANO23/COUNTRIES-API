<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * GET /api/countries
     * List all countries.
     */
    public function index()
    {
        $countries = Country::latest()->get(); //$countries is variable name: Country is the model name : latest f(x) that order in DESC : get fx returns the rows

        return response()->json([ // the response is converted from an array($countries) to json format (data) with status response code 200
            'data' => $countries,
        ], 200);
    }

    /**
     * POST /api/countries
     * Create a new country.
     */
    public function store(Request $request) //REQUEST laravel class that wraps the HTTP request : $request the variable holding the request
    {
      $validated = $request->validate([
          'name'       => 'required|string|max:255',
          'capital'    => 'nullable|string|max:255',
          'code'       => 'required|string|max:3|unique:countries,code',
          'continent'  => 'nullable|string|max:255',
          'population' => 'nullable|integer|min:0',
      ]);

        $country = Country::create($validated);

        return response()->json([
            'message' => 'Country created successfully.',
            'data'    => $country,
        ], 201);
    }

    /**
     * GET /api/countries/{id}
     * Show a single country.
     */
    public function show(string $id)
    {
        $country = Country::find($id);

        if (! $country) {
            return response()->json([
                'message' => 'Country not found.',
            ], 404);
        }

        return response()->json([
            'data' => $country,
        ], 200);
    }

    /**
     * PUT/PATCH /api/countries/{id}
     * Update a country.
     */
    public function update(Request $request, string $id)
    {
        $country = Country::find($id);

        if (! $country) {
            return response()->json([
                'message' => 'Country not found.',
            ], 404);
        }

        $validated = $request->validate([
            'name'       => 'sometimes|required|string|max:255',
            'capital'    => 'sometimes|string|max:255',
            'code'       => 'sometimes|string|max:3|unique:countries,code',
            'continent'  => 'sometimes|string|max:255',
            'population' => 'sometimes|integer|min:0',
        ]);

        $country->update($validated);

        return response()->json([
            'message' => 'Country updated successfully.',
            'data'    => $country,
        ], 200);
    }

    /**
     * DELETE /api/countries/{id}
     * Delete a country.
     */
    public function destroy(string $id)
    {
        $country = Country::find($id);

        if (! $country) {
            return response()->json([
                'message' => 'Country not found.',
            ], 404);
        }

        $country->delete();

        return response()->json([
            'message' => 'Country deleted successfully.',
        ], 200);
    }
}
