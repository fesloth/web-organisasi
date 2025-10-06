<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Program extends Model
{
    use HasFactory;

    protected $table = 'programs';

    protected $fillable = [
        'nama',
        'deskripsi',
        'penanggung_jawab',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
        'progress',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    // accessor: menghitung durasi program (opsional)
    public function getDurasiAttribute()
    {
        if ($this->tanggal_mulai && $this->tanggal_selesai) {
            return $this->tanggal_mulai->diffInDays($this->tanggal_selesai) + 1;
        }
        return null;
    }

    // accessor: status warna (opsional untuk frontend)
    public function getStatusColorAttribute()
    {
        return match($this->status) {
            'Berlangsung' => 'bg-emerald-500 text-white',
            'Belum' => 'bg-gray-400 text-white',
            'Selesai' => 'bg-lime-600 text-white',
            default => 'bg-gray-300 text-black',
        };
    }
}
