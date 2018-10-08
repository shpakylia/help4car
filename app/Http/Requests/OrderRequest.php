<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class OrderRequest extends Request
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
            'notice'=> 'required',
            'name'=> 'required|min:3',
            'phone'=> 'required|numeric|regex:(0[0-9]{9})',
        ];
    }

    public function attributes(){
        return [
            'notice' => 'Дополнительная иформация',
            'name' => 'Имя',
            'phone' => 'Телефон'
        ];
    }
}
