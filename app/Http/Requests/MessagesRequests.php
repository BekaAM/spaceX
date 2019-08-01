<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequests extends FormRequest
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
            'name' => 'required|min:3|max:56',
            'lastname' => 'required|min:3|max:56',
            'email' => 'required|min:3|max:30',
            'phone' => 'required|min:8|max:20',
            'description'=>'required|max:356'
            
           
        ];
        
    }
    public function messages()
	{
		return [
			
            
            'name.required' =>  trans('general.nameRequest') ,
            'description.required' =>  trans('general.descriptionRequest') ,
            'lastname.required' =>  trans('general.lastnameRequest') ,
            'phone.required' =>  trans('general.phoneRequest') ,
            'email.required' =>  trans('general.emailRequest') 
           



		];
	}
}
