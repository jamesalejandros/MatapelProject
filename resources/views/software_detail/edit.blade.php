@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    {{-- ================= HEADER ================= --}}

    <div class="bg-gradient-to-r from-violet-700 via-purple-700 to-fuchsia-600 shadow-xl">

        <div class="max-w-6xl mx-auto px-6 py-10">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                <div class="flex items-center gap-5 text-white">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center shadow-lg">

                        <i class="bi bi-pencil-square text-4xl text-white"></i>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">

                            Edit Detail Licensing

                        </h1>

                        <p class="text-purple-100 mt-1">

                            Perbarui informasi Detail Licensing yang terhubung dengan Software Master.

                        </p>

                    </div>

                </div>

                <a href="{{ route('software-master.index') }}"
                   class="inline-flex items-center gap-2 bg-white text-purple-700 font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">

                    <i class="bi bi-arrow-left text-purple-700"></i>

                    <span>Kembali</span>

                </a>

            </div>

        </div>

    </div>

    <div class="max-w-5xl mx-auto px-6 py-8">

        {{-- ================= VALIDATION ================= --}}

        @if($errors->any())

            <div class="mb-8 rounded-2xl border border-red-200 bg-red-50 p-6 shadow-sm">

                <div class="flex items-center gap-3">

                    <div class="w-12 h-12 rounded-xl bg-red-100 flex items-center justify-center">

                        <i class="bi bi-exclamation-triangle-fill text-red-600 text-xl"></i>

                    </div>

                    <div>

                        <h3 class="font-bold text-red-700">

                            Validasi Gagal

                        </h3>

                        <p class="text-sm text-red-500">

                            Mohon periksa kembali data yang Anda masukkan.

                        </p>

                    </div>

                </div>

                <ul class="mt-5 space-y-2 text-sm text-red-600 list-disc list-inside">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        {{-- ================= FORM CARD ================= --}}

        <div class="bg-white rounded-3xl shadow-xl overflow-hidden border border-slate-200">

            {{-- Card Header --}}

            <div class="px-8 py-6 border-b border-slate-200 bg-slate-50">

                <div class="flex items-center gap-4">

                    <div class="w-12 h-12 rounded-2xl bg-purple-100 flex items-center justify-center">

                        <i class="bi bi-file-earmark-text-fill text-purple-600 text-xl"></i>

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">

                            Form Edit Detail Licensing

                        </h2>

                        <p class="text-slate-500 text-sm mt-1">

                            Perbarui seluruh informasi Detail Licensing kemudian tekan tombol
                            <strong>Update Detail</strong> untuk menyimpan perubahan.

                        </p>

                    </div>

                </div>

            </div>

            {{-- ================= FORM ================= --}}

            <form
                action="{{ route('software-detail.update', $softwareDetail) }}"
                method="POST"
                class="p-8">

                @csrf
                @method('PUT')

                {{-- ================= ROW 1 ================= --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- SOFTWARE --}}

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            Software

                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            name="LicensingID"
                            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('LicensingID') border-red-500 @enderror">

                            @foreach($softwares as $software)

                                <option
                                    value="{{ $software->LicensingID }}"
                                    {{ old('LicensingID', $softwareDetail->LicensingID) == $software->LicensingID ? 'selected' : '' }}>

                                    {{ $software->LicensingID }} — {{ $software->Vendor }}

                                </option>

                            @endforeach

                        </select>

                        @error('LicensingID')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- LICENSING ID (READ ONLY) --}}

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            Licensing ID

                        </label>

                        <input
                            type="text"
                            value="{{ $softwareDetail->LicensingID }}"
                            readonly
                            class="w-full rounded-xl bg-slate-100 border-slate-300 text-slate-600 cursor-not-allowed shadow-sm">

                        <p class="text-xs text-slate-500 mt-2">

                            Licensing ID mengikuti Software Master yang dipilih dan tidak dapat diubah secara manual.

                        </p>

                    </div>

                </div>

                {{-- ================= ROW 2 ================= --}}
                {{-- ================= ROW 2 ================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    {{-- License Pool --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            License Pool

        </label>

        <input
            type="text"
            name="LicensePool"
            value="{{ old('LicensePool', $softwareDetail->LicensePool) }}"
            placeholder="Contoh : Enterprise Pool"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('LicensePool') border-red-500 @enderror">

        @error('LicensePool')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Product Family --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Product Family

        </label>

        <input
            type="text"
            name="ProductFamily"
            value="{{ old('ProductFamily', $softwareDetail->ProductFamily) }}"
            placeholder="Contoh : Microsoft Office"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('ProductFamily') border-red-500 @enderror">

        @error('ProductFamily')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>

{{-- ================= ROW 3 ================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    {{-- Version --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Version

        </label>

        <input
            type="text"
            name="Version"
            value="{{ old('Version', $softwareDetail->Version) }}"
            placeholder="Contoh : 2024 / v16.0"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('Version') border-red-500 @enderror">

        @error('Version')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Quantity --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Quantity

        </label>

        <input
            type="number"
            min="1"
            name="Quantity"
            value="{{ old('Quantity', $softwareDetail->Quantity) }}"
            placeholder="Contoh : 25"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('Quantity') border-red-500 @enderror">

        @error('Quantity')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>

{{-- ================= ROW 4 ================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    {{-- Last Price --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Last Price

        </label>

        <div class="relative">

            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-slate-500 font-semibold">

                Rp

            </span>

            <input
                type="number"
                step="0.01"
                name="LastPrice"
                value="{{ old('LastPrice', $softwareDetail->LastPrice) }}"
                placeholder="1500000"
                class="pl-12 w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('LastPrice') border-red-500 @enderror">

        </div>

        @error('LastPrice')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Last Buy Date --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Last Buy Date

        </label>

        <input
            type="date"
            name="LastBuyDate"
            value="{{ old('LastBuyDate', optional($softwareDetail->LastBuyDate)->format('Y-m-d')) }}"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('LastBuyDate') border-red-500 @enderror">

        @error('LastBuyDate')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>

{{-- ================= KETERANGAN ================= --}}

<div class="mt-8">

    <label class="block text-sm font-semibold text-slate-700 mb-2">

        Keterangan

    </label>

    <textarea
        name="Keterangan"
        rows="5"
        placeholder="Masukkan keterangan tambahan apabila diperlukan..."
        class="w-full rounded-xl border-slate-300 shadow-sm focus:border-purple-500 focus:ring-purple-500 @error('Keterangan') border-red-500 @enderror">{{ old('Keterangan', $softwareDetail->Keterangan) }}</textarea>

    @error('Keterangan')

        <p class="mt-2 text-sm text-red-600">

            {{ $message }}

        </p>

    @enderror

</div>

{{-- ================= SUMMARY ================= --}}

<div class="mt-10 rounded-2xl border border-purple-200 bg-gradient-to-r from-purple-50 via-violet-50 to-fuchsia-50 p-6">

    <div class="flex items-start gap-4">

        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center flex-shrink-0">

            <i class="bi bi-info-circle-fill text-purple-600 text-xl"></i>

        </div>

        <div class="flex-1">

            <h3 class="text-lg font-bold text-purple-800">

                Informasi Detail Licensing

            </h3>

            <p class="text-sm text-purple-700 mt-2 leading-7">

                Pastikan seluruh data telah benar sebelum melakukan proses update.
                Detail Licensing ini terhubung langsung dengan Software Master berdasarkan
                <strong>Licensing ID</strong> yang dipilih.

            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

                <div class="rounded-xl bg-white border border-purple-100 p-4">

                    <p class="text-xs uppercase text-slate-500">

                        Licensing ID

                    </p>

                    <h4 class="font-bold text-slate-800 mt-1">

                        {{ $softwareDetail->LicensingID }}

                    </h4>

                </div>

                <div class="rounded-xl bg-white border border-purple-100 p-4">

                    <p class="text-xs uppercase text-slate-500">

                        Product Family

                    </p>

                    <h4 class="font-bold text-slate-800 mt-1">

                        {{ $softwareDetail->ProductFamily ?: '-' }}

                    </h4>

                </div>

                <div class="rounded-xl bg-white border border-purple-100 p-4">

                    <p class="text-xs uppercase text-slate-500">

                        Quantity

                    </p>

                    <h4 class="font-bold text-slate-800 mt-1">

                        {{ $softwareDetail->Quantity ?: '-' }}

                    </h4>

                </div>

            </div>

        </div>

    </div>

</div>

{{-- ================= ACTION BUTTON ================= --}}
<div class="mt-10 flex flex-col sm:flex-row justify-end gap-4">

    {{-- RESET --}}
    <button
        type="reset"
        class="inline-flex items-center justify-center gap-2 px-6 py-3 rounded-xl border border-slate-300 bg-white text-slate-700 font-semibold shadow-sm hover:bg-slate-100 hover:shadow transition-all duration-200">

        <i class="bi bi-arrow-clockwise text-slate-700"></i>

        <span>Reset</span>

    </button>

    {{-- UPDATE --}}
    <button
        type="submit"
        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-gradient-to-r from-violet-600 via-purple-600 to-fuchsia-600 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200">

        <i class="bi bi-floppy-fill text-white"></i>

        <span>Update Detail</span>

    </button>

</div>

</form>

</div>

</div>

{{-- ================= JAVASCRIPT ================= --}}

<script>

document.addEventListener('DOMContentLoaded', () => {

    /*
    |--------------------------------------------------------------------------
    | INPUT EFFECT
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('input, select, textarea').forEach(input => {

        input.addEventListener('focus', function(){

            this.classList.add(
                'ring-2',
                'ring-purple-300',
                'border-purple-500'
            );

        });

        input.addEventListener('blur', function(){

            this.classList.remove(
                'ring-2',
                'ring-purple-300',
                'border-purple-500'
            );

        });

    });

    /*
    |--------------------------------------------------------------------------
    | RESET CONFIRMATION
    |--------------------------------------------------------------------------
    */

    const resetButton = document.querySelector('button[type="reset"]');

    if(resetButton){

        resetButton.addEventListener('click', function(e){

            e.preventDefault();

            Swal.fire({

                title: 'Reset Form?',

                text: 'Seluruh perubahan yang belum disimpan akan dibatalkan.',

                icon: 'question',

                showCancelButton: true,

                confirmButtonColor: '#7c3aed',

                cancelButtonColor: '#64748b',

                confirmButtonText: 'Ya, Reset',

                cancelButtonText: 'Batal'

            }).then((result)=>{

                if(result.isConfirmed){

                    document.querySelector('form').reset();

                }

            });

        });

    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE CONFIRMATION
    |--------------------------------------------------------------------------
    */

    const form = document.querySelector('form');

    if(form){

        form.addEventListener('submit', function(e){

            e.preventDefault();

            Swal.fire({

                title: 'Update Detail Licensing?',

                text: 'Pastikan seluruh data sudah benar sebelum disimpan.',

                icon: 'warning',

                showCancelButton: true,

                confirmButtonColor: '#7c3aed',

                cancelButtonColor: '#64748b',

                confirmButtonText: 'Ya, Update',

                cancelButtonText: 'Batal'

            }).then((result)=>{

                if(result.isConfirmed){

                    form.submit();

                }

            });

        });

    }

});

</script>

@endsection