
@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">

    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-700 via-fuchsia-700 to-pink-600 shadow-lg">

        <div class="max-w-7xl mx-auto px-6 py-10">

            <div class="flex flex-col md:flex-row justify-between items-center gap-6">

                <div class="text-white">

                    <div class="flex items-center gap-3">

                        <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                            <i class="bi bi-key-fill text-3xl"></i>

                        </div>

                        <div>

                            <h1 class="text-3xl font-bold">

                                Software Detail Licensing

                            </h1>

                            <p class="text-purple-100 mt-1">

                                Detail Data Lisensi Software Perusahaan

                            </p>

                        </div>

                    </div>

                </div>

                <a href="{{ route('software-detail.create') }}"
                    class="inline-flex items-center gap-2 bg-white text-purple-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-xl hover:scale-105 transition duration-300">

                    <i class="bi bi-plus-circle-fill"></i>

                    Tambah Detail

                </a>

            </div>

        </div>

    </div>

    <div class="max-w-7xl mx-auto px-6 py-8">

        <!-- Information Cards -->

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <div class="bg-white rounded-2xl shadow-md p-6 border border-slate-100">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">

                            Total Detail

                        </p>

                        <h2 class="text-3xl font-bold text-slate-800 mt-2">

                            {{ $details->total() }}

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-xl bg-purple-100 flex items-center justify-center">

                        <i class="bi bi-database-fill text-purple-600 text-2xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 border border-slate-100">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">

                            Current Page

                        </p>

                        <h2 class="text-3xl font-bold text-slate-800 mt-2">

                            {{ $details->count() }}

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-xl bg-pink-100 flex items-center justify-center">

                        <i class="bi bi-list-check text-pink-600 text-2xl"></i>

                    </div>

                </div>

            </div>

            <div class="bg-white rounded-2xl shadow-md p-6 border border-slate-100">

                <div class="flex justify-between items-center">

                    <div>

                        <p class="text-sm text-slate-500">

                            System Status

                        </p>

                        <h2 class="text-2xl font-bold text-green-600 mt-3">

                            Active

                        </h2>

                    </div>

                    <div class="w-14 h-14 rounded-xl bg-green-100 flex items-center justify-center">

                        <i class="bi bi-check-circle-fill text-green-600 text-2xl"></i>

                    </div>

                </div>

            </div>

        </div>

        <!-- Search -->

        <div class="bg-white rounded-2xl shadow-md p-6 mb-8">

            <form method="GET"
                action="{{ route('software-detail.index') }}">

                <div class="flex flex-col md:flex-row gap-4">

                    <div class="flex-1 relative">

                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                            <i class="bi bi-search"></i>

                        </span>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            placeholder="Cari Licensing ID, License Pool, Product Family atau Version..."
                            class="w-full rounded-xl border-slate-300 pl-12 py-3 focus:ring-2 focus:ring-purple-500 focus:border-purple-500">

                    </div>

                    <button
                        type="submit"
                        class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-purple-700 text-white font-semibold hover:bg-purple-800 transition">

                        <i class="bi bi-search"></i>

                        Search

                    </button>

                </div>

            </form>

        </div>

        <!-- Table Card -->

        <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-100">

            <!-- Table Header -->

            <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">

                <div>

                    <h2 class="text-xl font-bold text-slate-800">

                        Software Detail Licensing

                    </h2>

                    <p class="text-sm text-slate-500 mt-1">

                        Daftar detail lisensi software perusahaan

                    </p>

                </div>

                <div class="hidden md:flex items-center gap-2 text-sm text-slate-500">

                    <i class="bi bi-key-fill text-purple-600"></i>

                    Detail License

                </div>

            </div>

            <!-- Responsive Table -->

            <div class="overflow-x-auto">

                <table class="w-full text-sm text-left">

                    <thead class="bg-purple-700 text-white">

                        <tr>

                            <th class="px-6 py-4 font-semibold text-center">

                                No

                            </th>

                            <th class="px-6 py-4 font-semibold">

                                Software

                            </th>

                            <th class="px-6 py-4 font-semibold">

                                Licensing ID

                            </th>

                            <th class="px-6 py-4 font-semibold">

                                License Pool

                            </th>

                            <th class="px-6 py-4 font-semibold">

                                Product Family

                            </th>

                            <th class="px-6 py-4 font-semibold">

                                Version

                            </th>

                            <th class="px-6 py-4 font-semibold">

                                Quantity

                            </th>

                            <th class="px-6 py-4 font-semibold text-center">

                                Action

                            </th>

                        </tr>

                    </thead>

                    <tbody class="divide-y divide-slate-100">

                        @forelse($details as $detail)

                        <tr class="hover:bg-purple-50 transition">

                            <td class="px-6 py-4 text-center text-slate-600">

                                {{ $loop->iteration + ($details->currentPage()-1) * $details->perPage() }}

                            </td>

                            <td class="px-6 py-4">

                                <div class="font-semibold text-slate-800">

                                    {{ $detail->software?->LicensingID ?? '-' }}

                                </div>

                            </td>

                            <td class="px-6 py-4 text-slate-600">

                                {{ $detail->LicensingID ?? '-' }}

                            </td>

                            <td class="px-6 py-4 text-slate-600">

                                {{ $detail->LicensePool ?? '-' }}

                            </td>

                            <td class="px-6 py-4 text-slate-600">

                                {{ $detail->ProductFamily ?? '-' }}

                            </td>

                            <td class="px-6 py-4 text-slate-600">

                                {{ $detail->Version ?? '-' }}

                            </td>

                            <td class="px-6 py-4">

                                @if($detail->Quantity)

                                    <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">

                                        <i class="bi bi-box-seam-fill"></i>

                                        {{ $detail->Quantity }}

                                    </span>

                                @else

                                    -

                                @endif

                            </td>

                            <td class="px-6 py-4">

                                <div class="flex items-center justify-center gap-2">


                                <!-- View -->
                                <a href="{{ route('software-detail.show', $detail) }}"
                                    class="w-9 h-9 rounded-lg bg-cyan-100 text-cyan-700 flex items-center justify-center hover:bg-cyan-200 transition"
                                    title="Detail">

                                    <i class="bi bi-eye-fill"></i>

                                </a>

                                <!-- Edit -->
                                <a href="{{ route('software-detail.edit', $detail) }}"
                                    class="w-9 h-9 rounded-lg bg-amber-100 text-amber-700 flex items-center justify-center hover:bg-amber-200 transition"
                                    title="Edit">

                                    <i class="bi bi-pencil-fill"></i>

                                </a>

                                <!-- Delete -->
                                <form
                                    action="{{ route('software-detail.destroy', $detail) }}"
                                    method="POST"
                                    class="delete-form">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="w-9 h-9 rounded-lg bg-red-100 text-red-700 flex items-center justify-center hover:bg-red-200 transition"
                                        title="Delete">

                                        <i class="bi bi-trash-fill"></i>

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="8" class="px-6 py-12 text-center">

                            <div class="flex flex-col items-center">

                                <div class="w-16 h-16 rounded-full bg-purple-100 flex items-center justify-center mb-4">

                                    <i class="bi bi-folder-x text-3xl text-purple-400"></i>

                                </div>

                                <h3 class="font-semibold text-slate-700">

                                    Belum ada data detail licensing

                                </h3>

                                <p class="text-sm text-slate-500 mt-1">

                                    Silakan tambahkan detail lisensi software terlebih dahulu.

                                </p>

                            </div>

                        </td>

                    </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <!-- Pagination -->

            @if($details->hasPages())

                <div class="px-6 py-5 border-t border-slate-200">

                    {{ $details->links() }}

                </div>

            @endif

        </div>

    </div>

</div>

{{-- SweetAlert Notification --}}

@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({

        icon: 'success',

        title: 'Berhasil',

        text: @json(session('success')),

        timer: 2000,

        showConfirmButton: false,

        timerProgressBar: true

    });

});

</script>

@endif

@if(session('error'))

<script>

document.addEventListener('DOMContentLoaded', function () {

    Swal.fire({

        icon: 'error',

        title: 'Gagal',

        text: @json(session('error')),

        confirmButtonColor: '#9333ea'

    });

});

</script>

@endif

{{-- Delete Confirmation --}}

<script>

document.querySelectorAll('.delete-form').forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus Data?',

            text: 'Detail licensing yang dihapus tidak dapat dikembalikan.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonText: 'Ya, Hapus',

            cancelButtonText: 'Batal',

            confirmButtonColor: '#dc2626',

            cancelButtonColor: '#6b7280',

            reverseButtons: true

        }).then((result) => {

            if(result.isConfirmed){

                form.submit();

            }

        });

    });

});

</script>

@endsection

