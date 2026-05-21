<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionPayment extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'student_id',
        'admission_id',
        'user_id',
        'amount',
        'paid_at',
        'payment_method',
        'status',
        'receipt_number',
        'note',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function admission()
    {
        return $this->belongsTo(Admission::class);
    }

    public function collectedBy()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}