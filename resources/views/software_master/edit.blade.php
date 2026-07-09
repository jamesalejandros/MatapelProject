@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">


<!-- Header -->

<div class="bg-gradient-to-r from-amber-600 via-orange-600 to-red-500 shadow-lg">


    <div class="max-w-7xl mx-auto px-6 py-10">


        <div class="flex flex-col md:flex-row justify-between items-center gap-6">


            <div class="flex items-center gap-4 text-white">


                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">


                    <i class="bi bi-pencil-square text-4xl"></i>


                </div>


                <div>


                    <h1 class="text-3xl font-bold">

                        Edit Software Licensing

                    </h1>


                    <p class="text-orange-100 mt-1">

                        Perbarui informasi software licensing perusahaan.

                    </p>


                </div>


            </div>




            <a href="{{ route('software-master.index') }}"

                class="inline-flex items-center gap-2 bg-white text-orange-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-xl hover:scale-105 transition">


                <i class="bi bi-arrow-left"></i>


                Kembali


            </a>


        </div>


    </div>


</div>




<div class="max-w-5xl mx-auto px-6 py-8">



    {{-- Validation Error --}}


    @if($errors->any())


        <div class="bg-red-50 border border-red-200 rounded-2xl p-6 mb-6">


            <div class="flex items-center gap-3 text-red-700">


                <i class="bi bi-exclamation-triangle-fill text-xl"></i>


                <h3 class="font-bold">


                    Terjadi kesalahan validasi


                </h3>


            </div>



            <ul class="mt-4 list-disc list-inside text-sm text-red-600 space-y-1">


                @foreach($errors->all() as $error)


                    <li>


                        {{ $error }}


                    </li>


                @endforeach


            </ul>


        </div>


    @endif





    <!-- Form Card -->


    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">



        <div class="px-8 py-6 border-b border-slate-200">


            <div class="flex items-center gap-3">


                <div class="w-10 h-10 rounded-xl bg-orange-100 flex items-center justify-center">


                    <i class="bi bi-file-earmark-text text-orange-600"></i>


                </div>


                <div>


                    <h2 class="text-xl font-bold text-slate-800">


                        Form Edit Software Licensing


                    </h2>


                    <p class="text-sm text-slate-500">


                        Perbarui data yang diperlukan kemudian simpan perubahan.


                    </p>


                </div>


            </div>


        </div>




        <form

            action="{{ route('software-master.update', $softwareMaster) }}"

            method="POST"

            class="p-8">


            @csrf

            @method('PUT')




            <!-- Row 1 -->


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">



                <!-- Licensing ID -->


                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Licensing ID


                    </label>


                    <input

                        type="text"

                        name="LicensingID"

                        value="{{ old('LicensingID', $softwareMaster->LicensingID) }}"

                        placeholder="Contoh: LIC-2026-001"

                        class="w-full rounded-xl border-slate-300 focus:border-orange-500 focus:ring-orange-500 @error('LicensingID') border-red-500 @enderror">



                    @error('LicensingID')


                        <p class="text-sm text-red-600 mt-2">


                            {{ $message }}


                        </p>


                    @enderror


                </div>




                <!-- Organization -->


                <div>

    <label class="block text-sm font-semibold text-slate-700 mb-2">

        Organization

    </label>

    <select
        name="OrganizationID"
        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('OrganizationID') border-red-500 @enderror">

        @foreach($organizations as $organization)

            <option
                value="{{ $organization->OrganizationID }}"
                {{ old('OrganizationID', $softwareMaster->OrganizationID) == $organization->OrganizationID ? 'selected' : '' }}>

                {{ $organization->Name }}

            </option>

        @endforeach

    </select>

    @error('OrganizationID')

        <p class="text-sm text-red-600 mt-2">

            {{ $message }}

        </p>

    @enderror

</div>


            </div>


            <!-- lanjut Part 2 -->


            <!-- Row 2 -->


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">



                <!-- Vendor -->


                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Vendor


                    </label>


                    <input

                        type="text"

                        name="Vendor"

                        value="{{ old('Vendor', $softwareMaster->Vendor) }}"

                        placeholder="Contoh: Microsoft"

                        class="w-full rounded-xl border-slate-300 focus:border-orange-500 focus:ring-orange-500 @error('Vendor') border-red-500 @enderror">



                    @error('Vendor')


                        <p class="text-sm text-red-600 mt-2">


                            {{ $message }}


                        </p>


                    @enderror


                </div>





                <!-- Parent Program -->


                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Parent Program


                    </label>


                    <input

                        type="text"

                        name="ParentProgram"

                        value="{{ old('ParentProgram', $softwareMaster->ParentProgram) }}"

                        placeholder="Contoh: Microsoft Office"

                        class="w-full rounded-xl border-slate-300 focus:border-orange-500 focus:ring-orange-500 @error('ParentProgram') border-red-500 @enderror">



                    @error('ParentProgram')


                        <p class="text-sm text-red-600 mt-2">


                            {{ $message }}


                        </p>


                    @enderror


                </div>


            </div>





            <!-- Row 3 -->


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">



                <!-- Expired Date -->


                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Expired Date


                    </label>


                    <input

                        type="date"

                        name="EndDate"

                        value="{{ old('EndDate', optional($softwareMaster->EndDate)->format('Y-m-d')) }}"

                        class="w-full rounded-xl border-slate-300 focus:border-orange-500 focus:ring-orange-500 @error('EndDate') border-red-500 @enderror">



                    @error('EndDate')


                        <p class="text-sm text-red-600 mt-2">


                            {{ $message }}


                        </p>


                    @enderror


                </div>





                <!-- Status -->


                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Status


                    </label>



                    <select

                        name="Status"

                        class="w-full rounded-xl border-slate-300 focus:border-orange-500 focus:ring-orange-500 @error('Status') border-red-500 @enderror">



                        <option value="">


                            -- Pilih Status --


                        </option>



                        <option value="Active"

                            {{ old('Status', $softwareMaster->Status) == 'Active' ? 'selected' : '' }}>


                            Active


                        </option>



                        <option value="Expired"

                            {{ old('Status', $softwareMaster->Status) == 'Expired' ? 'selected' : '' }}>


                            Expired


                        </option>



                        <option value="Inactive"

                            {{ old('Status', $softwareMaster->Status) == 'Inactive' ? 'selected' : '' }}>


                            Inactive


                        </option>



                    </select>




                    @error('Status')


                        <p class="text-sm text-red-600 mt-2">


                            {{ $message }}


                        </p>


                    @enderror


                </div>


            </div>





            <!-- Current Data Information -->


            <div class="mt-8 bg-orange-50 border border-orange-100 rounded-xl p-5">


                <div class="flex gap-3">


                    <div class="text-orange-600">


                        <i class="bi bi-info-circle-fill text-xl"></i>


                    </div>


                    <div>


                        <h4 class="font-semibold text-orange-800">


                            Data Saat Ini


                        </h4>


                        <p class="text-sm text-orange-700 mt-1">


                            Perubahan hanya akan diterapkan setelah tombol Update Data ditekan.


                            Pastikan informasi licensing sudah benar.


                        </p>


                    </div>


                </div>


            </div>





            <!-- Buttons -->


            <div class="flex justify-end gap-3 mt-8">


                <button

                    type="reset"

                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">


                    <i class="bi bi-arrow-clockwise"></i>


                    Reset


                </button>





                <button

                    type="submit"

                    class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-orange-600 text-white font-semibold hover:bg-orange-700 shadow-lg hover:shadow-xl transition">


                    <i class="bi bi-save-fill"></i>


                    Update Data


                </button>


            </div>



        </form>


    </div>


</div>


</div>

<!-- lanjut Part 3 -->
<script>

document.addEventListener('DOMContentLoaded', function(){


    const inputs = document.querySelectorAll('input, select');


    inputs.forEach(input => {


        input.addEventListener('focus', function(){


            this.classList.add('ring-2', 'ring-orange-200');


        });



        input.addEventListener('blur', function(){


            this.classList.remove('ring-2', 'ring-orange-200');


        });


    });



});


</script>

@endsection
