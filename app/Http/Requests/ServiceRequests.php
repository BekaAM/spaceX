<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequests extends FormRequest
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
            'title' => 'required|max:89',
            'description' => 'required|max:191',
            'class' => 'required',
           
            'status'=>'required'
        ];
        
    }
    public function messages()
	{
		return [
			
            
            'title.required' =>  trans('general.nameRequest') ,
            'description.required' =>  trans('general.descriptionRequest') ,
            'status.required' =>  trans('general.visibilityRequest') ,
            'class.required' =>  trans('general.classRequest') 
           



		];
	}
}
