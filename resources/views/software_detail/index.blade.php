@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-slate-100">

        {{-- ================= HEADER ================= --}}

        <div class="bg-gradient-to-r from-indigo-700 via-blue-700 to-cyan-600 shadow-xl">

            <div class="max-w-7xl mx-auto px-6 py-10">

                <div class="flex flex-col xl:flex-row justify-between items-center gap-6">

                    <div class="flex items-center gap-5 text-white">

                        <div
                            class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center shadow-lg">

                            <i class="bi bi-list-check text-4xl"></i>

                        </div>

                        <div>

                            <h1 class="text-3xl font-bold">

                                Software Detail Licensing

                            </h1>

                            <p class="text-cyan-100 mt-1">

                                Cari, filter, dan kelola seluruh detail licensing software perusahaan.

                            </p>

                        </div>

                    </div>

                    <div class="flex items-center gap-3">

                        <a href="{{ route('software-master.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white text-indigo-700 font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">

                            <i class="bi bi-arrow-left-circle-fill"></i>

                            Kembali ke Software Master

                        </a>


                        <a href="{{ route('software-detail.export') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-green-500 text-white font-semibold shadow hover:bg-green-600 transition">

                            <i class="bi bi-file-earmark-excel-fill"></i>

                            Export Excel

                        </a>

                    </div>

                </div>

            </div>

        </div>

        <div class="max-w-7xl mx-auto px-6 py-8">

            {{-- ================= DASHBOARD ================= --}}

            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-5 gap-6 mb-8">

                {{-- Total Detail --}}
                <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-slate-500">

                                Total Detail

                            </p>

                            <h2 class="text-4xl font-bold text-slate-800 mt-2">

                                {{ $details->total() }}

                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-cyan-100 flex items-center justify-center">

                            <i class="bi bi-list-check text-3xl text-cyan-700"></i>

                        </div>

                    </div>

                </div>

                {{-- Product Family --}}
                <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-slate-500">

                                Product Family

                            </p>

                            <h2 class="text-4xl font-bold text-indigo-700 mt-2">

                                {{ $pageProductFamilies->count() }}

                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center">

                            <i class="bi bi-box-seam text-3xl text-indigo-700"></i>

                        </div>

                    </div>

                </div>

                {{-- Version --}}
                <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-slate-500">

                                Version

                            </p>

                            <h2 class="text-4xl font-bold text-emerald-700 mt-2">

                                {{ $pageVersions->count() }}

                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-emerald-100 flex items-center justify-center">

                            <i class="bi bi-layers text-3xl text-emerald-700"></i>

                        </div>

                    </div>

                </div>

                {{-- License Pool --}}
                <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-slate-500">

                                License Pool

                            </p>

                            <h2 class="text-4xl font-bold text-amber-600 mt-2">

                                {{ $pageLicensePools->count() }}

                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-amber-100 flex items-center justify-center">

                            <i class="bi bi-collection text-3xl text-amber-600"></i>

                        </div>

                    </div>

                </div>

                {{-- Total Quantity --}}
                <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

                    <div class="flex justify-between items-center">

                        <div>

                            <p class="text-slate-500">
                                Total Quantity
                            </p>

                            <h2 class="text-4xl font-bold text-rose-600 mt-2">
                                {{ number_format($totalQuantity) }}
                            </h2>

                        </div>

                        <div class="w-16 h-16 rounded-2xl bg-rose-100 flex items-center justify-center">

                            <i class="bi bi-boxes text-3xl text-rose-600"></i>

                        </div>

                    </div>

                </div>

            </div>

            {{-- ================= SEARCH & FILTER ================= --}}

            <div class="bg-white rounded-2xl shadow border border-slate-200 p-6 mb-8">

                <form action="{{ route('software-detail.index') }}" method="GET">

                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-4">

                        {{-- Search --}}
                        <div class="lg:col-span-12 relative">

                            <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                            <input type="text" name="search" value="{{ request('search') }}"
                                placeholder="Cari Licensing ID, Product Family, Version, License Pool atau Keterangan..."
                                class="w-full rounded-xl border-slate-300 pl-11 py-3 focus:ring-indigo-500 focus:border-indigo-500">

                        </div>

                        {{-- Product Family --}}
                        <div class="lg:col-span-4">

                            <label class="block text-sm font-semibold text-slate-600 mb-2">

                                Product Family

                            </label>

                            <select name="ProductFamily[]" multiple id="ProductFamily"
                                class="select2 w-full rounded-xl border-slate-300">

                                <option value="">Semua Product Family</option>

                                @foreach($productFamilies as $family)

                                    <option value="{{ $family }}" @selected(in_array($family, request('ProductFamily', [])))>

                                        {{ $family }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- Version --}}
                        <div class="lg:col-span-4">

                            <label class="block text-sm font-semibold text-slate-600 mb-2">

                                Version

                            </label>

                            <select name="Version[]" multiple id="Version"
                                class="select2 w-full rounded-xl border-slate-300">

                                <option value="">Semua Version</option>

                                @foreach($versions as $version)

                                    <option value="{{ $version }}" @selected(in_array($version, request('Version', [])))>

                                        {{ $version }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                        {{-- License Pool --}}
                        <div class="lg:col-span-4">

                            <label class="block text-sm font-semibold text-slate-600 mb-2">

                                License Pool

                            </label>

                            <select name="LicensePool[]" multiple id="LicensePool"
                                class="select2 w-full rounded-xl border-slate-300">

                                <option value="">Semua License Pool</option>

                                @foreach($licensePools as $pool)

                                    <option value="{{ $pool }}" @selected(in_array($pool, request('LicensePool', [])))>

                                        {{ $pool }}

                                    </option>

                                @endforeach

                            </select>

                        </div>

                    </div>

                    <div class="flex flex-col xl:flex-row justify-between items-center mt-6 gap-4">

                        <div>

                            <span
                                class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-cyan-100 text-cyan-700 font-semibold">

                                <i class="bi bi-funnel-fill"></i>

                                {{ $total }} Data Ditemukan

                            </span>

                        </div>

                        <div class="flex gap-3">

                            <a href="{{ route('software-detail.index') }}"
                                class="px-6 py-3 rounded-xl bg-slate-500 hover:bg-slate-600 text-white font-semibold transition">

                                <i class="bi bi-arrow-clockwise me-2"></i>

                                Reset

                            </a>

                            <button type="submit"
                                class="px-8 py-3 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition">

                                <i class="bi bi-search me-2"></i>

                                Search

                            </button>

                        </div>

                    </div>

                </form>

            </div>

            {{-- ================= RESULT TABLE ================= --}}

            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">

                <div
                    class="bg-slate-900 text-white px-6 py-5 flex flex-col lg:flex-row justify-between lg:items-center gap-4">

                    <div>

                        <h2 class="text-2xl font-bold">

                            Detail Licensing Result

                        </h2>

                        <p class="text-slate-300 mt-1">

                            Menampilkan seluruh data detail licensing berdasarkan filter yang dipilih.

                        </p>

                    </div>

                    <div>

                        <span class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-cyan-500 font-semibold">

                            <i class="bi bi-database-fill"></i>

                            {{ $total }} Records

                        </span>

                    </div>

                </div>

                <div class="overflow-x-auto">
                    {{-- ================= TABLE CARD ================= --}}

                    <div class="bg-white rounded-3xl shadow-xl border border-slate-200 overflow-hidden">

                        {{-- TABLE HEADER --}}

                        <div class="px-8 py-6 border-b border-slate-200 bg-gradient-to-r from-purple-50 to-pink-50">

                            <div class="flex flex-col md:flex-row justify-between md:items-center gap-4">

                                <div>

                                    <div class="flex items-center gap-3">

                                        <div
                                            class="w-12 h-12 rounded-xl bg-purple-600 flex items-center justify-center text-white shadow">

                                            <i class="bi bi-key-fill text-2xl"></i>

                                        </div>

                                        <div>

                                            <h2 class="text-2xl font-bold text-slate-800">

                                                Detail Licensing Database

                                            </h2>

                                            <p class="text-sm text-slate-500 mt-1">

                                                Seluruh data detail lisensi software yang terdaftar.

                                            </p>

                                        </div>

                                    </div>

                                </div>


                                <div
                                    class="flex items-center gap-2 px-5 py-3 rounded-xl bg-white border border-purple-200 text-purple-700 font-semibold shadow-sm">

                                    <i class="bi bi-database-fill-check"></i>

                                    {{ $details->total() }} Records

                                </div>


                            </div>

                        </div>


                        {{-- TABLE --}}

                        <div class="overflow-x-auto">

                            <table class="w-max min-w-full text-sm">


                                <thead class="bg-slate-900 text-white">


                                    <tr>


                                        <th class="px-6 py-4 text-center w-16">

                                            No

                                        </th>


                                        <th class="px-6 py-4">

                                            Software

                                        </th>


                                        <th class="px-6 py-4">

                                            License Pool

                                        </th>


                                        <th class="px-6 py-4">

                                            Product Family

                                        </th>


                                        <th class="px-6 py-4">

                                            Version

                                        </th>


                                        <th class="px-6 py-4 text-center">

                                            Quantity

                                        </th>


                                        <th class="px-6 py-4 text-right">

                                            Last Price

                                        </th>


                                        <th class="px-6 py-4">

                                            Last Buy Date

                                        </th>


                                        <th class="px-6 py-4">

                                            Keterangan

                                        </th>


                                        <th class="px-6 py-4 text-center">

                                            Action

                                        </th>


                                    </tr>


                                </thead>



                                <tbody class="divide-y divide-slate-200 bg-white">


                                    @forelse($details as $detail)


                                                                <tr class="hover:bg-purple-50 transition duration-200">


                                                                    {{-- NUMBER --}}

                                                                    <td class="px-6 py-5 text-center font-semibold text-slate-600">


                                                                        {{ $loop->iteration + ($details->currentPage() - 1) * $details->perPage() }}


                                                                    </td>



                                                                    {{-- SOFTWARE --}}

                                                                    <td class="px-6 py-5">


                                                                        <div class="flex flex-col">


                                                                            <span class="font-bold text-slate-800">


                                                                                {{ $detail->software?->LicensingID ?? '-' }}


                                                                            </span>


                                                                            <span class="text-xs text-slate-500 mt-1">


                                                                                {{ $detail->software?->Vendor ?? '-' }}


                                                                            </span>


                                                                        </div>


                                                                    </td>



                                                                    {{-- LICENSE POOL --}}

                                                                    <td class="px-6 py-5 text-slate-700">


                                                                        {{ $detail->LicensePool ?: '-' }}


                                                                    </td>



                                                                    {{-- PRODUCT FAMILY --}}

                                                                    <td class="px-6 py-5 text-slate-700">


                                                                        {{ $detail->ProductFamily ?: '-' }}


                                                                    </td>



                                                                    {{-- VERSION --}}

                                                                    <td class="px-6 py-5">


                                                                        @if($detail->Version)

                                                                            <span
                                                                                class="inline-flex px-3 py-1 rounded-full bg-blue-100 text-blue-700 font-semibold text-xs">


                                                                                {{ $detail->Version }}


                                                                            </span>

                                                                        @else

                                                                            -

                                                                        @endif


                                                                    </td>



                                                                    {{-- QUANTITY --}}

                                                                    <td class="px-6 py-5 text-center">


                                                                        @if($detail->Quantity)

                                                                            <span
                                                                                class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 font-bold">


                                                                                <i class="bi bi-box-seam-fill"></i>


                                                                                {{ $detail->Quantity }}


                                                                            </span>


                                                                        @else

                                                                            -

                                                                        @endif


                                                                    </td>



                                                                    {{-- PRICE --}}

                                                                    <td class="px-6 py-5 text-right font-semibold text-slate-700">


                                                                        {{ $detail->LastPrice
                                        ? 'Rp ' . number_format($detail->LastPrice, 0, ',', '.')
                                        : '-' 
                                                                                                                                                                                                                                                                                                }}


                                                                    </td>



                                                                    {{-- BUY DATE --}}

                                                                    <td class="px-6 py-5 text-slate-700">


                                                                        {{ 
                                                                                                                                                                                                                                                                                                    $detail->LastBuyDate
                                        ? $detail->LastBuyDate->format('d M Y')
                                        : '-' 
                                                                                                                                                                                                                                                                                                }}


                                                                    </td>



                                                                    {{-- DESCRIPTION --}}

                                                                    <td class="px-6 py-5 max-w-xs">


                                                                        <p class="line-clamp-2 text-slate-600">


                                                                            {{ $detail->Keterangan ?: '-' }}


                                                                        </p>


                                                                    </td>



                                                                    {{-- ACTION --}}

                                                                    <td class="px-6 py-5">


                                                                        <div class="flex justify-center gap-2">


                                                                            {{-- VIEW --}}

                                                                            <a href="{{ route('software-detail.show', $detail) }}"
                                                                                class="w-10 h-10 rounded-xl bg-cyan-100 text-cyan-700 hover:bg-cyan-200 flex items-center justify-center transition"
                                                                                title="View Detail">


                                                                                <i class="bi bi-eye-fill"></i>


                                                                            </a>



                                                                            {{-- EDIT --}}

                                                                            <a href="{{ route('software-detail.edit', $detail) }}"
                                                                                class="w-10 h-10 rounded-xl bg-yellow-100 text-yellow-700 hover:bg-yellow-200 flex items-center justify-center transition"
                                                                                title="Edit">


                                                                                <i class="bi bi-pencil-fill"></i>


                                                                            </a>



                                                                            {{-- DELETE --}}

                                                                            <form action="{{ route('software-detail.destroy', $detail) }}" method="POST"
                                                                                class="delete-form">


                                                                                @csrf

                                                                                @method('DELETE')


                                                                                <button type="submit"
                                                                                    class="w-10 h-10 rounded-xl bg-red-100 text-red-700 hover:bg-red-200 flex items-center justify-center transition"
                                                                                    title="Delete">


                                                                                    <i class="bi bi-trash-fill"></i>


                                                                                </button>


                                                                            </form>




                                                                        </div>


                                                                    </td>


                                                                </tr>


                                    @empty


                                        <tr>


                                            <td colspan="10" class="px-8 py-16 text-center">


                                                <div class="flex flex-col items-center">


                                                    <div
                                                        class="w-24 h-24 rounded-full bg-purple-100 flex items-center justify-center mb-6">


                                                        <i class="bi bi-folder-x text-5xl text-purple-500"></i>


                                                    </div>



                                                    <h3 class="text-2xl font-bold text-slate-700">


                                                        Belum Ada Detail Licensing


                                                    </h3>



                                                    <p class="text-slate-500 mt-2 max-w-lg">


                                                        Belum terdapat data detail lisensi.
                                                        Tambahkan detail licensing melalui menu Software Master.


                                                    </p>



                                                </div>


                                            </td>


                                        </tr>


                                    @endforelse


                                </tbody>


                            </table>


                        </div>
                        {{-- ================= PAGINATION ================= --}}

                        @if($details->hasPages())

                            <div class="px-8 py-6 border-t border-slate-200 bg-slate-50">

                                {{ $details->links() }}

                            </div>

                        @endif


                    </div>


                </div>


            </div>



            {{-- ================= SWEET ALERT SUCCESS ================= --}}


            @if(session('success'))

                <script>

                    document.addEventListener('DOMContentLoaded', function () {


                        Swal.fire({

                            icon: 'success',

                            title: 'Berhasil',

                            text: @json(session('success')),

                            timer: 1500,

                            showConfirmButton: false,

                            timerProgressBar: true

                        });


                    });


                </script>

            @endif




            {{-- ================= SWEET ALERT ERROR ================= --}}


            @if(session('error'))

                <script>

                    document.addEventListener('DOMContentLoaded', function () {


                        Swal.fire({

                            icon: 'error',

                            title: 'Gagal',

                            text: @json(session('error')),

                            confirmButtonColor: '#9333ea'

                        });


                    });


                </script>

            @endif




            {{-- ================= DELETE CONFIRMATION ================= --}}


            <script>


                document.querySelectorAll('.delete-form').forEach(form => {


                    form.addEventListener('submit', function (e) {


                        e.preventDefault();



                        Swal.fire({


                            title: 'Hapus Detail Licensing?',


                            text: 'Data yang sudah dihapus tidak dapat dikembalikan.',


                            icon: 'warning',


                            showCancelButton: true,


                            confirmButtonColor: '#dc2626',


                            cancelButtonColor: '#64748b',


                            confirmButtonText: 'Ya, Hapus',


                            cancelButtonText: 'Batal',


                            reverseButtons: true



                        }).then((result) => {


                            if (result.isConfirmed) {


                                form.submit();


                            }


                        });



                    });



                });


            </script>
            @push('scripts')

                <script>

                    new TomSelect("#ProductFamily", {

                        plugins: ['remove_button'],

                        create: false,

                        persist: false,

                        maxItems: null,

                        hideSelected: true

                    });

                    new TomSelect("#Version", {

                        plugins: ['remove_button'],

                        create: false,

                        persist: false,

                        maxItems: null,

                        hideSelected: true

                    });

                    new TomSelect("#LicensePool", {

                        plugins: ['remove_button'],

                        create: false,

                        persist: false,

                        maxItems: null,

                        hideSelected: true

                    });

                </script>

            @endpush


@endsection