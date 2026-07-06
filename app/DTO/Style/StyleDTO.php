<?php

namespace App\DTO\Style;

use Carbon\Carbon;

class StyleDTO
{
    public function __construct(
        public int $buyer_id,
        public string $style_name,
        public ?string $created_date = null
    ) {
        $this->created_date ??= Carbon::now()->toDateTimeString();
    }
}
