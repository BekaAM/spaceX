<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'subscribe' => 'required|unique:subscribes,email||max:56'
            
        ];
    }
    public function messages()
	{
		return [
			
            
            'subscribe.required' =>  trans('general.emailRequest') ,
            'subscribe.unique' =>  trans('general.uniqueEmail') 
          



		];
	}
}
