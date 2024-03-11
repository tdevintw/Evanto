<?php

namespace App\Http\Requests;

use App\Rules\EventRuleRequest;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            $dateTimeY = Carbon::now()->addYear(1);
    
    
            $dateTime = Carbon::now()->addMinutes(10);
    
            return [
                'title' => ['required', new EventRuleRequest,],
                'description' => ['required', new EventRuleRequest],
                'category_id' => ['required', 'integer'],
                'image' => 'required', 'image|mimes:jpeg,png,jpg,svg|max:2048',
                'location' => ['required', new EventRuleRequest],
                'date' => ['required'],
                'date' => ['required', 'date', 'after_or_equal:' . $dateTime, 'before_or_equal:' . $dateTimeY],
                'reserve_method' => ['required', 'in:default,request'],
                'tickets' => ['required', 'integer', 'max:100000'],
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
                'reserve_method.required' => 'reserve method is required',
                'date.after_or_equal' => 'Date must be at least 10 min from now',
                'date.before_or_equal' => 'Max date is 1 year from now',
                'date.date' => 'date should be date',
    
            ];
        }
}
