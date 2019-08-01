<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequests extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *InformationRequests
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
            
            'question.*'=>'required',
            'answers.*'=>'required'
       
           
        ];
        
    }
    public function messages()
	{
		return [
			
            'question.required' =>  trans('general.questionRequest') ,
            'answers.required' =>  trans('general.answersRequest') 
  

  
            


		];
    }
}
