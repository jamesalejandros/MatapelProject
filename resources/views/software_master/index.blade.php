@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">


<!-- Header -->
<div class="bg-gradient-to-r from-indigo-700 via-blue-700 to-cyan-600 shadow-lg">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col md:flex-row justify-between items-center gap-6">

            <div class="text-white">

                <div class="flex items-center gap-3">

                    <div class="w-14 h-14 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">

                        <i class="bi bi-pc-display text-3xl"></i>

                    </div>

                    <div>

                        <h1 class="text-3xl font-bold">

                            Software Licensing Management

                        </h1>

                        <p class="text-blue-100 mt-1">

                            Master Data Software Licensing

                        </p>

                    </div>

                </div>

            </div>


            <a href="{{ route('software-master.create') }}"

                class="inline-flex items-center gap-2 bg-white text-blue-700 font-semibold px-6 py-3 rounded-xl shadow hover:shadow-xl hover:scale-105 transition duration-300">

                <i class="bi bi-plus-circle-fill"></i>

                Tambah Software

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

                        Total Data

                    </p>

                    <h2 class="text-3xl font-bold text-slate-800 mt-2">

                        {{ $softwareMasters->total() }}

                    </h2>

                </div>


                <div class="w-14 h-14 rounded-xl bg-blue-100 flex items-center justify-center">

                    <i class="bi bi-database-fill text-blue-600 text-2xl"></i>

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

                        {{ $softwareMasters->count() }}

                    </h2>

                </div>


                <div class="w-14 h-14 rounded-xl bg-emerald-100 flex items-center justify-center">

                    <i class="bi bi-list-check text-emerald-600 text-2xl"></i>

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

            action="{{ route('software-master.index') }}">


            <div class="flex flex-col md:flex-row gap-4">


                <div class="flex-1 relative">


                    <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-slate-400">

                        <i class="bi bi-search"></i>

                    </span>


                    <input

                        type="text"

                        name="search"

                        value="{{ $search }}"

                        placeholder="Cari Licensing ID, Vendor, Status atau Parent Program..."

                        class="w-full rounded-xl border-slate-300 pl-12 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500">


                </div>


                <button

                    type="submit"

                    class="inline-flex items-center justify-center gap-2 px-8 py-3 rounded-xl bg-slate-800 text-white font-semibold hover:bg-slate-900 transition">


                    <i class="bi bi-search"></i>

                    Search


                </button>


            </div>


        </form>


    </div>


    <!-- Table Card mulai di Part 2 -->


    <!-- Table Card -->

    <div class="bg-white rounded-2xl shadow-md overflow-hidden border border-slate-100">


        <!-- Table Header -->

        <div class="px-6 py-5 border-b border-slate-200 flex items-center justify-between">


            <div>

                <h2 class="text-xl font-bold text-slate-800">

                    Software Licensing Data

                </h2>

                <p class="text-sm text-slate-500 mt-1">

                    Daftar seluruh software licensing perusahaan

                </p>

            </div>


            <div class="hidden md:flex items-center gap-2 text-sm text-slate-500">

                <i class="bi bi-shield-check text-green-600"></i>

                Data Terlindungi

            </div>


        </div>



        <!-- Responsive Table -->

        <div class="overflow-x-auto">


            <table class="w-full text-sm text-left">


                <thead class="bg-slate-800 text-white">


                    <tr>


                        <th class="px-6 py-4 font-semibold text-center">

                            No

                        </th>


                        <th class="px-6 py-4 font-semibold">

                            Licensing ID

                        </th>


                        <th class="px-6 py-4 font-semibold">

                            Organization

                        </th>


                        <th class="px-6 py-4 font-semibold">

                            Vendor

                        </th>


                        <th class="px-6 py-4 font-semibold">

                            Parent Program

                        </th>


                        <th class="px-6 py-4 font-semibold">

                            Expired

                        </th>


                        <th class="px-6 py-4 font-semibold">

                            Status

                        </th>


                        <th class="px-6 py-4 font-semibold text-center">

                            Action

                        </th>


                    </tr>


                </thead>



                <tbody class="divide-y divide-slate-100">


                @forelse($softwareMasters as $software)


                    <tr class="hover:bg-slate-50 transition">


                        <td class="px-6 py-4 text-center text-slate-600">


                            {{ $loop->iteration + ($softwareMasters->currentPage()-1) * $softwareMasters->perPage() }}


                        </td>



                        <td class="px-6 py-4">


                            <div class="font-semibold text-slate-800">


                                {{ $software->LicensingID ?? '-' }}


                            </div>


                        </td>



                        <td class="px-6 py-4 text-slate-600">


                            {{ $software->organization?->Name ?? '-' }}


                        </td>



                        <td class="px-6 py-4 text-slate-600">


                            {{ $software->Vendor ?? '-' }}


                        </td>



                        <td class="px-6 py-4 text-slate-600">


                            {{ $software->ParentProgram ?? '-' }}


                        </td>



                        <td class="px-6 py-4 text-slate-600">


                            {{ $software->EndDate ? $software->EndDate->format('d M Y') : '-' }}


                        </td>



                        <td class="px-6 py-4">


                            @if($software->Status == "Active")


                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">


                                    <span class="w-2 h-2 rounded-full bg-green-500"></span>

                                    Active


                                </span>



                            @elseif($software->Status == "Expired")


                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">


                                    <span class="w-2 h-2 rounded-full bg-red-500"></span>

                                    Expired


                                </span>



                            @else


                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">


                                    <span class="w-2 h-2 rounded-full bg-gray-500"></span>

                                    Inactive


                                </span>


                            @endif


                        </td>



                        <td class="px-6 py-4">


                            <div class="flex items-center justify-center gap-2">



                                <!-- View -->

                                <a href="{{ route('software-master.show',$software) }}"

                                    class="w-9 h-9 rounded-lg bg-cyan-100 text-cyan-700 flex items-center justify-center hover:bg-cyan-200 transition"

                                    title="Detail">


                                    <i class="bi bi-eye-fill"></i>


                                </a>



                                <!-- Edit -->

                                <a href="{{ route('software-master.edit',$software) }}"

                                    class="w-9 h-9 rounded-lg bg-yellow-100 text-yellow-700 flex items-center justify-center hover:bg-yellow-200 transition"

                                    title="Edit">


                                    <i class="bi bi-pencil-fill"></i>


                                </a>



                                <!-- Delete -->


                                <form

                                    action="{{ route('software-master.destroy',$software) }}"

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


                                <div class="w-16 h-16 rounded-full bg-slate-100 flex items-center justify-center mb-4">


                                    <i class="bi bi-inbox text-3xl text-slate-400"></i>


                                </div>


                                <h3 class="font-semibold text-slate-700">


                                    Belum ada data software


                                </h3>


                                <p class="text-sm text-slate-500 mt-1">


                                    Silakan tambahkan data software licensing baru.


                                </p>


                            </div>


                        </td>


                    </tr>


                @endforelse



                </tbody>


            </table>


        </div>


        <!-- Pagination dan Script lanjut di Part 3 -->


        <!-- Pagination -->

        @if($softwareMasters->hasPages())

            <div class="px-6 py-5 border-t border-slate-200">

                {{ $softwareMasters->links() }}

            </div>

        @endif


    </div>


</div>


</div>

{{-- SweetAlert Notification --}}

@if(session('success'))

<script>

document.addEventListener('DOMContentLoaded', function(){


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

document.addEventListener('DOMContentLoaded', function(){


    Swal.fire({

        icon: 'error',

        title: 'Gagal',

        text: @json(session('error')),

        confirmButtonColor: '#dc2626'

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


            text: 'Data software licensing yang dihapus tidak dapat dikembalikan.',


            icon: 'warning',


            showCancelButton: true,


            confirmButtonText: 'Ya, Hapus',


            cancelButtonText: 'Batal',


            confirmButtonColor: '#dc2626',


            cancelButtonColor: '#64748b',


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
