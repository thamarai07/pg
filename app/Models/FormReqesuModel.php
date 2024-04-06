<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormReqesuModel extends Model
{
    use HasFactory;
    protected $table = 'table_requestform_pg';
    protected $fillable = [
        'form_request_category',
        'form_request_filed_name',
    ];
}
