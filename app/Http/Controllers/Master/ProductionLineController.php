<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ProductionLineService;
use App\DTO\ProductionLine\ProductionLineDTO;

class ProductionLineController extends Controller
{
    public function __construct(
        protected ProductionLineService $service
    ) {}

    public function index()
    {
        return response()->json($this->service->getAll());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'line_no'       => 'required|string|max:50',
            'unit'          => 'required|string|max:50',
            'supervisor_id' => 'nullable|integer|exists:employees,employee_id',
        ]);

        $dto = new ProductionLineDTO(
            line_no: $validated['line_no'],
            unit: $validated['unit'],
            supervisor_id: $validated['supervisor_id'] ?? null
        );

        return response()->json([
            'success' => true,
            'message' => 'Production line created successfully',
            'data'    => $this->service->register($dto)
        ], 201);
    }

    public function update(Request $request, int $id)
    {
        $validated = $request->validate([
            'line_no'       => 'required|string|max:50',
            'unit'          => 'required|string|max:50',
            'supervisor_id' => 'nullable|integer|exists:employees,employee_id',
        ]);

        $dto = new ProductionLineDTO(
            line_no: $validated['line_no'],
            unit: $validated['unit'],
            supervisor_id: $validated['supervisor_id'] ?? null
        );

        return response()->json([
            'success' => true,
            'message' => 'Production line updated successfully',
            'data'    => $this->service->updateLine($id, $dto)
        ]);
    }

    public function destroy(int $id)
    {
        $this->service->deleteLine($id);

        return response()->json([
            'success' => true,
            'message' => 'Production line deleted successfully'
        ]);
    }
}
