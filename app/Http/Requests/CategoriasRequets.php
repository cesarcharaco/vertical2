    <?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriasRequets extends FormRequest
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
        'categoria' => 'string|required|unique:categorias'            

        ];
    }

public function messages()
    {
        return [
        'categoria.required' => 'El campo categoria no debe estar vació',
            'categoria.unique' => 'Categoria ya registrado, ingrese otra categoria'

        ];
    }

}
