<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class TonVinh extends Model
{
    protected $table = 'tonvinh';
    protected $primaryKey = 'Id';
    protected $fillable = [
        'thoigian',
    ];
    /*public $Id;
    public $TenDonVi;
    public $created_at;
    public $updated_at;*/
}


