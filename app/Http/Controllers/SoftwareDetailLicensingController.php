<?php

namespace App\Http\Controllers;

use App\Models\SoftwareDetailLicensing;
use App\Models\SoftwareMaster;
use Illuminate\Http\Request;

class SoftwareDetailLicensingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = trim($request->search);

        $productFamilies = $request->input('ProductFamily', []);

        $versions = $request->input('Version', []);

        $licensePools = $request->input('LicensePool', []);

        $query = SoftwareDetailLicensing::with('software');

        if ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('LicensingID', 'LIKE', "%{$search}%")
                    ->orWhere('ProductFamily', 'LIKE', "%{$search}%")
                    ->orWhere('Version', 'LIKE', "%{$search}%")
                    ->orWhere('LicensePool', 'LIKE', "%{$search}%")
                    ->orWhere('Keterangan', 'LIKE', "%{$search}%");

            });

        }

        if (!empty($productFamilies)) {
            $query->whereIn('ProductFamily', $productFamilies);
        }

        if (!empty($versions)) {
            $query->whereIn('Version', $versions);
        }

        if (!empty($licensePools)) {
            $query->whereIn('LicensePool', $licensePools);
        }

        /*
    |--------------------------------------------------------------------------
    | TOTAL RECORD
    |--------------------------------------------------------------------------
    */

        $total = (clone $query)->count();

        /*
        |--------------------------------------------------------------------------
        | TOTAL QUANTITY (FILTERED)
        |--------------------------------------------------------------------------
        */

        $totalQuantity = (clone $query)->sum('Quantity');

        /*
        |--------------------------------------------------------------------------
        | PAGINATION
        |--------------------------------------------------------------------------
        */

        $details = $query
            ->latest('created_at')
            ->paginate(25)
            ->withQueryString();

        return view('software_detail.index', [

            'details' => $details,

            'search' => $search,

            'total' => $total,

            'totalQuantity' => $totalQuantity,


            'productFamilies' => SoftwareDetailLicensing::select('ProductFamily')
                ->whereNotNull('ProductFamily')
                ->distinct()
                ->orderBy('ProductFamily')
                ->pluck('ProductFamily'),

            'versions' => SoftwareDetailLicensing::select('Version')
                ->whereNotNull('Version')
                ->distinct()
                ->orderBy('Version')
                ->pluck('Version'),

            'licensePools' => SoftwareDetailLicensing::select('LicensePool')
                ->whereNotNull('LicensePool')
                ->distinct()
                ->orderBy('LicensePool')
                ->pluck('LicensePool'),

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SoftwareMaster $softwareMaster)
    {
        $softwares = SoftwareMaster::orderBy('LicensingID')->get();


        $licensePools = SoftwareDetailLicensing::whereNotNull('LicensePool')
            ->where('LicensePool', '!=', '')
            ->distinct()
            ->orderBy('LicensePool')
            ->pluck('LicensePool');


        $productFamilies = SoftwareDetailLicensing::whereNotNull('ProductFamily')
            ->where('ProductFamily', '!=', '')
            ->distinct()
            ->orderBy('ProductFamily')
            ->pluck('ProductFamily');


        return view('software_detail.create', [

            'softwares' => $softwares,

            'selectedLicensingID' => $softwareMaster->LicensingID,

            'licensePools' => $licensePools,

            'productFamilies' => $productFamilies,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SoftwareMaster $softwareMaster)
    {
        $validated = $request->validate([

            'LicensingID' => [
                'required',
                'exists:software_masters,LicensingID'
            ],

            'LicensePool' => [
                'nullable',
                'string',
                'max:255'
            ],

            'ProductFamily' => [
                'nullable',
                'string',
                'max:255'
            ],

            'Version' => [
                'nullable',
                'string',
                'max:255'
            ],

            'Quantity' => [
                'nullable',
                'integer',
                'min:1'
            ],

            'Keterangan' => [
                'nullable',
                'string'
            ],

            'LastPrice' => [
                'nullable',
                'numeric'
            ],

            'LastBuyDate' => [
                'nullable',
                'date'
            ],

        ], [

            'LicensingID.required' => 'Software wajib dipilih.',
            'LicensingID.exists' => 'Software tidak ditemukan.',

            'Quantity.integer' => 'Quantity harus berupa angka.',
            'Quantity.min' => 'Quantity minimal 1.',

            'LastBuyDate.date' => 'Format tanggal tidak valid.',

        ]);

        /*
        |--------------------------------------------------------------------------
        | Pastikan LicensingID mengikuti Software Master yang dipilih dari route
        |--------------------------------------------------------------------------
        */

        $validated['LicensingID'] = $softwareMaster->LicensingID;

        SoftwareDetailLicensing::create($validated);

        return redirect()
            ->route('software-master.index', $softwareMaster)
            ->with(
                'success',
                'Detail licensing berhasil ditambahkan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(SoftwareDetailLicensing $softwareDetail)
    {
        $softwareDetail->load('software');

        return view(
            'software_detail.show',
            compact('softwareDetail')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoftwareDetailLicensing $softwareDetail)
    {
        $softwares = SoftwareMaster::orderBy('LicensingID')->get();


        $licensePools = SoftwareDetailLicensing::whereNotNull('LicensePool')
            ->where('LicensePool', '!=', '')
            ->distinct()
            ->orderBy('LicensePool')
            ->pluck('LicensePool');


        $productFamilies = SoftwareDetailLicensing::whereNotNull('ProductFamily')
            ->where('ProductFamily', '!=', '')
            ->distinct()
            ->orderBy('ProductFamily')
            ->pluck('ProductFamily');


        return view(
            'software_detail.edit',
            compact(
                'softwareDetail',
                'softwares',
                'licensePools',
                'productFamilies'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoftwareDetailLicensing $softwareDetail)
    {
        $validated = $request->validate([

            'LicensingID' => [
                'required',
                'exists:software_masters,LicensingID'
            ],

            'LicensePool' => [
                'nullable',
                'string',
                'max:255'
            ],

            'ProductFamily' => [
                'nullable',
                'string',
                'max:255'
            ],

            'Version' => [
                'nullable',
                'string',
                'max:255'
            ],

            'Quantity' => [
                'nullable',
                'integer',
                'min:1'
            ],

            'Keterangan' => [
                'nullable',
                'string'
            ],

            'LastPrice' => [
                'nullable',
                'numeric'
            ],

            'LastBuyDate' => [
                'nullable',
                'date'
            ],

        ], [

            'LicensingID.required' => 'Software wajib dipilih.',
            'LicensingID.exists' => 'Software tidak ditemukan.',

            'Quantity.integer' => 'Quantity harus berupa angka.',
            'Quantity.min' => 'Quantity minimal 1.',

            'LastBuyDate.date' => 'Format tanggal tidak valid.',

        ]);

        $softwareDetail->update($validated);

        return redirect()
            ->route('software-master.index')
            ->with(
                'success',
                'Detail licensing berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftwareDetailLicensing $softwareDetail)
    {
        $softwareDetail->delete();

        return redirect()
            ->route('software-master.index')
            ->with(
                'success',
                'Detail licensing berhasil dihapus.'
            );
    }
}