<?php

namespace App\Http\Controllers;

use App\Models\SoftwareMaster;
use App\Models\SoftwareDetailLicensing;

class DashboardController extends Controller
{
    public function index()
    {
        $totalSoftwareMaster = SoftwareMaster::count();

        $totalSoftwareDetail = SoftwareDetailLicensing::count();

        return view('dashboard', compact(
            'totalSoftwareMaster',
            'totalSoftwareDetail'
        ));
    }
}