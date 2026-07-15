<x-guest-layout>


<div class="min-h-screen flex items-center justify-center bg-slate-100 px-6">


    <div class="w-full max-w-md">


        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8">


            <!-- Header -->

            <div class="text-center mb-8">


                <div
                    class="mx-auto w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center">


                    <i class="bi bi-person-plus-fill text-4xl text-indigo-700"></i>


                </div>



                <h1 class="mt-5 text-2xl font-bold text-slate-800">

                    Create Account

                </h1>



                <p class="mt-1 text-sm text-slate-500">

                    Software Licensing Management System

                </p>


            </div>





            <p class="text-center text-sm text-slate-600 mb-6">

                Buat akun baru untuk mengakses sistem pengelolaan
                software licensing perusahaan.

            </p>





            <form method="POST" action="{{ route('register') }}">

                @csrf





                <!-- Name -->

                <div>


                    <x-input-label
                        for="name"
                        value="Name"
                        class="text-slate-700" />



                    <x-text-input
                        id="name"
                        class="block mt-2 w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="text"
                        name="name"
                        :value="old('name')"
                        required
                        autofocus
                        autocomplete="name" />



                    <x-input-error
                        :messages="$errors->get('name')"
                        class="mt-2" />


                </div>






                <!-- Email -->


                <div class="mt-5">


                    <x-input-label
                        for="email"
                        value="Email"
                        class="text-slate-700" />



                    <x-text-input
                        id="email"
                        class="block mt-2 w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autocomplete="username" />



                    <x-input-error
                        :messages="$errors->get('email')"
                        class="mt-2" />


                </div>







                <!-- Password -->


                <div class="mt-5">


                    <x-input-label
                        for="password"
                        value="Password"
                        class="text-slate-700" />



                    <x-text-input
                        id="password"
                        class="block mt-2 w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password" />



                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2" />


                </div>







                <!-- Confirm Password -->


                <div class="mt-5">


                    <x-input-label
                        for="password_confirmation"
                        value="Confirm Password"
                        class="text-slate-700" />



                    <x-text-input
                        id="password_confirmation"
                        class="block mt-2 w-full rounded-xl border-slate-300 focus:border-indigo-500 focus:ring-indigo-500"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password" />



                    <x-input-error
                        :messages="$errors->get('password_confirmation')"
                        class="mt-2" />


                </div>







                <div class="flex items-center justify-between mt-7">



                    <a
                        href="{{ route('login') }}"
                        class="text-sm text-indigo-600 hover:text-indigo-800 transition">


                        Already registered?


                    </a>





                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition shadow">


                        <i class="bi bi-person-check mr-2"></i>


                        Register


                    </button>



                </div>





            </form>



        </div>





        <p class="text-center text-sm text-slate-500 mt-6">

            © {{ date('Y') }} Software Licensing Management System

        </p>



    </div>


</div>


</x-guest-layout>