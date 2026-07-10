@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-slate-100">

        <!-- Header -->

        <div class="bg-gradient-to-r from-indigo-700 via-blue-700 to-cyan-600 shadow-lg">

            <div class="max-w-5xl mx-auto px-6 py-10">

                <div class="flex flex-col lg:flex-row justify-between items-center gap-6">

                    <div class="flex items-center gap-4 text-white">

                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                            <i class="bi bi-plus-circle-fill text-4xl"></i>

                        </div>

                        <div>

                            <h1 class="text-3xl font-bold">

                                Tambah Software Licensing

                            </h1>

                            <p class="text-blue-100 mt-1">

                                Tambahkan Software Master baru ke dalam sistem.

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

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">

                <div class="px-8 py-6 border-b border-slate-200">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl bg-blue-100 flex items-center justify-center">

                            <i class="bi bi-file-earmark-plus text-blue-600"></i>

                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-slate-800">

                                Form Software Master

                            </h2>

                            <p class="text-sm text-slate-500">

                                Licensing ID akan menjadi Primary Key dari Software.

                            </p>

                        </div>

                    </div>

                </div>

                <form action="{{ route('software-master.store') }}" method="POST" class="p-8">

                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">

                        {{-- Licensing ID --}}

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Licensing ID
                                <span class="text-red-500">*</span>

                            </label>

                            <input type="text" name="LicensingID" value="{{ old('LicensingID') }}" required
                                placeholder="Contoh : LIC-M365-001"
                                class="w-full rounded-xl border-slate-300 focus:ring-blue-500 focus:border-blue-500 @error('LicensingID') border-red-500 @enderror">

                            <p class="text-xs text-slate-500 mt-2">

                                Licensing ID harus unik dan tidak boleh sama dengan software lain.

                            </p>

                            @error('LicensingID')

                                <p class="text-red-600 text-sm mt-2">

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

                            <select name="OrganizationID" required
                                class="w-full rounded-xl border-slate-300 focus:ring-blue-500 focus:border-blue-500 @error('OrganizationID') border-red-500 @enderror">

                                <option value="">

                                    -- Pilih Organization --

                                </option>

                                @foreach($organizations as $organization)

                                    <option value="{{ $organization->OrganizationID }}"
                                        @selected(old('OrganizationID') == $organization->OrganizationID)>
                                        {{ $organization->Name }}
                                    </option>


                                @endforeach

                            </select>

                            @error('OrganizationID')

                                <p class="text-red-600 text-sm mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- lanjut Part 2 -->
                    <!-- Form Row 2 -->

                    <div class="grid md:grid-cols-2 gap-6 mt-6">

                        {{-- Vendor --}}

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Vendor

                            </label>

                            <input type="text" name="Vendor" list="vendorList" value="{{ old('Vendor') }}"
                                placeholder="Contoh : Microsoft"
                                class="w-full rounded-xl border-slate-300 focus:ring-blue-500 focus:border-blue-500 @error('Vendor') border-red-500 @enderror">


                            <datalist id="vendorList">

                                @foreach($vendors as $vendor)

                                    <option value="{{ $vendor }}"></option>

                                @endforeach

                            </datalist>


                            @error('Vendor')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>


                        {{-- Parent Program --}}

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Parent Program

                            </label>

                            <input type="text" name="ParentProgram" list="parentProgramList"
                                value="{{ old('ParentProgram') }}" placeholder="Contoh : Microsoft Office"
                                class="w-full rounded-xl border-slate-300 focus:ring-blue-500 focus:border-blue-500 @error('ParentProgram') border-red-500 @enderror">


                            <datalist id="parentProgramList">

                                @foreach($parentPrograms as $program)

                                    <option value="{{ $program }}"></option>

                                @endforeach

                            </datalist>


                            @error('ParentProgram')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>
                    </div>


                    <!-- Form Row 3 -->

                    <div class="grid md:grid-cols-2 gap-6 mt-6">

                        {{-- End Date --}}

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Expired Date

                            </label>

                            <input type="date" name="EndDate" value="{{ old('EndDate') }}"
                                class="w-full rounded-xl border-slate-300 focus:ring-blue-500 focus:border-blue-500 @error('EndDate') border-red-500 @enderror">

                            @error('EndDate')

                                <p class="text-sm text-red-600 mt-2">

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

                            <!-- Ditampilkan ke user -->
                            <input type="text" value="Active" readonly
                                class="w-full rounded-xl border-slate-300 bg-gray-100 cursor-not-allowed">

                            <!-- Nilai yang dikirim ke server -->
                            <input type="hidden" name="Status" value="Active">

                            @error('Status')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>


                    {{-- Information Box --}}

                    <div class="mt-8 rounded-2xl border border-blue-200 bg-blue-50 p-6">

                        <div class="flex items-start gap-4">

                            <div class="text-blue-600 text-2xl">

                                <i class="bi bi-info-circle-fill"></i>

                            </div>

                            <div>

                                <h3 class="font-bold text-blue-800">

                                    Informasi Penting

                                </h3>

                                <ul class="mt-3 text-sm text-blue-700 space-y-2 list-disc list-inside">

                                    <li>Licensing ID merupakan Primary Key Software.</li>

                                    <li>Licensing ID harus unik.</li>

                                    <li>Setelah Software dibuat, seluruh Detail Licensing akan menggunakan Licensing ID ini.
                                    </li>

                                    <li>Pastikan Organization yang dipilih sudah benar.</li>

                                    <li>Jika Licensing ID berubah, seluruh Detail Licensing juga akan ikut terpengaruh.</li>

                                </ul>

                            </div>

                        </div>

                    </div>


                    {{-- Button --}}

                    <div class="flex justify-end gap-3 mt-8">

                        <a href="{{ route('software-master.index') }}"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-slate-300 bg-white text-slate-700 hover:bg-slate-100 transition">

                            <i class="bi bi-arrow-left"></i>

                            Kembali

                        </a>

                        <button type="reset"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-slate-300 text-slate-700 hover:bg-slate-100 transition">

                            <i class="bi bi-arrow-clockwise"></i>

                            Reset

                        </button>

                        <button type="submit"
                            class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-blue-600 text-white hover:bg-blue-700 font-semibold shadow-lg transition">

                            <i class="bi bi-check-circle-fill"></i>

                            Simpan Software

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <script>

        document.addEventListener('DOMContentLoaded', function () {

            document.querySelectorAll('input,select').forEach(function (el) {

                el.addEventListener('focus', function () {

                    this.classList.add('ring-2', 'ring-indigo-200');

                });

                el.addEventListener('blur', function () {

                    this.classList.remove('ring-2', 'ring-indigo-200');

                });

            });

        });

    </script>

@endsection