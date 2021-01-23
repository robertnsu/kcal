<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\Recipe;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class IngredientPickerController extends Controller
{
    /**
     * Search for ingredients.
     */
    public function search(Request $request): JsonResponse
    {
        $results = [];
        $term = $request->query->get('term');
        if (!empty($term)) {
            $results = Food::search($term);
            $results = $results->merge(Recipe::search($term));
        }
        return response()->json($results);
    }
}