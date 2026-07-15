<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
        {{ config('app.name', 'Software Licensing Management') }}
    </title>


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700"
        rel="stylesheet" />


    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif


    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>


<body class="bg-slate-100 min-h-screen flex flex-col">


<header class="w-full px-6 py-6">

    <div class="max-w-6xl mx-auto flex justify-between items-center">


        <div class="flex items-center gap-3">


            <div
                class="w-12 h-12 rounded-2xl bg-indigo-100 flex items-center justify-center">

                <i class="bi bi-pc-display text-2xl text-indigo-700"></i>

            </div>


            <div>

                <h1 class="font-bold text-xl text-slate-800">
                    Software Licensing
                </h1>

                <p class="text-sm text-slate-500">
                    Management System
                </p>

            </div>


        </div>



        @if (Route::has('login'))

            <nav class="flex items-center gap-3">


                @auth

                    <a href="{{ url('/dashboard') }}"
                        class="px-5 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">

                        Dashboard

                    </a>


                @else


                    <a href="{{ route('login') }}"
                        class="px-5 py-2 rounded-xl border border-slate-300 text-slate-700 hover:bg-white transition">

                        Login

                    </a>


                    @if (Route::has('register'))

                    <a href="{{ route('register') }}"
                        class="px-5 py-2 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 transition">

                        Register

                    </a>

                    @endif


                @endauth


            </nav>

        @endif


    </div>


</header>



<main class="flex-1 flex items-center">


<section class="max-w-6xl mx-auto px-6 grid lg:grid-cols-2 gap-12 items-center">


<div>


<span
class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-emerald-100 text-emerald-700 text-sm font-medium">

<i class="bi bi-shield-check"></i>

License Monitoring Platform

</span>



<h2 class="mt-6 text-5xl font-bold leading-tight text-slate-800">

Kelola Software Licensing
lebih mudah dan terkontrol

</h2>



<p class="mt-6 text-lg text-slate-600 leading-relaxed">

Sistem manajemen lisensi software untuk membantu perusahaan
mengelola data licensing, vendor, organisasi, detail produk,
serta memonitor masa berlaku lisensi secara efektif.

</p>



<div class="mt-8 flex gap-4">


@auth

<a href="{{ url('/dashboard') }}"
class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition">

<i class="bi bi-speedometer2 mr-2"></i>

Masuk Dashboard

</a>


@else


<a href="{{ route('login') }}"
class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition">

<i class="bi bi-box-arrow-in-right mr-2"></i>

Mulai Sekarang

</a>


@endauth



</div>



</div>





<div class="relative">


<div
class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8">


<div class="flex items-center justify-between mb-8">


<div>

<p class="text-slate-500 text-sm">

Dashboard Overview

</p>


<h3 class="text-2xl font-bold text-slate-800">

Software Control

</h3>


</div>


<div
class="w-14 h-14 rounded-2xl bg-indigo-100 flex items-center justify-center">

<i class="bi bi-bar-chart-fill text-3xl text-indigo-700"></i>

</div>


</div>




<div class="space-y-5">


<div
class="flex items-center justify-between p-4 rounded-xl bg-emerald-50">

<div class="flex items-center gap-3">

<span
class="w-3 h-3 rounded-full bg-emerald-500"></span>

<span class="text-slate-700">

Active Software

</span>

</div>


<i class="bi bi-check-circle text-emerald-600 text-xl"></i>


</div>



<div
class="flex items-center justify-between p-4 rounded-xl bg-slate-50">

<div class="flex items-center gap-3">

<span
class="w-3 h-3 rounded-full bg-slate-500"></span>


<span class="text-slate-700">

Inactive Software

</span>

</div>


<i class="bi bi-pause-circle text-slate-600 text-xl"></i>


</div>




<div
class="flex items-center justify-between p-4 rounded-xl bg-red-50">


<div class="flex items-center gap-3">

<span
class="w-3 h-3 rounded-full bg-red-500"></span>


<span class="text-slate-700">

Expired Monitoring

</span>


</div>


<i class="bi bi-exclamation-triangle text-red-600 text-xl"></i>


</div>



</div>


</div>



<div
class="absolute -z-10 -top-10 -right-10 w-40 h-40 bg-indigo-200 rounded-full blur-3xl opacity-50">
</div>


<div
class="absolute -z-10 -bottom-10 -left-10 w-40 h-40 bg-emerald-200 rounded-full blur-3xl opacity-50">
</div>



</div>



</section>


</main>



<footer class="py-6 text-center text-sm text-slate-500">

© {{ date('Y') }} Software Licensing Management System

</footer>


</body>

</html>