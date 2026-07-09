@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">


<!-- Header -->

<div class="bg-gradient-to-r from-indigo-700 via-blue-700 to-cyan-600 shadow-lg">


    <div class="max-w-7xl mx-auto px-6 py-10">


        <div class="flex flex-col md:flex-row justify-between items-center gap-6">


            <div class="flex items-center gap-4 text-white">


                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">


                    <i class="bi bi-plus-circle-fill text-4xl"></i>


                </div>


                <div>


                    <h1 class="text-3xl font-bold">

                        Tambah Software Licensing

                    </h1>


                    <p class="text-blue-100 mt-1">

                        Tambahkan data software licensing baru ke sistem.

                    </p>


                </div>


            </div>



            <a href="{{ route('software-master.index') }}"

                class="inline-flex items-center gap-2 bg-white text-blue-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-xl hover:scale-105 transition">


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


                <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">


                    <i class="bi bi-file-earmark-plus text-blue-600"></i>


                </div>


                <div>


                    <h2 class="text-xl font-bold text-slate-800">

                        Form Software Licensing

                    </h2>


                    <p class="text-sm text-slate-500">

                        Isi informasi software licensing perusahaan.

                    </p>


                </div>


            </div>


        </div>



        <form

            action="{{ route('software-master.store') }}"

            method="POST"

            class="p-8">


            @csrf



            <!-- Form Row 1 -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <!-- Licensing ID -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Licensing ID


                    </label>


                    <input

                        type="text"

                        name="LicensingID"

                        value="{{ old('LicensingID') }}"

                        placeholder="Contoh: LIC-2026-001"

                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('LicensingID') border-red-500 @enderror">


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
        <span class="text-red-500">*</span>

    </label>

    <select

        name="OrganizationID"

        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('OrganizationID') border-red-500 @enderror">

        <option value="">

            -- Pilih Organization --

        </option>

        @foreach($organizations as $organization)

            <option

                value="{{ $organization->OrganizationID }}"

                {{ old('OrganizationID') == $organization->OrganizationID ? 'selected' : '' }}>

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


            <!-- lanjut Part 2 -->


            <!-- Form Row 2 -->

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">


                <!-- Vendor -->

                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Vendor


                    </label>


                    <input

                        type="text"

                        name="Vendor"

                        value="{{ old('Vendor') }}"

                        placeholder="Contoh: Microsoft"

                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('Vendor') border-red-500 @enderror">



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

                        value="{{ old('ParentProgram') }}"

                        placeholder="Contoh: Microsoft Office"

                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('ParentProgram') border-red-500 @enderror">



                    @error('ParentProgram')


                        <p class="text-sm text-red-600 mt-2">


                            {{ $message }}


                        </p>


                    @enderror


                </div>


            </div>





            <!-- Form Row 3 -->


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">



                <!-- Expired Date -->


                <div>


                    <label class="block text-sm font-semibold text-slate-700 mb-2">


                        Expired Date


                    </label>


                    <input

                        type="date"

                        name="EndDate"

                        value="{{ old('EndDate') }}"

                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('EndDate') border-red-500 @enderror">



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

                        class="w-full rounded-xl border-slate-300 focus:border-blue-500 focus:ring-blue-500 @error('Status') border-red-500 @enderror">



                        <option value="">


                            -- Pilih Status --


                        </option>



                        <option value="Active"

                            {{ old('Status') == 'Active' ? 'selected' : '' }}>


                            Active


                        </option>



                        <option value="Expired"

                            {{ old('Status') == 'Expired' ? 'selected' : '' }}>


                            Expired


                        </option>



                        <option value="Inactive"

                            {{ old('Status') == 'Inactive' ? 'selected' : '' }}>


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





            <!-- Information Box -->


            <div class="mt-8 bg-blue-50 border border-blue-100 rounded-xl p-5">


                <div class="flex gap-3">


                    <div class="text-blue-600">


                        <i class="bi bi-info-circle-fill text-xl"></i>


                    </div>



                    <div>


                        <h4 class="font-semibold text-blue-800">


                            Informasi


                        </h4>


                        <p class="text-sm text-blue-700 mt-1">


                            Pastikan Organization dipilih sesuai dengan software yang akan didaftarkan.


                        </p>


                    </div>


                </div>


            </div>





            <!-- Button -->

            <div class="flex justify-end gap-3 mt-8">


                <button

                    type="reset"

                    class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">


                    <i class="bi bi-arrow-clockwise"></i>


                    Reset


                </button>





                <button

                    type="submit"

                    class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-blue-600 text-white font-semibold hover:bg-blue-700 shadow-lg hover:shadow-xl transition">


                    <i class="bi bi-check-circle-fill"></i>


                    Simpan


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


            this.classList.add('ring-2', 'ring-blue-200');


        });


        input.addEventListener('blur', function(){


            this.classList.remove('ring-2', 'ring-blue-200');


        });


    });



});


</script>

@endsection
