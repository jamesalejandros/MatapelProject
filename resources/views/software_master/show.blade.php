@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100">


<!-- Header -->


<div class="bg-gradient-to-r from-blue-700 via-indigo-700 to-purple-600 shadow-lg">


    <div class="max-w-7xl mx-auto px-6 py-10">


        <div class="flex flex-col md:flex-row justify-between items-center gap-6">


            <div class="flex items-center gap-4 text-white">


                <div class="w-16 h-16 rounded-2xl bg-white/20 backdrop-blur flex items-center justify-center">


                    <i class="bi bi-file-earmark-text-fill text-4xl"></i>


                </div>


                <div>


                    <h1 class="text-3xl font-bold">

                        Detail Software Licensing

                    </h1>


                    <p class="text-blue-100 mt-1">

                        Informasi lengkap software licensing perusahaan.

                    </p>


                </div>


            </div>




            <div class="flex gap-3">


                <a href="{{ route('software-master.edit',$softwareMaster) }}"

                    class="inline-flex items-center gap-2 bg-white text-orange-600 font-semibold px-5 py-3 rounded-xl shadow hover:scale-105 transition">


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



    <!-- Software Profile Card -->


    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden mb-8">



        <div class="bg-gradient-to-r from-slate-50 to-blue-50 px-8 py-6 border-b">


            <div class="flex items-center gap-4">


                <div class="w-14 h-14 bg-blue-100 rounded-2xl flex items-center justify-center">


                    <i class="bi bi-pc-display-horizontal text-blue-600 text-3xl"></i>


                </div>



                <div>


                    <h2 class="text-xl font-bold text-slate-800">


                        {{ $softwareMaster->ParentProgram ?? 'Software Licensing' }}


                    </h2>


                    <p class="text-slate-500">


                        {{ $softwareMaster->Vendor ?? 'Vendor tidak tersedia' }}


                    </p>


                </div>


            </div>


        </div>




        <div class="p-8">


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                <!-- Licensing ID -->


                <div class="bg-slate-50 rounded-xl p-5">


                    <p class="text-sm text-slate-500">


                        Licensing ID


                    </p>


                    <h3 class="font-bold text-slate-800 mt-1">


                        {{ $softwareMaster->LicensingID ?? '-' }}


                    </h3>


                </div>





                <!-- Organization -->


                <div class="bg-slate-50 rounded-xl p-5">


                    <p class="text-sm text-slate-500">


                        Organization


                    </p>


                    <h3 class="font-bold text-slate-800 mt-1">


                        {{ $softwareMaster->organization?->Name ?? '-' }}


                    </h3>


                </div>





                <!-- Vendor -->


                <div class="bg-slate-50 rounded-xl p-5">


                    <p class="text-sm text-slate-500">


                        Vendor


                    </p>


                    <h3 class="font-bold text-slate-800 mt-1">


                        {{ $softwareMaster->Vendor ?? '-' }}


                    </h3>


                </div>



                <!-- Parent Program -->


                <div class="bg-slate-50 rounded-xl p-5">


                    <p class="text-sm text-slate-500">


                        Parent Program


                    </p>


                    <h3 class="font-bold text-slate-800 mt-1">


                        {{ $softwareMaster->ParentProgram ?? '-' }}


                    </h3>


                </div>


            </div>


        </div>


    </div>



    <!-- lanjut Part 2 -->


            <!-- Additional Information -->


            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">



                <!-- Expired Date -->


                <div class="bg-slate-50 rounded-xl p-5">


                    <p class="text-sm text-slate-500">


                        Expired Date


                    </p>



                    <h3 class="font-bold text-slate-800 mt-1">


                        {{ optional($softwareMaster->EndDate)->format('d F Y') ?? '-' }}


                    </h3>


                </div>





                <!-- Status -->


                <div class="bg-slate-50 rounded-xl p-5">


                    <p class="text-sm text-slate-500">


                        Status


                    </p>



                    <div class="mt-2">


                        @if($softwareMaster->Status == 'Active')


                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-green-100 text-green-700 font-semibold">


                                <span class="w-2 h-2 rounded-full bg-green-500"></span>


                                Active


                            </span>



                        @elseif($softwareMaster->Status == 'Expired')


                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-red-100 text-red-700 font-semibold">


                                <span class="w-2 h-2 rounded-full bg-red-500"></span>


                                Expired


                            </span>



                        @else


                            <span class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-slate-200 text-slate-700 font-semibold">


                                <span class="w-2 h-2 rounded-full bg-slate-500"></span>


                                Inactive


                            </span>



                        @endif


                    </div>


                </div>


            </div>



        </div>


    </div>






    <!-- Detail Licensing Card -->


    <div class="bg-white rounded-2xl shadow-lg border border-slate-100 overflow-hidden">



        <div class="px-8 py-6 bg-slate-900 text-white flex flex-col md:flex-row justify-between gap-4 items-center">


            <div class="flex items-center gap-3">


                <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center">


                    <i class="bi bi-list-ul"></i>


                </div>



                <div>


                    <h2 class="font-bold text-xl">


                        Detail Licensing


                    </h2>


                    <p class="text-slate-300 text-sm">


                        Daftar detail lisensi software.


                    </p>


                </div>


            </div>





            <div class="px-4 py-2 rounded-full bg-cyan-500 text-white font-semibold">


                Total :

                {{ $softwareMaster->details->count() }}


                Data


            </div>


        </div>






        <div class="p-6">


            <div class="overflow-x-auto rounded-xl border border-slate-200">


                <table class="min-w-full text-sm">


                    <thead class="bg-slate-800 text-white">


                        <tr>


                            <th class="px-4 py-3 text-left">


                                No


                            </th>



                            <th class="px-4 py-3 text-left">


                                Licensing ID


                            </th>



                            <th class="px-4 py-3 text-left">


                                License Pool


                            </th>



                            <th class="px-4 py-3 text-left">


                                Product Family


                            </th>



                            <th class="px-4 py-3 text-left">


                                Version


                            </th>



                            <th class="px-4 py-3 text-center">


                                Quantity


                            </th>



                            <th class="px-4 py-3 text-right">


                                Last Price


                            </th>



                            <th class="px-4 py-3 text-left">


                                Last Buy Date


                            </th>



                            <th class="px-4 py-3 text-left">


                                Keterangan


                            </th>


                        </tr>


                    </thead>



                    <tbody class="divide-y divide-slate-200">


                        @forelse($softwareMaster->details as $detail)


                            <tr class="hover:bg-slate-50 transition">


                                <td class="px-4 py-4">


                                    {{ $loop->iteration }}


                                </td>



                                <td class="px-4 py-4 font-medium">


                                    {{ $detail->LicensingID }}


                                </td>



                                <td class="px-4 py-4">


                                    {{ $detail->LicensePool }}


                                </td>



                                <td class="px-4 py-4">


                                    {{ $detail->ProductFamily }}


                                </td>



                                <td class="px-4 py-4">


                                    {{ $detail->Version }}


                                </td>



                                <td class="px-4 py-4 text-center">


                                    {{ $detail->Quantity }}


                                </td>



                                <td class="px-4 py-4 text-right">


                                    @if($detail->LastPrice)


                                        Rp {{ number_format($detail->LastPrice,2,',','.') }}


                                    @else


                                        -


                                    @endif


                                </td>



                                <td class="px-4 py-4">


                                    {{ optional($detail->LastBuyDate)->format('d M Y') }}


                                </td>



                                <td class="px-4 py-4">


                                    {{ $detail->Keterangan ?? '-' }}


                                </td>


                            </tr>


                        @empty


                            <tr>


                                <td colspan="9"

                                    class="px-6 py-8 text-center text-slate-500">


                                    <i class="bi bi-inbox text-3xl block mb-2"></i>


                                    Belum ada Detail Licensing.


                                </td>


                            </tr>


                        @endforelse


                    </tbody>


                </table>


            </div>


        </div>


    </div>



</div>


</div>

<!-- lanjut Part 3 -->
<script>

document.addEventListener('DOMContentLoaded', function(){


    const cards = document.querySelectorAll('.rounded-2xl');


    cards.forEach((card, index) => {


        card.style.opacity = '0';


        card.style.transform = 'translateY(20px)';



        setTimeout(() => {


            card.style.transition = 'all .5s ease';


            card.style.opacity = '1';


            card.style.transform = 'translateY(0)';


        }, index * 100);



    });



});


</script>

@endsection
