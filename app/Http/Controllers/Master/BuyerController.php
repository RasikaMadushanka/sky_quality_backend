<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\BuyerService;
use App\DTO\Buyer\BuyerDTO;

class BuyerController extends Controller
{
    public function __construct(
        protected BuyerService $service
    ) {}

    public function index()
    {
        return response()->json(
            $this->service->getAllBuyers()
        );
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buyer_name' => 'required|string|max:100',
            'status'     => 'nullable|in:active,inactive',
        ]);

        $dto = new BuyerDTO(
            buyer_name: $validated['buyer_name'],
            status: $validated['status'] ?? 'active'
        );

        return response()->json([
            'success' => true,
            'message' => 'Buyer created successfully',
            'data'    => $this->service->register($dto)
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'buyer_name' => 'required|string|max:100',
            'status'     => 'required|in:active,inactive',
        ]);

        $dto = new BuyerDTO(
            buyer_name: $validated['buyer_name'],
            status: $validated['status']
        );

        return response()->json([
            'success' => true,
            'message' => 'Buyer updated successfully',
            'data'    => $this->service->updateBuyer($id, $dto)
        ]);
    }

    public function destroy(int $id)
    {
        $this->service->deleteBuyer($id);

        return response()->json([
            'success' => true,
            'message' => 'Buyer deleted successfully'
        ]);
    }
}
