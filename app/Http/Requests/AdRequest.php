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
            'address' => ['string', 'max:255'],
            'city_id' => ['integer', 'max:3'],
            'photos' => ['image'],
            'condition_id' => ['integer', 'max:3'],
            'delivery_id' => ['integer', 'max:3'],
            'is_exchangeable' => ['boolean'],
            'user_id' => ['integer', 'max:3'],
        ];
    }
}
