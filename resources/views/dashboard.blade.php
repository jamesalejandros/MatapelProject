@extends('layouts.app')

@section('content')

    <div class="min-h-screen bg-slate-100">

        ```
        <!-- Hero -->
        <div class="bg-gradient-to-r from-indigo-700 via-blue-700 to-cyan-600 text-white shadow-lg">

            <div class="max-w-7xl mx-auto px-8 py-10">

                <div class="flex flex-col lg:flex-row justify-between items-center">

                    <div>

                        <h1 class="text-4xl font-bold">
                            Software Licensing Management System
                        </h1>

                        <p class="mt-3 text-blue-100 text-lg">
                            PT. Mata Pelangi Chemindo
                        </p>

                    </div>

                    <div class="mt-6 lg:mt-0">

                        <div class="bg-white/20 backdrop-blur rounded-xl px-6 py-4">

                            <p class="text-sm opacity-90">
                                Login sebagai
                            </p>

                            <h2 class="text-xl font-bold">
                                {{ Auth::user()->name }}
                            </h2>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="max-w-7xl mx-auto px-8 py-8">

            <!-- Welcome -->

            <div class="bg-white rounded-2xl shadow-md p-8 mb-8">

                <div class="flex items-center">

                    <div class="w-16 h-16 rounded-full bg-green-100 flex items-center justify-center">

                        <i class="bi bi-person-check-fill text-3xl text-green-600"></i>

                    </div>

                    <div class="ml-5">

                        <h2 class="text-2xl font-bold text-slate-800">

                            Selamat Datang,
                            {{ Auth::user()->name }}

                        </h2>

                        <p class="text-slate-500 mt-2">

                            Anda berhasil login ke aplikasi Software Licensing Management System.

                            Silakan pilih modul untuk mulai mengelola data lisensi software perusahaan.

                        </p>

                    </div>

                </div>

            </div>

            <!-- Statistics -->

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                <div class="bg-white rounded-2xl shadow-md p-6">

                    <div class="flex justify-between">

                        <div>

                            <p class="text-slate-500">
                                Software Master
                            </p>

                            <h2 class="text-4xl font-bold mt-2 text-blue-600">

                                {{ number_format($totalSoftwareMaster) }}

                            </h2>

                        </div>

                        <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">

                            <i class="bi bi-pc-display text-blue-600 text-2xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow-md p-6">

                    <div class="flex justify-between">

                        <div>

                            <p class="text-slate-500">
                                Detail Licensing
                            </p>

                            <h2 class="text-4xl font-bold mt-2 text-emerald-600">

                                {{ number_format($totalSoftwareDetail) }}

                            </h2>

                        </div>

                        <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center">

                            <i class="bi bi-list-check text-emerald-600 text-2xl"></i>

                        </div>

                    </div>

                </div>

                <div class="bg-white rounded-2xl shadow-md p-6">

                    <div class="flex justify-between">

                        <div>

                            <p class="text-slate-500">
                                Status Sistem
                            </p>

                            <h2 class="text-2xl font-bold text-green-600 mt-3">

                                Online

                            </h2>

                        </div>

                        <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center">

                            <i class="bi bi-check-circle-fill text-green-600 text-2xl"></i>

                        </div>

                    </div>

                </div>

            </div>

            <!-- Modules -->

            <h2 class="text-2xl font-bold text-slate-700 mb-5">

                Application Modules

            </h2>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- Software Master -->

                <a href="{{ route('software-master.index') }}">

                    <div
                        class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 p-8 border hover:border-blue-500">

                        <div class="flex justify-between items-center">

                            <div>

                                <h3 class="text-2xl font-bold text-slate-800">

                                    Software Master

                                </h3>

                                <p class="text-slate-500 mt-3">

                                    Mengelola seluruh data software yang dimiliki perusahaan, vendor, status lisensi, serta
                                    masa berlaku.

                                </p>

                            </div>

                            <div
                                class="w-20 h-20 rounded-2xl bg-blue-100 flex items-center justify-center group-hover:scale-110 transition">

                                <i class="bi bi-pc-display text-5xl text-blue-600"></i>

                            </div>

                        </div>

                        <div class="mt-8">

                            <span class="inline-flex items-center font-semibold text-blue-600">

                                Buka Modul

                                <i class="bi bi-arrow-right ml-2"></i>

                            </span>

                        </div>

                    </div>

                </a>

                <!-- Detail -->

                

            </div>

        </div>
        

    </div>

@endsection