<?php

namespace App\Repositories;

use App\Models\Style;
use App\DTO\Style\StyleDTO;

class StyleRepository
{
    public function create(StyleDTO $dto)
    {
        return Style::create([
            'buyer_id'    => $dto->buyer_id,
            'style_name'  => $dto->style_name,
            'created_date'=> $dto->created_date,
        ]);
    }

    public function all()
    {
        return Style::orderBy('style_id', 'desc')->get();
    }

    public function update(int $id, StyleDTO $dto)
    {
        $style = Style::findOrFail($id);

        $style->update([
            'buyer_id'   => $dto->buyer_id,
            'style_name' => $dto->style_name,
        ]);

        return $style;
    }

    public function delete(int $id)
    {
        return Style::findOrFail($id)->delete();
    }
}
