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
        $search = $request->search;

        $details = SoftwareDetailLicensing::with('software')
            ->when($search, function ($query) use ($search) {
                $query->where('LicensingID', 'like', "%{$search}%")
                    ->orWhere('LicensePool', 'like', "%{$search}%")
                    ->orWhere('ProductFamily', 'like', "%{$search}%")
                    ->orWhere('Version', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('software_detail.index', compact('details', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $softwares = SoftwareMaster::orderBy('LicensingID')->get();

        return view('software_detail.create', compact('softwares'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'SoftID' => 'required|exists:software_masters,SoftID',
            'LicensingID' => 'nullable|max:50',
            'LicensePool' => 'nullable|max:255',
            'ProductFamily' => 'nullable|max:255',
            'Version' => 'nullable|max:255',
            'Quantity' => 'nullable|integer|min:1',
            'Keterangan' => 'nullable',
            'LastPrice' => 'nullable|numeric',
            'LastBuyDate' => 'nullable|date',
        ]);

        SoftwareDetailLicensing::create($validated);

        return redirect()
            ->route('software-detail.index')
            ->with('success', 'Detail licensing berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SoftwareDetailLicensing $softwareDetail)
    {
        $softwareDetail->load('software');

        return view('software_detail.show', compact('softwareDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoftwareDetailLicensing $softwareDetail)
    {
        $softwares = SoftwareMaster::orderBy('LicensingID')->get();

        return view('software_detail.edit', compact('softwareDetail', 'softwares'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoftwareDetailLicensing $softwareDetail)
    {
        $validated = $request->validate([
            'SoftID' => 'required|exists:software_masters,SoftID',
            'LicensingID' => 'nullable|max:50',
            'LicensePool' => 'nullable|max:255',
            'ProductFamily' => 'nullable|max:255',
            'Version' => 'nullable|max:255',
            'Quantity' => 'nullable|integer|min:1',
            'Keterangan' => 'nullable',
            'LastPrice' => 'nullable|numeric',
            'LastBuyDate' => 'nullable|date',
        ]);

        $softwareDetail->update($validated);

        return redirect()
            ->route('software-detail.index')
            ->with('success', 'Detail licensing berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftwareDetailLicensing $softwareDetail)
    {
        $softwareDetail->delete();

        return redirect()
            ->route('software-detail.index')
            ->with('success', 'Detail licensing berhasil dihapus.');
    }
}