<?php

namespace App\Http\Requests;

use App\Rules\EventRuleRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEventRequest extends FormRequest
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
            'title' => ['required', new EventRuleRequest,],
            'description' => ['required', new EventRuleRequest],
            'category_id' => ['required','integer'],
            'image' => 'required','image|mimes:jpeg,png,jpg,svg|max:2048',
            'location' => ['required', new EventRuleRequest],
            'date' => ['required'],
            'reserve_method' => ['required','in:default,request'],
            'tickets' => ['required'],

            
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is reuiqred',
            'description.required' => 'description is required',
            'category_id.required' => 'Category is required',
            'category_id.integer' => 'Select  a category',
            'image.required' => 'image is required',
            'location.required' => 'location is required',
            'date.required' => 'date is required',
            'reserve_method.required' => 'reserve method is required'
    
        ];
    }
}
