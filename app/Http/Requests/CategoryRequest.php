<?php
namespace App\Http\Requests;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest {
    public function authorize(){
        return auth()->check();
    }
    public function rules(){
        return [
            'name' => [
                'required', 'min:3', Rule::unique((new Category)->getTable())->ignore($this->route()->category->id ?? null)
            ],
            'description' => [
                'nullable', 'min:5'
            ]
        ];
    }
}