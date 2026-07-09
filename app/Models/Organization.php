<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    /**
     * Nama tabel
     */
    protected $table = 'organizations';

    /**
     * Primary Key
     */
    protected $primaryKey = 'OrganizationID';

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'Name',

    ];

    /**
     * Relasi
     * Satu Organization memiliki banyak Software
     */
    public function softwareMasters()
    {
        return $this->hasMany(
            SoftwareMaster::class,
            'OrganizationID',
            'OrganizationID'
        );
    }
}