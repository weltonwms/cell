<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendaRequest extends FormRequest
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
            'produto_id'=>"required",
            'cliente_id'=>"required",
            'valor_compra'=>"required",
            'valor_venda'=>"required",
            'qtd'=>"required|integer",
           'data'=>"required",
            
        ];
    }
}
