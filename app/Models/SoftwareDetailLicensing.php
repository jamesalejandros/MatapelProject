<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareDetailLicensing extends Model
{
    protected $fillable = [

        'LicensingID',

        'LicensePool',

        'ProductFamily',

        'Version',

        'Quantity',

        'Keterangan',

        'LastPrice',

        'LastBuyDate'

    ];

    protected $casts = [

        'LastBuyDate' => 'date'

    ];

    public function software()
    {
        return $this->belongsTo(

            SoftwareMaster::class,

            'LicensingID',

            'LicensingID'

        );
    }
}