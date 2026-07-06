<?php

namespace App\Repositories;

use App\Models\ProductionLine;
use App\DTO\ProductionLine\ProductionLineDTO;

class ProductionLineRepository
{
    public function create(ProductionLineDTO $dto)
    {
        return ProductionLine::create([
            'line_no'       => $dto->line_no,
            'unit'          => $dto->unit,
            'supervisor_id' => $dto->supervisor_id,
            'created_date'  => $dto->created_date,
        ]);
    }

    public function all()
    {
        return ProductionLine::orderBy('line_id', 'desc')->get();
    }

    public function update(int $id, ProductionLineDTO $dto)
    {
        $line = ProductionLine::findOrFail($id);

        $line->update([
            'line_no'       => $dto->line_no,
            'unit'          => $dto->unit,
            'supervisor_id' => $dto->supervisor_id,
        ]);

        return $line;
    }

    public function delete(int $id)
    {
        return ProductionLine::findOrFail($id)->delete();
    }
}
