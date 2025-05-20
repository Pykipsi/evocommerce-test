<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\Input\ProductData;

class ProductRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
        ];
    }

    public function createDto(): ProductData
    {
        return new ProductData(
            (string)$this->input('name'),
            (string)$this->input('description') ?? null,
            (float)$this->input('price'),
            (int)$this->input('stock_quantity')
        );
    }
}
