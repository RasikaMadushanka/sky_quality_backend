<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\BuyerService;
use App\DTO\Buyer\BuyerDTO;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function __construct(protected BuyerService $service) {}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buyer_name' => 'required|string|max:100',
            'status'     => 'nullable|in:active,inactive'
        ]);

        $dto = new BuyerDTO(
            buyer_name: $validated['buyer_name'],
            status: $validated['status'] ?? 'active'
        );

        $buyer = $this->service->register($dto);

        return response()->json([
            'message' => 'Buyer created successfully',
            'data'    => $buyer
        ], 201);
    }

    public function index()
    {
        return response()->json($this->service->getAllBuyers());
    }
}
