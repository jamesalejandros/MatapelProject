@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-700 via-fuchsia-700 to-pink-600 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                <div class="flex items-center gap-4 text-white">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">
                        <i class="bi bi-building-fill text-4xl"></i>
                    </div>

                    <div>
                        <h1 class="text-3xl font-bold">
                            Data Organization
                        </h1>

                        <p class="text-purple-100 mt-1">
                            Daftar seluruh Organization yang terdaftar di sistem.
                        </p>
                    </div>

                </div>

                <a href="{{ route('organizations.create') }}"
                    class="inline-flex items-center gap-2 bg-white text-purple-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-xl hover:scale-105 transition">

                    <i class="bi bi-plus-circle-fill"></i>

                    Tambah Organization

                </a>

            </div>

        </div>
    </div>

    <div class="max-w-7xl mx-auto px-6 py-8">

        {{-- Success Message --}}
        @if(session('success'))

            <div class="mb-6 bg-green-50 border border-green-200 rounded-2xl p-5">

                <div class="flex items-center gap-3 text-green-700">

                    <i class="bi bi-check-circle-fill text-xl"></i>

                    <span>{{ session('success') }}</span>

                </div>

            </div>

        @endif

        <!-- Table Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">

            <div class="px-8 py-6 border-b border-slate-200">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center">

                        <i class="bi bi-table text-purple-600"></i>

                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-slate-800">
                            Daftar Organization
                        </h2>

                        <p class="text-sm text-slate-500">
                            Kelola data Organization yang tersedia.
                        </p>

                    </div>

                </div>

            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-slate-200">

                    <thead class="bg-slate-50">

                        <tr>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase text-slate-600">
                                ID
                            </th>

                            <th class="px-6 py-4 text-left text-xs font-bold uppercase text-slate-600">
                                Organization
                            </th>

                            <th class="px-6 py-4 text-center text-xs font-bold uppercase text-slate-600">
                                Action
                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($organizations as $organization)

                            <tr class="hover:bg-slate-50 transition">

                                <td class="px-6 py-4 text-slate-700">
                                    {{ $organization->OrganizationID }}
                                </td>

                                <td class="px-6 py-4 font-medium text-slate-800">
                                    {{ $organization->Name }}
                                </td>

                                <td class="px-6 py-4">

                                    <div class="flex justify-center gap-2">

                                        <a href="{{ route('organizations.edit', $organization->OrganizationID) }}"
                                            class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-yellow-400 text-white hover:bg-yellow-500 transition">

                                            <i class="bi bi-pencil-square"></i>

                                            Edit

                                        </a>

                                        <form action="{{ route('organizations.destroy', $organization->OrganizationID) }}"
                                            method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition">

                                                <i class="bi bi-trash-fill"></i>

                                                Delete

                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="3"
                                    class="px-6 py-10 text-center text-slate-500">

                                    <i class="bi bi-inbox text-4xl block mb-2"></i>

                                    Data Organization belum tersedia.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection