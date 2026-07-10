@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-slate-100">

        <!-- Header -->

        <div class="bg-gradient-to-r from-purple-700 via-fuchsia-700 to-pink-600 shadow-lg">

            <div class="max-w-5xl mx-auto px-6 py-10">

                <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                    <div class="flex items-center gap-4 text-white">

                        <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                            <i class="bi bi-key-fill text-4xl"></i>

                        </div>

                        <div>

                            <h1 class="text-3xl font-bold">

                                Tambah Detail Licensing

                            </h1>

                            <p class="text-purple-100 mt-1">

                                Tambahkan detail lisensi software ke dalam sistem.

                            </p>

                        </div>

                    </div>

                    <a href="{{ route('software-master.index') }}"
                        class="inline-flex items-center gap-2 bg-white text-purple-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-xl hover:scale-105 transition">

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

                        <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center">

                            <i class="bi bi-file-earmark-plus text-purple-600"></i>

                        </div>

                        <div>

                            <h2 class="text-xl font-bold text-slate-800">

                                Form Detail Licensing

                            </h2>

                            <p class="text-sm text-slate-500">

                                Lengkapi informasi detail lisensi software.

                            </p>

                        </div>

                    </div>

                </div>

                <form action="{{ route('software-detail.store', ['softwareMaster' => $selectedLicensingID]) }}"
                    method="POST" class="p-8">

                    @csrf

                    <!-- Form Row 1 -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                        <!-- Software -->



                        <!-- Licensing ID -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Licensing ID

                            </label>

                            <input type="text" value="{{ $selectedLicensingID }}" readonly
                                class="w-full rounded-xl bg-slate-100 border-slate-300 text-slate-600 cursor-not-allowed">

                            <input type="hidden" name="LicensingID" value="{{ $selectedLicensingID }}">

                            <p class="text-sm text-slate-500 mt-2">

                                Licensing ID dipilih otomatis berdasarkan Software Master yang sedang dibuka.

                            </p>

                            @error('LicensingID')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- Form Row 2 -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                        <!-- License Pool -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                License Pool

                            </label>

                            <input type="text" name="LicensePool" list="licensePoolList" value="{{ old('LicensePool') }}"
                                placeholder="Contoh : Enterprise Pool"
                                class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('LicensePool') border-red-500 @enderror">


                            <datalist id="licensePoolList">

                                @foreach($licensePools as $pool)

                                    <option value="{{ $pool }}"></option>

                                @endforeach

                            </datalist>
                            @error('LicensePool')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Product Family -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Product Family

                            </label>

                            <input type="text" name="ProductFamily" list="productFamilyList"
                                value="{{ old('ProductFamily') }}" placeholder="Contoh : Microsoft Office"
                                class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('ProductFamily') border-red-500 @enderror">


                            <datalist id="productFamilyList">

                                @foreach($productFamilies as $family)

                                    <option value="{{ $family }}"></option>

                                @endforeach

                            </datalist>
                            @error('ProductFamily')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- lanjut Part 2 -->


                    <!-- Form Row 3 -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                        <!-- Version -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Version

                            </label>

                            <input type="text" name="Version" value="{{ old('Version') }}"
                                placeholder="Contoh : 2024 / v16.0"
                                class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('Version') border-red-500 @enderror">

                            @error('Version')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Quantity -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Quantity

                            </label>

                            <input type="number" name="Quantity" min="1" value="{{ old('Quantity') }}"
                                placeholder="Contoh : 25"
                                class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('Quantity') border-red-500 @enderror">

                            @error('Quantity')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- Form Row 4 -->

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                        <!-- Last Price -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Last Price

                            </label>

                            <input type="number" step="0.01" name="LastPrice" value="{{ old('LastPrice') }}"
                                placeholder="Contoh : 1500000"
                                class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('LastPrice') border-red-500 @enderror">

                            @error('LastPrice')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                        <!-- Last Buy Date -->

                        <div>

                            <label class="block text-sm font-semibold text-slate-700 mb-2">

                                Last Buy Date

                            </label>

                            <input type="date" name="LastBuyDate" value="{{ old('LastBuyDate') }}"
                                class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('LastBuyDate') border-red-500 @enderror">

                            @error('LastBuyDate')

                                <p class="text-sm text-red-600 mt-2">

                                    {{ $message }}

                                </p>

                            @enderror

                        </div>

                    </div>

                    <!-- Keterangan -->

                    <div class="mt-6">

                        <label class="block text-sm font-semibold text-slate-700 mb-2">

                            Keterangan

                        </label>

                        <textarea name="Keterangan" rows="5"
                            placeholder="Masukkan keterangan tambahan apabila diperlukan..."
                            class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('Keterangan') border-red-500 @enderror">{{ old('Keterangan') }}</textarea>

                        @error('Keterangan')

                            <p class="text-sm text-red-600 mt-2">

                                {{ $message }}

                            </p>

                        @enderror

                    </div>

                    <!-- Information Box -->

                    <div class="mt-8 bg-purple-50 border border-purple-100 rounded-xl p-5">

                        <div class="flex gap-3">

                            <div class="text-purple-600">

                                <i class="bi bi-info-circle-fill text-xl"></i>

                            </div>

                            <div>

                                <h4 class="font-semibold text-purple-800">

                                    Informasi

                                </h4>

                                <p class="text-sm text-purple-700 mt-1">

                                    Pastikan Software yang dipilih sudah terdaftar pada menu Software Master sebelum
                                    menambahkan detail licensing.

                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Button -->

                    <div class="flex justify-end gap-3 mt-8">

                        <button type="reset"
                            class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">

                            <i class="bi bi-arrow-clockwise"></i>

                            Reset

                        </button>

                        <button type="submit"
                            class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 shadow-lg hover:shadow-xl transition">

                            <i class="bi bi-check-circle-fill"></i>

                            Simpan Detail

                        </button>

                    </div>

                </form>

            </div>

        </div>

    </div>

    <!-- lanjut Part 3 -->

    id="mkd92a"
    <script>

        document.addEventListener('DOMContentLoaded', function () {

            const inputs = document.querySelectorAll('input, select, textarea');

            inputs.forEach(input => {

                input.addEventListener('focus', function () {

                    this.classList.add('ring-2', 'ring-purple-200');

                });

                input.addEventListener('blur', function () {

                    this.classList.remove('ring-2', 'ring-purple-200');

                });

            });

        });

    </script>

@endsection