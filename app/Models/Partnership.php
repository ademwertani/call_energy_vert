<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'contact_name',
        'email',
        'phone',
        'business_domain',
        'service_type',
        'proposal_description',
    ];
}