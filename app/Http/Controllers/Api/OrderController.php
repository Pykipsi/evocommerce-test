<?php

namespace App\Http\Controllers\Api;

use Throwable;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\{JsonResponse, Request};

use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Services\OrderServiceInterface;

class OrderController extends Controller
{
    public function __construct(private readonly OrderServiceInterface $orderService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): JsonResponse
    {
        DB::beginTransaction();

        try {
            $order = $this->orderService->store($request->createDto());
        } catch (Throwable $exception) {
            DB::rollBack();

            return response()->json([
                'message' => 'Order creation failed',
                'error' => $exception->getMessage(),
            ], 500);
        }

        DB::commit();

        return response()->json([
            'message' => 'Order created successfully',
            'order' => new OrderResource($order->load('products')),
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): JsonResponse
    {
        $order = $this->orderService->find($id);

        if ($order) {
            return response()->json(new OrderResource($order));
        }

        return response()->json(['message' => 'Order not found'], 404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
