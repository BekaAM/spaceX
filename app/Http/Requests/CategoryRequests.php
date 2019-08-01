<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use DB;
class CategoryRequests extends FormRequest
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
            
            'category_name.*'=>'required|unique:categories,category_name|distinct|max:56'
       
           
        ];
        
    }
    public function messages()
	{
		return [
			
            'category_name.required' =>  trans('general.categoryRequest') ,
            'category_name.unique' =>  trans('general.unique') 
  

  
            


		];
    }
}
