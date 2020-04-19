<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePhotoEditRequest extends FormRequest
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

    protected function prepareForValidation()
    {
        // dd($this->request->get('tags'));

    }

    public function attributes()
    {
        $attributes = [];

        foreach( $this->request->get('tags') as $key => $value){

            $tagNumber = $key + 1;

            $attributes = array_merge(
                $attributes,
                [
                    "tags.$key" => "タグ$tagNumber"
                ]
                );
        }

        return $attributes;


        
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pic' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048' ],
            'title' => ['required', 'string', 'max:255'],
            'detail' => ['nullable' ,'string', 'max:255'],

            // 'tags' => ['required'],

            'tags.*' => ['nullable', 'string', 'max:255']

        ];
    }
}
