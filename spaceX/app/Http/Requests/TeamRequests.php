<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequests extends FormRequest
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
            'name' => 'required|max:56',
            'lastname' => 'required|max:56',
            'cover_images' => 'required',
            'description'=>'max:200',
            'url_facebook'=>'max:191',
            'url_twitter'=>'max:191',
            'url_gmail'=>'max:191',
            'status'=>'required'
        ];
        
    }
    public function messages()
	{
		return [
			
            
            'name.required' =>  trans('general.nameRequest') ,
            'lastname.required' =>  trans('general.lastnameRequest') ,
            'status.required' =>  trans('general.visibilityRequest') ,
            'cover_images.required' =>  trans('general.imgRequest') 
           



		];
	}
}
