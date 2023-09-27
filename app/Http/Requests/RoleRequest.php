<?php
namespace App\Http\Requests;
use App\Models\Role;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest{
    public function authorize(){
        return auth()->check();
    }
    public function rules(){
        return [
            'name' => [
                'required', 'min:3', Rule::unique((new Role)->getTable())->ignore($this->route()->role->id ?? null)
            ],
            'description' => [
                'nullable', 'min:5'
            ]
        ];
    }
}