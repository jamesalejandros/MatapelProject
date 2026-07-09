@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    <!-- Header -->

    <div class="bg-gradient-to-r from-purple-700 via-fuchsia-700 to-pink-600 shadow-lg">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                <div class="flex items-center gap-4 text-white">

                    <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                        <i class="bi bi-key-fill text-4xl"></i>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">

                            Detail Software Licensing

                        </h1>

                        <p class="text-purple-100 mt-1">

                            Informasi lengkap detail licensing software.

                        </p>

                    </div>

                </div>

                <div class="flex gap-3">

                    <a href="{{ route('software-detail.edit', $softwareDetail) }}"
                        class="inline-flex items-center gap-2 bg-white text-amber-600 font-semibold px-5 py-3 rounded-xl shadow hover:scale-105 transition">

                        <i class="bi bi-pencil-square"></i>

                        Edit

                    </a>

                    <a href="{{ route('software-master.index') }}"
                        class="inline-flex items-center gap-2 bg-white/20 text-white border border-white/30 font-semibold px-5 py-3 rounded-xl hover:bg-white/30 transition">

                        <i class="bi bi-arrow-left"></i>

                        Kembali

                    </a>

                </div>

            </div>

        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Detail Profile Card -->

        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden mb-8">

            <div class="bg-gradient-to-r from-purple-50 via-fuchsia-50 to-pink-50 px-8 py-6 border-b">

                <div class="flex items-center gap-4">

                    <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center">

                        <i class="bi bi-key-fill text-purple-600 text-3xl"></i>

                    </div>

                    <div>

                        <h2 class="text-2xl font-bold text-slate-800">

                            {{ $softwareDetail->LicensingID ?: 'Detail Licensing' }}

                        </h2>

                        <p class="text-slate-500">

                            {{ $softwareDetail->software?->Vendor ?? 'Vendor tidak tersedia' }}

                        </p>

                    </div>

                </div>

            </div>

            <div class="p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Software -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            Software

                        </p>

                        <h3 class="font-bold text-slate-800 mt-1">

                            {{ $softwareDetail->software?->LicensingID ?? '-' }}

                        </h3>

                    </div>

                    

                    <!-- License Pool -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            License Pool

                        </p>

                        <h3 class="font-bold text-slate-800 mt-1">

                            {{ $softwareDetail->LicensePool ?? '-' }}

                        </h3>

                    </div>

                    <!-- Product Family -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            Product Family

                        </p>

                        <h3 class="font-bold text-slate-800 mt-1">

                            {{ $softwareDetail->ProductFamily ?? '-' }}

                        </h3>

                    </div>

                </div>

            </div>

        </div>

        <!-- lanjut Part 2 -->


        <!-- Additional Information -->

        <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">

            <div class="bg-gradient-to-r from-purple-700 via-fuchsia-700 to-pink-600 px-8 py-5">

                <div class="flex items-center gap-3 text-white">

                    <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">

                        <i class="bi bi-info-circle-fill"></i>

                    </div>

                    <div>

                        <h2 class="text-xl font-bold">

                            Informasi Detail Licensing

                        </h2>

                        <p class="text-purple-100 text-sm">

                            Informasi lengkap mengenai lisensi software.

                        </p>

                    </div>

                </div>

            </div>

            <div class="p-8">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Version -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            Version

                        </p>

                        <h3 class="font-bold text-slate-800 mt-1">

                            {{ $softwareDetail->Version ?? '-' }}

                        </h3>

                    </div>

                    <!-- Quantity -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            Quantity

                        </p>

                        <h3 class="font-bold text-slate-800 mt-1">

                            @if($softwareDetail->Quantity)

                                <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-purple-100 text-purple-700">

                                    <i class="bi bi-box-seam-fill"></i>

                                    {{ number_format($softwareDetail->Quantity) }}

                                </span>

                            @else

                                -

                            @endif

                        </h3>

                    </div>

                    <!-- Last Price -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            Last Price

                        </p>

                        <h3 class="font-bold text-green-600 mt-1">

                            @if($softwareDetail->LastPrice)

                                Rp {{ number_format($softwareDetail->LastPrice,2,',','.') }}

                            @else

                                -

                            @endif

                        </h3>

                    </div>

                    <!-- Last Buy Date -->

                    <div class="bg-slate-50 rounded-xl p-5">

                        <p class="text-sm text-slate-500">

                            Last Buy Date

                        </p>

                        <h3 class="font-bold text-slate-800 mt-1">

                            {{ $softwareDetail->LastBuyDate ? \Carbon\Carbon::parse($softwareDetail->LastBuyDate)->format('d F Y') : '-' }}

                        </h3>

                    </div>

                </div>

                <!-- Keterangan -->

                <div class="mt-6">

                    <div class="bg-slate-50 rounded-xl p-6">

                        <p class="text-sm text-slate-500 mb-2">

                            Keterangan

                        </p>

                        <div class="text-slate-700 leading-relaxed">

                            {!! nl2br(e($softwareDetail->Keterangan ?? '-')) !!}

                        </div>

                    </div>

                </div>

                <!-- Metadata -->

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">

                    <div class="bg-purple-50 border border-purple-100 rounded-xl p-5">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-lg bg-purple-100 flex items-center justify-center">

                                <i class="bi bi-calendar-plus text-purple-600"></i>

                            </div>

                            <div>

                                <p class="text-sm text-slate-500">

                                    Created At

                                </p>

                                <h3 class="font-semibold text-slate-800">

                                    {{ $softwareDetail->created_at?->format('d F Y H:i') ?? '-' }}

                                </h3>

                            </div>

                        </div>

                    </div>

                    <div class="bg-pink-50 border border-pink-100 rounded-xl p-5">

                        <div class="flex items-center gap-3">

                            <div class="w-10 h-10 rounded-lg bg-pink-100 flex items-center justify-center">

                                <i class="bi bi-clock-history text-pink-600"></i>

                            </div>

                            <div>

                                <p class="text-sm text-slate-500">

                                    Last Updated

                                </p>

                                <h3 class="font-semibold text-slate-800">

                                    {{ $softwareDetail->updated_at?->format('d F Y H:i') ?? '-' }}

                                </h3>

                            </div>

                        </div>

                    </div>

                </div>

                <!-- Information -->

                <div class="mt-8 bg-gradient-to-r from-purple-50 to-fuchsia-50 border border-purple-200 rounded-2xl p-6">

                    <div class="flex items-start gap-4">

                        <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center">

                            <i class="bi bi-lightbulb-fill text-purple-600 text-xl"></i>

                        </div>

                        <div>

                            <h3 class="font-bold text-purple-800">

                                Informasi

                            </h3>

                            <p class="text-purple-700 mt-2 leading-relaxed">

                                Detail licensing ini merupakan bagian dari Software Master
                                <strong>{{ $softwareDetail->software?->LicensingID ?? '-' }}</strong>.
                                Pastikan seluruh informasi lisensi selalu diperbarui agar data inventaris software tetap akurat.

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- lanjut Part 3 -->


<script>

document.addEventListener('DOMContentLoaded', function () {

    const cards = document.querySelectorAll('.rounded-2xl');

    cards.forEach((card, index) => {

        card.style.opacity = '0';

        card.style.transform = 'translateY(20px)';

        setTimeout(() => {

            card.style.transition = 'all .5s ease';

            card.style.opacity = '1';

            card.style.transform = 'translateY(0)';

        }, index * 120);

    });

});

</script>

@endsection

