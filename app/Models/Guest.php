<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;
    protected $table = 'guests';

    public function bank()
    {
        return $this->belongsTo(BankData::class, 'bank_id', 'id');
    }

    public function jobInfo()
    {
        return $this->belongsTo(JobInfo::class, 'job_info_id', 'id');
    }

    public function documents()
    {
        return $this->belongsTo(Document::class, 'documents_id', 'id');
    }
}
