<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'title' => ['string', 'max:255'],
            'category_id' => ['integer', 'max:3'],
            'description' => ['string'],
            'price' => ['integer', 'max:9999'], //TODO: decimal => Validation rule decimal requires at least 1 parameters.
            'address' => ['string', 'max:255'],
            'city_id' => ['integer', 'max:3'],
            'photos' => ['image'],
            'condition_id' => ['integer', 'max:3'],
            'brand' => ['string', 'max:255'],
            'model' => ['string', 'max:255'],
            'year' => ['integer'],
            'size' => ['string', 'max:255'],
            'delivery_id' => ['integer', 'max:3'],
            'warranty' => ['string', 'max:255'],
            'is_exchangeable' => ['boolean'],
        ];
    }
}
