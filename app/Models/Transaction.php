<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['enrollment_id', 'invoice_number', 'amount', 'payment_status', 'payment_method', 'gateway', 'gateway_ref', 'paid_at'])]
class Transaction extends Model
{
    use HasFactory, HasUuids;

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'paid_at' => 'datetime',
        ];
    }

    public function enrollment(): BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function markAsPaid(string $gatewayRef): void
    {
        $this->update([
            'payment_status' => 'paid',
            'gateway_ref' => $gatewayRef,
            'paid_at' => now(),
        ]);
        $this->enrollment->update(['status' => 'active']);
    }
}
