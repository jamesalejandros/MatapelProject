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
        $search = trim($request->input('search'));

        $range = (int) $request->input('range', 30);

        if ($range < 1) {
            $range = 30;
        }

        $softwareMasters = SoftwareMaster::with([
            'organization',
            'details'
        ])
            ->when($search, function ($query) use ($search) {

    $statusSearch = strtolower(trim($search));

    $query->where(function ($q) use ($search, $statusSearch) {

        $q->where('LicensingID', 'LIKE', "%{$search}%")
            ->orWhere('Vendor', 'LIKE', "%{$search}%")
            ->orWhere('ParentProgram', 'LIKE', "%{$search}%");

        // Search Status (harus exact match)
        if (in_array($statusSearch, ['active', 'expired'])) {
            $q->orWhere('Status', ucfirst($statusSearch));
        } elseif (in_array($statusSearch, ['inactive', 'non active'])) {
            $q->orWhere('Status', 'Non Active');
        }

        $q->orWhereHas('organization', function ($org) use ($search) {
            $org->where('Name', 'LIKE', "%{$search}%");
        });

    });

})

            ->latest()
            ->paginate(10)
            ->withQueryString();

        $expiredSoonQuery = SoftwareMaster::with('organization')
            ->whereNotNull('EndDate')
            ->whereDate('EndDate', '>=', now()->toDateString())
            ->whereDate('EndDate', '<=', now()->copy()->addDays($range)->toDateString())
            ->orderBy('EndDate');

        $expiredSoonCount = (clone $expiredSoonQuery)->count();

        $expiredSoonList = (clone $expiredSoonQuery)->get();

        return view('software_master.index', [

            'softwareMasters' => $softwareMasters,
            'search' => $search,
            'range' => $range,
            'expiredSoonCount' => $expiredSoonCount,
            'expiredSoonList' => $expiredSoonList,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizations = Organization::orderBy('Name')->get();


        $vendors = SoftwareMaster::whereNotNull('Vendor')
            ->where('Vendor', '!=', '')
            ->distinct()
            ->orderBy('Vendor')
            ->pluck('Vendor');


        $parentPrograms = SoftwareMaster::whereNotNull('ParentProgram')
            ->where('ParentProgram', '!=', '')
            ->distinct()
            ->orderBy('ParentProgram')
            ->pluck('ParentProgram');


        return view(
            'software_master.create',
            compact(
                'organizations',
                'vendors',
                'parentPrograms'
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([

            'LicensingID' => [

                'required',
                'string',
                'max:50',
                'unique:software_masters,LicensingID'

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

            'LicensingID.required' => 'Licensing ID wajib diisi.',
            'LicensingID.unique' => 'Licensing ID sudah digunakan.',

            'OrganizationID.required' => 'Organization wajib dipilih.',
            'OrganizationID.exists' => 'Organization tidak ditemukan.',

            'Status.required' => 'Status wajib dipilih.',
            'Status.in' => 'Status tidak valid.',

            'EndDate.date' => 'Format tanggal tidak valid.',

        ]);

        SoftwareMaster::create($validated);

        return redirect()
            ->route('software-master.index')
            ->with(
                'success',
                'Data software licensing berhasil ditambahkan.'
            );
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


        $vendors = SoftwareMaster::whereNotNull('Vendor')
            ->where('Vendor', '!=', '')
            ->distinct()
            ->orderBy('Vendor')
            ->pluck('Vendor');


        $parentPrograms = SoftwareMaster::whereNotNull('ParentProgram')
            ->where('ParentProgram', '!=', '')
            ->distinct()
            ->orderBy('ParentProgram')
            ->pluck('ParentProgram');


        return view(
            'software_master.edit',
            compact(
                'softwareMaster',
                'organizations',
                'vendors',
                'parentPrograms'
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

                'required',
                'string',
                'max:50',

                Rule::unique('software_masters', 'LicensingID')
                    ->ignore(
                        $softwareMaster->LicensingID,
                        'LicensingID'
                    ),

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

            'LicensingID.required' => 'Licensing ID wajib diisi.',
            'LicensingID.unique' => 'Licensing ID sudah digunakan.',

            'OrganizationID.required' => 'Organization wajib dipilih.',
            'OrganizationID.exists' => 'Organization tidak ditemukan.',

            'Status.required' => 'Status wajib dipilih.',
            'Status.in' => 'Status tidak valid.',

            'EndDate.date' => 'Format tanggal tidak valid.',

        ]);

        $softwareMaster->update($validated);

        return redirect()
            ->route('software-master.index')
            ->with(
                'success',
                'Data software licensing berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(SoftwareMaster $softwareMaster)
    {
        $softwareMaster->delete();

        return redirect()
            ->route('software-master.index')
            ->with(
                'success',
                'Software Master beserta seluruh detail licensing berhasil dihapus.'
            );
    }
}