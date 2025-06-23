<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return false;
        return true;  // para permitir el acceso a todos los usuarios  (si tienes roles puedes utilizar este metodo como otra capa de seguridad)
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'         => 'required|min:5|max:100',
            'slug'          => 'required|unique:categories,slug,' . $this->category->id,
           
        ];
    }

    public function messages(): array
    {
        return [
            'title.required'        => 'El título es obligatorio.',
            'title.min'             => 'El título debe tener al menos 5 caracteres.',
            'title.max'             => 'El título no puede tener más de 100 caracteres.',
            'slug.required'         => 'El slug es obligatorio.',
            'slug.unique'           => 'El slug ya esta ocupado en otra categoria.',
           
        ];
    }
}
