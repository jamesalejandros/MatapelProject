<?php

namespace App\Http\Controllers;

use App\Models\SoftwareMaster;
use App\Models\SoftwareDetailLicensing;
use App\Models\Organization;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSoftwareMaster = SoftwareMaster::count();

        $totalSoftwareDetail = SoftwareDetailLicensing::count();

        $totalOrganizations = Organization::count();

        return view('dashboard', compact(
            'totalSoftwareMaster',
            'totalSoftwareDetail',
            'totalOrganizations'
        ));
    }
}