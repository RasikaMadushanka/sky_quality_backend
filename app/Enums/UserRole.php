<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';

    case SUPERVISOR = 'supervisor';

    case QC_AUDITOR = 'qc_auditor';

    case OPERATOR = 'operator';

    /**
     * Get all enum values.
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get a user-friendly label.
     */
    public function label(): string
    {
        return match ($this) {
            self::ADMIN => 'Administrator',
            self::SUPERVISOR => 'Supervisor',
            self::QC_AUDITOR => 'QC Auditor',
            self::OPERATOR => 'Operator',
        };
    }
}
