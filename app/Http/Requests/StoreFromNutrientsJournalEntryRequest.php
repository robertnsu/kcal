<?php

namespace App\Http\Requests;

use App\Rules\InArray;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreFromNutrientsJournalEntryRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'date' => ['required', 'date'],
            'meal' => [
                'required',
                new InArray(Auth::user()->meals_enabled->pluck('value')->toArray())
            ],
            'summary' => ['required', 'string'],
            'calories' => ['nullable', 'numeric', 'min:0', 'required_without_all:fat,cholesterol,sodium,carbohydrates,protein,iron,calcium'],
            'fat' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,cholesterol,sodium,carbohydrates,protein,iron,calcium'],
            'cholesterol' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,fat,sodium,carbohydrates,protein,iron,calcium'],
            'sodium' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,fat,cholesterol,carbohydrates,protein,iron,calcium'],
            'iron' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,fat,cholesterol,sodium,carbohydrates,protein,calcium'],
            'calcium' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,fat,cholesterol,sodium,carbohydrates,protein,iron'],
            'carbohydrates' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,fat,cholesterol,sodium,protein,iron,calcium'],
            'protein' => ['nullable', 'numeric', 'min:0', 'required_without_all:calories,fat,cholesterol,sodium,carbohydrates,iron,calcium'],
        ];
    }
}
