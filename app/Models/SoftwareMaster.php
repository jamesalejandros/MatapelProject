<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareMaster extends Model
{
    /**
     * Nama tabel (opsional karena Laravel sudah mengenali software_masters)
     */
    protected $table = 'software_masters';

    /**
     * Primary Key
     */
    protected $primaryKey = 'SoftID';

    /**
     * Mass Assignment
     */
    protected $fillable = [

        'LicensingID',
        'OrganizationID',
        'EndDate',
        'Status',
        'ParentProgram',
        'Vendor',

    ];

    /**
     * Cast Attribute
     */
    protected $casts = [

        'EndDate' => 'date',

    ];

    /**
     * Relasi ke Organization
     * Satu Software dimiliki oleh satu Organization
     */
    public function organization()
    {
        return $this->belongsTo(
            Organization::class,
            'OrganizationID',
            'OrganizationID'
        );
    }

    /**
     * Relasi ke Detail Licensing
     * Satu Software memiliki banyak Detail Licensing
     */
    public function details()
    {
        return $this->hasMany(
            SoftwareDetailLicensing::class,
            'SoftID',
            'SoftID'
        );
    }

    /**
     * Route Model Binding
     */
    public function getRouteKeyName()
    {
        return 'SoftID';
    }
}