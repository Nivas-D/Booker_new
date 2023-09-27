<?php
namespace App\Http\Requests;
use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest {
    public function authorize(){
        return auth()->check();
    }
    public function rules(){
        return [
            'name' => [
                'required', 'min:3', Rule::unique((new Tag)->getTable())->ignore($this->route()->tag->id ?? null)
            ],
            'color' => [
                'required'
            ]
        ];
    }
}