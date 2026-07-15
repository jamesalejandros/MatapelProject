<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();

        return view('organization.index', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('organization.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required|max:150'
        ]);

        Organization::create([
            'Name' => $request->Name
        ]);

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organization = Organization::findOrFail($id);

        return view('organization.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Name' => 'required|max:150'
        ]);

        $organization = Organization::findOrFail($id);

        $organization->update([
            'Name' => $request->Name
        ]);

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $organization = Organization::findOrFail($id);

        $organization->delete();

        return redirect()
            ->route('organizations.index')
            ->with('success', 'Organization berhasil dihapus.');
    }
}