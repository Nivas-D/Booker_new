<?php
namespace App\Http\Requests;
use App\Models\Tag;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest {
    public function authorize(){
        return auth()->check();
    }
    public function rules(){
        return [
            'name' => [
                'required', 'min:3', Rule::unique((new Item)->getTable())->ignore($this->route()->item->id ?? null)
            ],
            'category_id' => [
                'required', 'exists:'.(new Category)->getTable().',id'
            ],
            'excerpt' => [
                'required'
            ],
            'description' => [
                'required'
            ],
            'photo' => [
                $this->route()->item ? 'nullable' : 'required', 'image'
            ],
            'tags' => [
                'required'
            ],
            'tags.*' => [
                'exists:'.(new Tag)->getTable().',id'
            ],
            'status' => [
                'required',
                'in:published,draft,archive'
            ],
            'date' => [
                'required',
                'date_format:d-m-Y'
            ]
        ];
    }
    public function attributes(){
        return [
            'category_id' => 'category',
            'photo' => 'picture'
        ];
    }
}
