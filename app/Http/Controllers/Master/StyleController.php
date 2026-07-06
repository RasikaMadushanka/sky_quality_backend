<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\StyleService;
use App\DTO\Style\StyleDTO;

class StyleController extends Controller
{
    public function __construct(
        protected StyleService $service
    ) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'buyer_id'   => 'required|integer|exists:buyers,buyer_id',
            'style_name' => 'required|string|max:100',
        ]);

        $dto = new StyleDTO(
            buyer_id: $validated['buyer_id'],
            style_name: $validated['style_name']
        );

        return response()->json([
            'success' => true,
            'message' => 'Style created successfully',
            'data'    => $this->service->register($dto)
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'buyer_id'   => 'required|integer|exists:buyers,buyer_id',
            'style_name' => 'required|string|max:100',
        ]);

        $dto = new StyleDTO(
            buyer_id: $validated['buyer_id'],
            style_name: $validated['style_name']
        );

        return response()->json([
            'success' => true,
            'message' => 'Style updated successfully',
            'data'    => $this->service->updateStyle($id, $dto)
        ]);
    }

    public function destroy(int $id)
    {
        $this->service->deleteStyle($id);

        return response()->json([
            'success' => true,
            'message' => 'Style deleted successfully'
        ]);
    }
}
