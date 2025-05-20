<?php

declare(strict_types=1);

namespace App\Http\Requests\Order;

use Illuminate\Foundation\Http\FormRequest;

use App\Services\Input\OrderData;

class StoreOrderRequest extends FormRequest
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
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_email' => ['required', 'email', 'max:255'],
            'products' => ['required', 'array', 'min:1'],
            'products.*.id' => ['required', 'integer', 'exists:products,id'],
            'products.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    public function createDto(): OrderData
    {
        $orderData = new OrderData((string)$this->input('customer_name'), (string)$this->input('customer_email'));

        foreach ($this->input('products') as $product) {
            $orderData->pushProduct($product['id'], $product['quantity']);
        }

        return $orderData;
    }
}
