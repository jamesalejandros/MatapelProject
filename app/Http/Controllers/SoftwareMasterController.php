<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\SoftwareMaster;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SoftwareMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil keyword pencarian
        $search = trim($request->input('search'));

        // Query data Software Master beserta relasi Organization
        $softwareMasters = SoftwareMaster::with('organization')
            ->when($search, function ($query) use ($search) {

                $query->where(function ($q) use ($search) {

                    $q->where('LicensingID', 'LIKE', "%{$search}%")
                        ->orWhere('Vendor', 'LIKE', "%{$search}%")
                        ->orWhere('ParentProgram', 'LIKE', "%{$search}%")
                        ->orWhere('Status', 'LIKE', "%{$search}%")
                        ->orWhereHas('organization', function ($org) use ($search) {

                            $org->where('Name', 'LIKE', "%{$search}%");

                        });

                });

            })
            ->latest('SoftID')
            ->paginate(10)
            ->withQueryString();

        return view('software_master.index', [
            'softwareMasters' => $softwareMasters,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::orderBy('Name')->get();

        return view(
            'software_master.create',
            compact('organizations')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'LicensingID' => [
                'nullable',
                'string',
                'max:50'
            ],

            'OrganizationID' => [
                'required',
                'exists:organizations,OrganizationID'
            ],

            'EndDate' => [
                'nullable',
                'date'
            ],

            'Status' => [
                'required',
                Rule::in([
                    'Active',
                    'Expired',
                    'Inactive'
                ])
            ],

            'ParentProgram' => [
                'nullable',
                'string',
                'max:255'
            ],

            'Vendor' => [
                'nullable',
                'string',
                'max:255'
            ],

        ], [

            'OrganizationID.required' => 'Organization wajib dipilih.',
            'OrganizationID.exists' => 'Organization tidak ditemukan.',
            'Status.required' => 'Status wajib dipilih.',
            'Status.in' => 'Status tidak valid.',
            'EndDate.date' => 'Format tanggal tidak valid.',

        ]);

        SoftwareMaster::create($validated);

        return redirect()
            ->route('software-master.index')
            ->with('success', 'Data software licensing berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SoftwareMaster $softwareMaster)
    {
        $softwareMaster->load([
            'organization',
            'details'
        ]);

        return view(
            'software_master.show',
            compact('softwareMaster')
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SoftwareMaster $softwareMaster)
    {
        $organizations = Organization::orderBy('Name')->get();

        return view(
            'software_master.edit',
            compact(
                'softwareMaster',
                'organizations'
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SoftwareMaster $softwareMaster)
    {
        $validated = $request->validate([

            'LicensingID' => [
                'nullable',
                'string',
                'max:50'
            ],

            'OrganizationID' => [
                'required',
                'exists:organizations,OrganizationID'
            ],

            'EndDate' => [
                'nullable',
                'date'
            ],

            'Status' => [
                'required',
                Rule::in([
                    'Active',
                    'Expired',
                    'Inactive'
                ])
            ],

            'ParentProgram' => [
                'nullable',
                'string',
                'max:255'
            ],

            'Vendor' => [
                'nullable',
                'string',
                'max:255'
            ],

        ], [

            'OrganizationID.required' => 'Organization wajib dipilih.',
            'OrganizationID.exists' => 'Organization tidak ditemukan.',
            'Status.required' => 'Status wajib dipilih.',
            'Status.in' => 'Status tidak valid.',
            'EndDate.date' => 'Format tanggal tidak valid.',

        ]);

        $softwareMaster->update($validated);

        return redirect()
            ->route('software-master.index')
            ->with('success', 'Data software licensing berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SoftwareMaster $softwareMaster)
    {
        if ($softwareMaster->details()->exists()) {

            return redirect()
                ->route('software-master.index')
                ->with(
                    'error',
                    'Data tidak dapat dihapus karena masih memiliki detail lisensi.'
                );
        }

        $softwareMaster->delete();

        return redirect()
            ->route('software-master.index')
            ->with('success', 'Data software licensing berhasil dihapus.');
    }
}