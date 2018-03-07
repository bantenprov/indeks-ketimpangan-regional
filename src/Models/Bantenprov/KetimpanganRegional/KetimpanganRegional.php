<?php

namespace Bantenprov\KetimpanganRegional\Models\Bantenprov\KetimpanganRegional;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KetimpanganRegional extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'ketimpangan_regionals';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
    ];
}
