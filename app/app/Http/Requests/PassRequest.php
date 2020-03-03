<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\AlphaNumHalf;
use App\Rules\PassCheck;


class PassRequest extends FormRequest
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
            'pass_old' => ['required', 'min:6', 'max:255', new AlphaNumHalf, new PassCheck],
            'pass_new' => ['required', 'min:6', 'max:255', new AlphaNumHalf, 'confirmed', 'different:pass_old'],
            'pass_new_confirmation' => ['required'],
        ];
    }
}
