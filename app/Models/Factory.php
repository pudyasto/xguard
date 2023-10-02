<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Factory extends Model
{
    use HasFactory;
    use Notifiable, SoftDeletes;
    use Uuid;
    //
    protected $table = 'factory';

    protected $primaryKey = 'uuid';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'kode',
        'kode_ref',
        'nama',
        'keterangan',
        
        'alamat',
        'kota',
        'lat_long',

        'is_active',
    ];

    protected $hidden = [];

    public static function booted()
    {
        // run parent
        parent::boot();

        static::creating(function ($data) {
            $data->created_by = (isset(Auth::user()->uuid)) ? Auth::user()->uuid : null;
        });

        static::updating(function ($data) {
            $data->updated_by = (isset(Auth::user()->uuid)) ? Auth::user()->uuid : null;
        });

        // add in custom deleting
        static::deleting(function ($data) {
            $data->where('uuid', $data->uuid)->update([
                'deleted_by' => (isset(Auth::user()->uuid)) ? Auth::user()->uuid : null,
            ]);
        });
    }
}
