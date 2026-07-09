<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareMaster extends Model
{
    protected $table = 'software_masters';

    protected $primaryKey = 'LicensingID';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [

        'LicensingID',
        'OrganizationID',
        'EndDate',
        'Status',
        'ParentProgram',
        'Vendor',

    ];

    protected $casts = [

        'EndDate' => 'date',

    ];

    public function organization()
    {
        return $this->belongsTo(

            Organization::class,

            'OrganizationID',

            'OrganizationID'

        );
    }

    public function details()
    {
        return $this->hasMany(

            SoftwareDetailLicensing::class,

            'LicensingID',

            'LicensingID'

        );
    }

    public function getRouteKeyName()
    {
        return 'LicensingID';
    }
}