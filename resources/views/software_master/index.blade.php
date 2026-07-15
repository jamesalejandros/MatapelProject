@extends('layouts.app')

@section('content')

    <div
    x-data="{ expiredModal:false }"
    class="min-h-screen bg-slate-100">

        <div class="min-h-screen bg-slate-100">

    {{-- ================= HEADER ================= --}}

    <div class="bg-gradient-to-r from-indigo-700 via-blue-700 to-cyan-600 shadow-xl">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                <div class="flex items-center gap-5 text-white">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur-md flex items-center justify-center shadow-lg">

                        <i class="bi bi-pc-display text-4xl"></i>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">

                            Software Licensing Management

                        </h1>

                        <p class="text-blue-100 mt-1">

                            Kelola Software Master beserta seluruh Detail Licensing.

                        </p>

                    </div>

                </div>

                <div class="flex flex-wrap gap-3">

    <a href="{{ route('software-detail.index') }}"
       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-cyan-500 text-white font-semibold shadow-lg hover:bg-cyan-600 transition">

        <i class="bi bi-funnel-fill"></i>

        Detail Search & Filter

    </a>

    <a href="{{ route('software-master.create') }}"
       class="inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-white text-indigo-700 font-semibold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">

        <i class="bi bi-plus-circle-fill"></i>

        Tambah Software

    </a>

    <a href="{{ route('software-master.export') }}"
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

        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-slate-500">

                            Total Software

                        </p>

                        <h2 class="text-4xl font-bold text-slate-800 mt-2">

                            {{ $softwareMasters->total() }}

                        </h2>

                    </div>

                    <div class="w-16 h-16 rounded-2xl bg-blue-100 flex items-center justify-center">

                        <i class="bi bi-pc-display text-3xl text-blue-700"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-2xl shadow border border-slate-200 p-6">

    <div class="flex justify-between items-center">

        <div class="flex-1">

            <p class="text-slate-500 font-medium">
                Status Software
            </p>


            <div class="grid grid-cols-3 gap-4 mt-5">


                {{-- ACTIVE --}}
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-green-100 flex items-center justify-center">

                        <i class="bi bi-check-circle-fill text-green-600 text-xl"></i>

                    </div>

                    <div>

                        <p class="text-xs text-slate-500">
                            Active
                        </p>

                        <p class="text-xl font-bold text-green-600">
                            {{ $activeCount }}
                        </p>

                    </div>

                </div>



                {{-- INACTIVE --}}
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-slate-100 flex items-center justify-center">

                        <i class="bi bi-dash-circle-fill text-slate-600 text-xl"></i>

                    </div>

                    <div>

                        <p class="text-xs text-slate-500">
                            Inactive
                        </p>

                        <p class="text-xl font-bold text-slate-600">
                            {{ $inactiveCount }}
                        </p>

                    </div>

                </div>



                {{-- EXPIRED --}}
                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-red-100 flex items-center justify-center">

                        <i class="bi bi-x-circle-fill text-red-600 text-xl"></i>

                    </div>

                    <div>

                        <p class="text-xs text-slate-500">
                            Expired
                        </p>

                        <p class="text-xl font-bold text-red-600">
                            {{ $expiredCount }}
                        </p>

                    </div>

                </div>


            </div>

        </div>



        {{-- ICON UTAMA --}}
        <div class="ml-6 w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center flex-shrink-0">

            <i class="bi bi-bar-chart-fill text-3xl text-indigo-700"></i>

        </div>


    </div>

</div>

            <div
    @click="expiredModal = true"
    class="cursor-pointer bg-white rounded-2xl shadow border border-red-200 p-6 hover:shadow-lg hover:scale-[1.02] transition">

    <div class="flex justify-between items-center">

        <div>

            <p class="text-slate-500">
                Software Mendekati Expired
            </p>

            <h2 class="text-4xl font-bold text-red-600 mt-2">
                {{ $expiredSoonCount }}
            </h2>

            <p class="text-sm text-slate-500 mt-2">
                Dalam {{ $range }} hari ke depan
            </p>

            <form
                action="{{ route('software-master.index') }}"
                method="GET"
                class="mt-3 flex items-center gap-2"
                @click.stop>

                <input
                    type="hidden"
                    name="search"
                    value="{{ $search }}">

                <input
                    type="number"
                    min="1"
                    name="range"
                    value="{{ $range }}"
                    onchange="this.form.submit()"
                    class="w-16 rounded-lg border-slate-300 text-center text-sm py-1">

                <span class="text-sm text-slate-500">
                    hari
                </span>

            </form>

        </div>

        <div class="w-16 h-16 rounded-2xl bg-red-100 flex items-center justify-center">

            <i class="bi bi-exclamation-triangle-fill text-3xl text-red-600"></i>

        </div>

    </div>

</div>

        </div>

        {{-- ================= SEARCH ================= --}}

        <div class="bg-white rounded-2xl shadow border border-slate-200 p-6 mb-8">

            <form action="{{ route('software-master.index') }}" method="GET">

                <div class="flex flex-col lg:flex-row gap-4">

                    <div class="relative flex-1">

                        <i class="bi bi-search absolute left-4 top-1/2 -translate-y-1/2 text-slate-400"></i>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari Licensing ID, Vendor, Organization atau Parent Program..."
                            class="w-full rounded-xl border-slate-300 pl-11 py-3 focus:ring-indigo-500 focus:border-indigo-500">

                    </div>

                    <button
                        type="submit"
                        class="px-8 py-3 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">

                        <i class="bi bi-search me-2"></i>

                        Search

                    </button>

                </div>

            </form>

        </div>

        {{-- ================= SOFTWARE ================= --}}

        @forelse($softwareMasters as $software)

            <div x-data="{ open: false }"
     x-cloak
     class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden mb-8">

                {{-- HEADER SOFTWARE --}}

                <div class="bg-gradient-to-r from-indigo-600 via-blue-600 to-cyan-600 px-6 py-6 text-white">

                    <div class="flex flex-col xl:flex-row justify-between xl:items-center gap-6">

                        <div class="flex items-center gap-4">

                            <div class="w-14 h-14 rounded-2xl bg-white/20 flex items-center justify-center">

                                <i class="bi bi-pc-display text-3xl"></i>

                            </div>

                            <div>

                                <h2 class="text-2xl font-bold">

                                    {{ $software->LicensingID }}

                                </h2>

                                <p class="text-cyan-100">

                                    {{ $software->Vendor ?: '-' }}

                                </p>

                            </div>

                        </div>

                        <div class="flex flex-wrap gap-3">

    <button
    @click="open = !open"
    class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-slate-700 hover:bg-slate-800 text-white font-semibold shadow-lg transition">

    <span x-text="open ? 'Sembunyikan Detail' : 'Lihat Detail'"></span>

    <i class="bi"
       :class="open ? 'bi-chevron-up' : 'bi-chevron-down'"></i>
</button>
                        {{-- TAMBAH DETAIL --}}
        
    <a href="{{ route('software-detail.create', ['softwareMaster' => $software]) }}"
       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200">

        <i class="bi bi-plus-circle-fill text-white text-lg"></i>

        <span>Tambah Detail</span>

    </a>

    {{-- EDIT SOFTWARE --}}
    <a href="{{ route('software-master.edit', $software) }}"
       class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-yellow-400 hover:bg-yellow-500 text-slate-900 font-semibold shadow-lg hover:shadow-xl transition-all duration-200">

        <i class="bi bi-pencil-fill text-slate-900 text-lg"></i>

        <span>Edit</span>

    </a>

    {{-- DELETE SOFTWARE --}}
    <form
        action="{{ route('software-master.destroy', $software) }}"
        method="POST"
        class="delete-form">

        @csrf
        @method('DELETE')

        <button
            type="submit"
            class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-red-500 hover:bg-red-600 text-white font-semibold shadow-lg hover:shadow-xl transition-all duration-200">

            <i class="bi bi-trash-fill text-white text-lg"></i>

            <span>Delete</span>

        </button>

    </form>

</div>

                    </div>

                </div>

                {{-- ================= INFORMASI SOFTWARE MASTER ================= --}}

<div class="p-6">

    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-5">

        {{-- Organization --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Organization

            </p>

            <h4 class="font-bold text-slate-800 mt-2">

                {{ $software->organization?->Name ?? '-' }}

            </h4>

        </div>

        {{-- Parent Program --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Parent Program

            </p>

            <h4 class="font-bold text-slate-800 mt-2">

                {{ $software->ParentProgram ?: '-' }}

            </h4>

        </div>

        {{-- End Date --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Expired Date

            </p>

            <h4 class="font-bold text-slate-800 mt-2">

                {{ $software->EndDate ? $software->EndDate->format('d M Y') : '-' }}

            </h4>

        </div>

        {{-- Status --}}
        <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5">

            <p class="text-sm text-slate-500">

                Status

            </p>

            <div class="mt-3">

                @switch($software->Status)

                    @case('Active')

                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">

                            <i class="bi bi-check-circle-fill me-2"></i>

                            Active

                        </span>

                        @break

                    @case('Expired')

                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">

                            <i class="bi bi-x-circle-fill me-2"></i>

                            Expired

                        </span>

                        @break

                    @default

                        <span class="inline-flex items-center px-4 py-2 rounded-full bg-slate-200 text-slate-700 font-semibold">

                            <i class="bi bi-dash-circle-fill me-2"></i>

                            Inactive

                        </span>

                @endswitch

            </div>

        </div>

    </div>

</div>
<div
    x-show="open"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 -translate-y-2"
    x-transition:enter-end="opacity-100 translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 translate-y-0"
    x-transition:leave-end="opacity-0 -translate-y-2"
>

{{-- ================= DETAIL HEADER ================= --}}

<div class="bg-slate-900 text-white px-6 py-5 flex flex-col md:flex-row justify-between md:items-center gap-4">

    <div>

        <h3 class="text-xl font-bold">

            Detail Licensing

        </h3>

        <p class="text-slate-300 text-sm mt-1">

            Daftar seluruh detail licensing yang dimiliki software ini.

        </p>

    </div>

    <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-cyan-500 font-semibold">

        <i class="bi bi-list-check"></i>

        {{ $software->details->count() }} Detail

    </span>

</div>

{{-- ================= TABLE ================= --}}

<div class="overflow-x-auto">

    <table class="min-w-full text-sm">

        <thead class="bg-slate-800 text-white">

            <tr>

                <th class="px-5 py-4 text-center w-16">

                    No

                </th>

                <th class="px-5 py-4">

                    License Pool

                </th>

                <th class="px-5 py-4">

                    Product Family

                </th>

                <th class="px-5 py-4">

                    Version

                </th>

                <th class="px-5 py-4 text-center">

                    Qty

                </th>

                <th class="px-5 py-4 text-end">

                    Last Price

                </th>

                <th class="px-5 py-4">

                    Last Buy Date

                </th>

                <th class="px-5 py-4">

                    Keterangan

                </th>

                <th class="px-5 py-4 text-center w-40">

                    Action

                </th>

            </tr>

        </thead>

        <tbody class="divide-y divide-slate-200 bg-white">

            @forelse($software->details as $detail)

                <tr class="hover:bg-slate-50 transition">

                    <td class="px-5 py-4 text-center font-semibold">

                        {{ $loop->iteration }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $detail->LicensePool ?: '-' }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $detail->ProductFamily ?: '-' }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $detail->Version ?: '-' }}

                    </td>

                    <td class="px-5 py-4 text-center font-semibold">

                        {{ $detail->Quantity ?: '-' }}

                    </td>

                    <td class="px-5 py-4 text-end font-medium">

                        {{ $detail->LastPrice ? 'Rp ' . number_format($detail->LastPrice, 0, ',', '.') : '-' }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $detail->LastBuyDate ? $detail->LastBuyDate->format('d M Y') : '-' }}

                    </td>

                    <td class="px-5 py-4">

                        {{ $detail->Keterangan ?: '-' }}

                    </td>

                    <td class="px-5 py-4">

                        <div class="flex justify-center gap-2">

                            {{-- View --}}
                            <a href="{{ route('software-detail.show', $detail) }}"
                               class="w-10 h-10 rounded-xl bg-cyan-100 hover:bg-cyan-200 text-cyan-700 flex items-center justify-center transition"
                               title="View">

                                <i class="bi bi-eye-fill"></i>

                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('software-detail.edit', $detail) }}"
                               class="w-10 h-10 rounded-xl bg-yellow-100 hover:bg-yellow-200 text-yellow-700 flex items-center justify-center transition"
                               title="Edit">

                                <i class="bi bi-pencil-fill"></i>

                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('software-detail.destroy', $detail) }}"
                                  method="POST"
                                  class="delete-detail">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="w-10 h-10 rounded-xl bg-red-100 hover:bg-red-200 text-red-700 flex items-center justify-center transition"
                                    title="Delete">

                                    <i class="bi bi-trash-fill"></i>

                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                                               @empty

                    <tr>

                        <td colspan="9" class="px-6 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-20 h-20 rounded-full bg-slate-100 flex items-center justify-center mb-5">

                                    <i class="bi bi-folder2-open text-5xl text-slate-400"></i>

                                </div>

                                <h4 class="text-xl font-bold text-slate-700">

                                    Belum Ada Detail Licensing

                                </h4>

                                <p class="text-slate-500 mt-2">

                                    Software ini belum memiliki data detail licensing.

                                </p>

                                <a href="{{ route('software-detail.create', ['softwareMaster' => $software]) }}"
                                   class="mt-6 inline-flex items-center gap-2 px-6 py-3 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-semibold transition">

                                    <i class="bi bi-plus-circle-fill"></i>

                                    Tambah Detail Pertama

                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</div>

@empty

<div class="bg-white rounded-3xl shadow-xl p-16 text-center">

    <div class="flex flex-col items-center">

        <div class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center mb-6">

            <i class="bi bi-pc-display-horizontal text-6xl text-slate-400"></i>

        </div>

        <h2 class="text-3xl font-bold text-slate-700">

            Belum Ada Software

        </h2>

        <p class="text-slate-500 mt-3 max-w-xl">

            Data Software Master masih kosong.
            Silakan tambahkan Software terlebih dahulu sebelum menambahkan Detail Licensing.

        </p>

        <a href="{{ route('software-master.create') }}"
           class="mt-8 inline-flex items-center gap-2 px-8 py-4 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold shadow-lg transition">

            <i class="bi bi-plus-circle-fill"></i>

            Tambah Software

        </a>

    </div>

</div>

@endforelse

{{-- ================= PAGINATION ================= --}}

@if($softwareMasters->hasPages())

<div class="mt-10">

    {{ $softwareMasters->links() }}

</div>

@endif

</div>

</div>

{{-- ================= SWEET ALERT ================= --}}

@if(session('success'))

<script>

Swal.fire({

    icon: 'success',

    title: 'Berhasil',

    text: @json(session('success')),

    timer: 1000,

    showConfirmButton: false

});

</script>

@endif

@if($errors->any())

<script>

Swal.fire({

    icon: 'error',

    title: 'Terjadi Kesalahan',

    html: `{!! implode('<br>', $errors->all()) !!}`

});

</script>

@endif

{{-- ================= DELETE SOFTWARE ================= --}}

<script>

document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus Software?',

            text: 'Seluruh detail licensing yang berkaitan juga akan ikut terhapus.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc2626',

            cancelButtonColor: '#64748b',

            confirmButtonText: 'Ya, Hapus',

            cancelButtonText: 'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

</script>

{{-- ================= DELETE DETAIL ================= --}}

<script>

document.querySelectorAll('.delete-detail').forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus Detail Licensing?',

            text: 'Data yang dihapus tidak dapat dikembalikan.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#dc2626',

            cancelButtonColor: '#64748b',

            confirmButtonText: 'Ya, Hapus',

            cancelButtonText: 'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

</script>

<div
    x-show="expiredModal"
    x-transition
    x-cloak
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-6">

    <div
        @click.away="expiredModal=false"
        class="bg-white rounded-2xl shadow-2xl w-full max-w-6xl max-h-[85vh] overflow-hidden">

        <div class="bg-red-600 text-white px-6 py-4 flex justify-between items-center">

            <div>

                <h2 class="text-2xl font-bold">
                    Software Mendekati Expired
                </h2>

                <p class="text-red-100">
                    Dalam {{ $range }} hari ke depan
                </p>

            </div>

            <button
                @click="expiredModal=false"
                class="text-3xl leading-none hover:scale-110 transition">

                &times;

            </button>

        </div>

        <div class="overflow-auto max-h-[70vh]">

            <table class="min-w-full">

                <thead class="bg-slate-100">

                    <tr>

                        <th class="px-4 py-3 text-left">Licensing ID</th>

                        <th class="px-4 py-3 text-left">Organization</th>

                        <th class="px-4 py-3 text-left">Vendor</th>

                        <th class="px-4 py-3 text-left">Expired Date</th>

                        <th class="px-4 py-3 text-center">Sisa Hari</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($expiredSoonList as $software)

                        <tr
    onclick="window.location='{{ route('software-master.edit', $software) }}'"
    class="border-b hover:bg-red-50 hover:cursor-pointer transition">

                            <td class="px-4 py-3 font-semibold text-indigo-600 group-hover:underline">

    {{ $software->LicensingID }}

</td>

                            <td class="px-4 py-3">

                                {{ $software->organization?->Name ?? '-' }}

                            </td>

                            <td class="px-4 py-3">

                                {{ $software->Vendor ?: '-' }}

                            </td>

                            <td class="px-4 py-3">

                                {{ $software->EndDate?->format('d M Y') }}

                            </td>

                            <td class="px-4 py-3 text-center">

                                @php
                                    $days = round(now()->diffInDays($software->EndDate));
                                @endphp

                                @if($days <= 7)

                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 font-semibold">

                                        {{ $days }} Hari

                                    </span>

                                @elseif($days <= 14)

                                    <span class="px-3 py-1 rounded-full bg-orange-100 text-orange-700 font-semibold">

                                        {{ $days }} Hari

                                    </span>

                                @else

                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 font-semibold">

                                        {{ $days }} Hari

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="5"
                                class="text-center py-10 text-slate-500">

                                Tidak ada software yang akan expired
                                dalam {{ $range }} hari.

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>
@endsection