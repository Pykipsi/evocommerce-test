<?php

declare(strict_types=1);

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\Input\ProductData;

class UpdateRequest extends FormRequest
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
            'name' => ['string', 'max:255'],
            'description' => ['nullable', 'string'],
            'price' => ['numeric', 'min:0'],
            'stock_quantity' => ['integer', 'min:0'],
        ];
    }

    public function createDto(): ProductData
    {
        $price = $this->input('price') ? (float)$this->input('price') : null;
        $quantity = $this->input('stock_quantity') ? (int)$this->input('stock_quantity') : null;

        return new ProductData(
            (string)$this->input('name') ?? null,
            (string)$this->input('description') ?? null,
            $price,
            $quantity
        );
    }
}
