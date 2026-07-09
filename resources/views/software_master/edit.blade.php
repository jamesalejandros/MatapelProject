@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    {{-- ================= HEADER ================= --}}

    <div class="bg-gradient-to-r from-amber-600 via-orange-600 to-red-600 shadow-xl">

        <div class="max-w-6xl mx-auto px-6 py-10">

            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                <div class="flex items-center gap-5 text-white">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center shadow-lg">

                        <i class="bi bi-pencil-square text-4xl text-white"></i>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">

                            Edit Software Licensing

                        </h1>

                        <p class="text-orange-100 mt-1">

                            Perbarui informasi Software Master beserta data licensing.

                        </p>

                    </div>

                </div>

                <a href="{{ route('software-master.index') }}"
                   class="inline-flex items-center gap-2 bg-white text-orange-700 font-semibold px-6 py-3 rounded-xl shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-200">

                    <i class="bi bi-arrow-left text-orange-700"></i>

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

                    <div class="w-12 h-12 rounded-2xl bg-orange-100 flex items-center justify-center">

                        <i class="bi bi-file-earmark-text-fill text-orange-600 text-xl"></i>

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">

                            Form Edit Software

                        </h2>

                        <p class="text-slate-500 text-sm mt-1">

                            Perbarui seluruh informasi Software Master kemudian tekan tombol
                            <strong>Update Data</strong> untuk menyimpan perubahan.

                        </p>

                    </div>

                </div>

            </div>

            {{-- FORM --}}

            <form
                action="{{ route('software-master.update', $softwareMaster) }}"
                method="POST"
                class="p-8">

                @csrf
                @method('PUT')

                {{-- ================= ROW 1 ================= --}}

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Licensing ID --}}

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            Licensing ID

                            <span class="text-red-500">*</span>

                        </label>

                        <input
                            type="text"
                            name="LicensingID"
                            value="{{ old('LicensingID', $softwareMaster->LicensingID) }}"
                            placeholder="Contoh : LIC-001"
                            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('LicensingID') border-red-500 @enderror">

                        @error('LicensingID')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    {{-- Organization --}}

                    <div>

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            Organization

                            <span class="text-red-500">*</span>

                        </label>

                        <select
                            name="OrganizationID"
                            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('OrganizationID') border-red-500 @enderror">

                            @foreach($organizations as $organization)

                                <option
                                    value="{{ $organization->OrganizationID }}"
                                    {{ old('OrganizationID', $softwareMaster->OrganizationID) == $organization->OrganizationID ? 'selected' : '' }}>

                                    {{ $organization->Name }}

                                </option>

                            @endforeach

                        </select>

                        @error('OrganizationID')

                            <p class="mt-2 text-sm text-red-600">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                </div>

                {{-- ================= ROW 2 ================= --}}


            {{-- ================= ROW 2 ================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    {{-- Vendor --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Vendor

            <span class="text-red-500">*</span>

        </label>

        <input
            type="text"
            name="Vendor"
            value="{{ old('Vendor', $softwareMaster->Vendor) }}"
            placeholder="Contoh : Microsoft"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('Vendor') border-red-500 @enderror">

        @error('Vendor')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Parent Program --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Parent Program

        </label>

        <input
            type="text"
            name="ParentProgram"
            value="{{ old('ParentProgram', $softwareMaster->ParentProgram) }}"
            placeholder="Contoh : Microsoft Office"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('ParentProgram') border-red-500 @enderror">

        @error('ParentProgram')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>

{{-- ================= ROW 3 ================= --}}

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">

    {{-- Expired Date --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Expired Date

        </label>

        <input
            type="date"
            name="EndDate"
            value="{{ old('EndDate', optional($softwareMaster->EndDate)->format('Y-m-d')) }}"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('EndDate') border-red-500 @enderror">

        @error('EndDate')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

    {{-- Status --}}

    <div>

        <label class="block text-sm font-semibold text-slate-700 mb-2">

            Status

            <span class="text-red-500">*</span>

        </label>

        <select
            name="Status"
            class="w-full rounded-xl border-slate-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 @error('Status') border-red-500 @enderror">

            <option value="">

                -- Pilih Status --

            </option>

            <option value="Active"
                {{ old('Status', $softwareMaster->Status) == 'Active' ? 'selected' : '' }}>

                🟢 Active

            </option>

            <option value="Expired"
                {{ old('Status', $softwareMaster->Status) == 'Expired' ? 'selected' : '' }}>

                🔴 Expired

            </option>

            <option value="Inactive"
                {{ old('Status', $softwareMaster->Status) == 'Inactive' ? 'selected' : '' }}>

                ⚪ Inactive

            </option>

        </select>

        @error('Status')

            <p class="mt-2 text-sm text-red-600">

                {{ $message }}

            </p>

        @enderror

    </div>

</div>

{{-- ================= SUMMARY ================= --}}

<div class="mt-10 rounded-2xl border border-orange-200 bg-gradient-to-r from-orange-50 to-amber-50 p-6">

    <div class="flex items-start gap-4">

        <div class="w-12 h-12 rounded-xl bg-orange-100 flex items-center justify-center flex-shrink-0">

            <i class="bi bi-info-circle-fill text-orange-600 text-xl"></i>

        </div>

        <div class="flex-1">

            <h3 class="text-lg font-bold text-orange-800">

                Informasi Software

            </h3>

            <p class="text-sm text-orange-700 mt-2 leading-7">

                Pastikan seluruh informasi Software Master telah sesuai sebelum
                melakukan proses update. Perubahan Licensing ID dapat
                mempengaruhi relasi terhadap seluruh data
                <strong>Software Detail Licensing</strong> yang terhubung.

            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">

                <div class="rounded-xl bg-white border border-orange-100 p-4">

                    <p class="text-xs uppercase text-slate-500">

                        Licensing ID

                    </p>

                    <h4 class="font-bold text-slate-800 mt-1">

                        {{ $softwareMaster->LicensingID }}

                    </h4>

                </div>

                <div class="rounded-xl bg-white border border-orange-100 p-4">

                    <p class="text-xs uppercase text-slate-500">

                        Vendor

                    </p>

                    <h4 class="font-bold text-slate-800 mt-1">

                        {{ $softwareMaster->Vendor ?: '-' }}

                    </h4>

                </div>

                <div class="rounded-xl bg-white border border-orange-100 p-4">

                    <p class="text-xs uppercase text-slate-500">

                        Organization

                    </p>

                    <h4 class="font-bold text-slate-800 mt-1">

                        {{ $softwareMaster->organization?->Name ?? '-' }}

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
        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-gradient-to-r from-orange-600 to-red-600 text-white font-semibold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-200">

        <i class="bi bi-floppy-fill text-white"></i>

        <span>Update Software</span>

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
    | INPUT ANIMATION
    |--------------------------------------------------------------------------
    */

    document.querySelectorAll('input, select, textarea').forEach(element => {

        element.addEventListener('focus', function () {

            this.classList.add(
                'ring-2',
                'ring-orange-300',
                'border-orange-500'
            );

        });

        element.addEventListener('blur', function () {

            this.classList.remove(
                'ring-2',
                'ring-orange-300',
                'border-orange-500'
            );

        });

    });

    /*
    |--------------------------------------------------------------------------
    | RESET CONFIRMATION
    |--------------------------------------------------------------------------
    */

    const resetButton = document.querySelector('button[type="reset"]');

    if (resetButton) {

        resetButton.addEventListener('click', function(e){

            e.preventDefault();

            Swal.fire({

                title: 'Reset Form?',

                text: 'Seluruh perubahan yang belum disimpan akan dibatalkan.',

                icon: 'question',

                showCancelButton: true,

                confirmButtonColor: '#ea580c',

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

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Update Software?',

            text: 'Pastikan seluruh data sudah benar sebelum disimpan.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ea580c',

            cancelButtonColor: '#64748b',

            confirmButtonText: 'Ya, Update',

            cancelButtonText: 'Batal'

        }).then((result)=>{

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

</script>

@endsection