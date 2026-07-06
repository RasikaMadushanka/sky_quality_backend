<?php

namespace App\DTO\ProductionLine;

use Carbon\Carbon;

class ProductionLineDTO
{
    public function __construct(
        public string $line_no,
        public string $unit,
        public ?int $supervisor_id = null,
        public ?string $created_date = null
    ) {
        $this->created_date ??= Carbon::now()->toDateTimeString();
    }
}
