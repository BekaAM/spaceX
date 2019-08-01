<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformationRequests extends FormRequest
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
            
            'category.*'=>'required',
            'content.*'=>'required'
       
           
        ];
        
    }
    public function messages()
	{
		return [
			
            'category.required' =>  trans('general.categoryRequest') ,
            'content.required' =>  trans('general.contentRequest') 
         

  
            


		];
    }
}
