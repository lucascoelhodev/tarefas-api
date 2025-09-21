<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Task extends Authenticatable
{
    use SoftDeletes, HasFactory;

    protected $table = 'tasks';
    protected $fillable = [
        'titulo',
        'descricao',
        'status',
    ];
}
