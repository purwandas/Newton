<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Filters\QueryFilters;

class ListOrder extends Model
{
    use SoftDeletes;
            
    protected $fillable = [
        'tipe_pelanggan', 'nama_perusahaan', 'alamat_perusahaan', 'penanggung_jawab', 'jabatan_penanggung_jawab', 'nip_penanggung_jawab', 'hp_penanggung_jawab', 'telp', 'email', 'jenis_server', 'ukuran_server', 'id_paket', 'status', 'jangka_waktu', 'rencana_pemasangan', 'installasi', 'service', 'rencana_survei', 'pembayaran', 'status_survei', 'kode_pos', 'provinsi', 'id_user', 'id_operating_system', 'status_survei_user', 'survei_file'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /* Metode tambahan untuk model Branch Sport. */

    /**
     * Relation Method(s).
     *
     */

    public function paket()
    {
        return $this->belongsTo('App\Packet', 'id_paket');
    }

    public function bandwidth()
    {
        return $this->belongsTo('App\Bandwidth', 'id_bandwidth');
    }

    /**
     * Filtering Berdasarakan Request User
     * @param $query
     * @param QueryFilters $filters
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilter($query, QueryFilters $filters)
    {
        return $filters->apply($query);
    }
}
