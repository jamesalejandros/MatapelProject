@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-700 via-fuchsia-700 to-pink-600 shadow-lg">

        <div class="max-w-5xl mx-auto px-6 py-10">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                <div class="flex items-center gap-4 text-white">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                        <i class="bi bi-pencil-square text-4xl"></i>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">
                            Edit Organization
                        </h1>

                        <p class="text-purple-100 mt-1">
                            Perbarui informasi Organization yang telah terdaftar di dalam sistem.
                        </p>

                    </div>

                </div>

                <a href="{{ route('organizations.index') }}"
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

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">

            <div class="px-8 py-6 border-b border-slate-200">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-purple-100 flex items-center justify-center">

                        <i class="bi bi-pencil-fill text-purple-600"></i>

                    </div>

                    <div>

                        <h2 class="text-xl font-bold text-slate-800">
                            Form Edit Organization
                        </h2>

                        <p class="text-sm text-slate-500">
                            Ubah informasi Organization sesuai kebutuhan.
                        </p>

                    </div>

                </div>

            </div>

            <form action="{{ route('organizations.update', $organization->OrganizationID) }}"
                  method="POST"
                  class="p-8">

                @csrf
                @method('PUT')

                <div>

                    <label class="block text-sm font-semibold text-slate-700 mb-2">
                        Nama Organization
                    </label>

                    <input
                        type="text"
                        name="Name"
                        value="{{ old('Name', $organization->Name) }}"
                        placeholder="Contoh : PT ABC Indonesia"
                        required
                        class="w-full rounded-xl border-slate-300 focus:border-purple-500 focus:ring-purple-500 @error('Name') border-red-500 @enderror">

                    @error('Name')

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
                                Pastikan perubahan nama Organization sudah benar sebelum menyimpan pembaruan data.
                            </p>

                        </div>

                    </div>

                </div>

                <!-- Button -->

                <div class="flex justify-end gap-3 mt-8">

                    <a href="{{ route('organizations.index') }}"
                        class="inline-flex items-center gap-2 px-6 py-3 rounded-xl border border-slate-300 text-slate-600 font-semibold hover:bg-slate-100 transition">

                        <i class="bi bi-x-circle"></i>

                        Batal

                    </a>

                    <button
                        type="submit"
                        class="inline-flex items-center gap-2 px-8 py-3 rounded-xl bg-purple-600 text-white font-semibold hover:bg-purple-700 shadow-lg hover:shadow-xl transition">

                        <i class="bi bi-check-circle-fill"></i>

                        Update

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

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