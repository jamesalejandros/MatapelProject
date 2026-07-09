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
    // public function index(Request $request)
    // {
    //     $search = trim($request->input('search'));

    //     $details = SoftwareDetailLicensing::with('software')
    //         ->when($search, function ($query) use ($search) {

    //             $query->where(function ($q) use ($search) {

    //                 $q->where('LicensingID', 'LIKE', "%{$search}%")
    //                     ->orWhere('LicensePool', 'LIKE', "%{$search}%")
    //                     ->orWhere('ProductFamily', 'LIKE', "%{$search}%")
    //                     ->orWhere('Version', 'LIKE', "%{$search}%")
    //                     ->orWhere('Quantity', 'LIKE', "%{$search}%")
    //                     ->orWhereHas('software', function ($software) use ($search) {

    //                         $software->where('LicensingID', 'LIKE', "%{$search}%")
    //                                  ->orWhere('Vendor', 'LIKE', "%{$search}%")
    //                                  ->orWhere('ParentProgram', 'LIKE', "%{$search}%");

    //                     });

    //             });

    //         })
    //         ->latest()
    //         ->paginate(10)
    //         ->withQueryString();

    //     return view('software_detail.index', [
    //         'details' => $details,
    //         'search'  => $search,
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SoftwareMaster $softwareMaster)
    {
        $softwares = SoftwareMaster::orderBy('LicensingID')->get();

        return view('software_detail.create', [
            'softwares'            => $softwares,
            'selectedLicensingID'  => $softwareMaster->LicensingID,
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
            'LicensingID.exists'   => 'Software tidak ditemukan.',

            'Quantity.integer'     => 'Quantity harus berupa angka.',
            'Quantity.min'         => 'Quantity minimal 1.',

            'LastBuyDate.date'     => 'Format tanggal tidak valid.',

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

        return view(
            'software_detail.edit',
            compact(
                'softwareDetail',
                'softwares'
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
            'LicensingID.exists'   => 'Software tidak ditemukan.',

            'Quantity.integer'     => 'Quantity harus berupa angka.',
            'Quantity.min'         => 'Quantity minimal 1.',

            'LastBuyDate.date'     => 'Format tanggal tidak valid.',

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