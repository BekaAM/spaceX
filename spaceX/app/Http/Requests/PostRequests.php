<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequests extends FormRequest
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
            'title' => 'required',
            'content' => 'required',
            'cover_images' => 'required',
            'visibility'=>'required',
            'blog_category'=>'required|max:56'
        ];
        
    }
    public function messages()
	{
		return [
			
            
            'title.required' =>  trans('general.titleRequest') ,
            'visibility.required' =>  trans('general.visibilityRequest') ,
            'content.required' =>  trans('general.contentRequest') ,
            'blog_category.required' =>  trans('general.categoryRequest') ,
            'cover_images.required' =>  trans('general.imgRequest'),



		];
	}
}
