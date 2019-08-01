<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequests extends FormRequest
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
            'title' => 'required|max:191',
           
            'cover_images' => 'required|max:191',
            'description'=>'required',
            'category'=>'required|max:2',
            'status'=>'required|max:2'
        ];
        
    }
    public function messages()
	{
		return [
			
            
            'title.required' =>  trans('general.titleRequest') ,
            'description.required' =>  trans('general.descriptionRequest') ,
            'category.required' =>  trans('general.categoryRequest') ,
            'status.required' =>  trans('general.visibilityRequest') ,
            'cover_images.required' =>  trans('general.imgRequest') 
           



		];
	}
}
