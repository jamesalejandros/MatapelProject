<x-guest-layout>

<div class="min-h-screen flex items-center justify-center bg-slate-100 px-6">


    <div class="w-full max-w-md">


        <div class="bg-white rounded-3xl shadow-xl border border-slate-200 p-8">


            <!-- Header -->

            <div class="text-center mb-8">


                <div
                    class="mx-auto w-16 h-16 rounded-2xl bg-indigo-100 flex items-center justify-center">

                    <i class="bi bi-pc-display text-4xl text-indigo-700"></i>

                </div>


                <h1 class="mt-5 text-2xl font-bold text-slate-800">

                    Software Licensing

                </h1>


                <p class="mt-1 text-slate-500 text-sm">

                    Management System

                </p>


            </div>




            <div class="mb-6">

                <p class="text-center text-slate-600 text-sm">

                    Login untuk mengelola data software licensing,
                    vendor, organisasi, dan monitoring masa berlaku.

                </p>

            </div>




            <!-- Session Status -->

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />




            <form method="POST" action="{{ route('login') }}">

                @csrf



                <!-- Email -->

                <div>


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
                        autofocus
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
                        autocomplete="current-password" />


                    <x-input-error
                        :messages="$errors->get('password')"
                        class="mt-2" />


                </div>




                <!-- Remember -->

                <div class="mt-5">


                    <label
                        for="remember_me"
                        class="inline-flex items-center">


                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-slate-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            name="remember">


                        <span class="ms-2 text-sm text-slate-600">

                            Remember me

                        </span>


                    </label>


                </div>





                <div class="flex items-center justify-between mt-6">


                    <!-- @if (Route::has('password.request'))

                    <a
                        class="text-sm text-indigo-600 hover:text-indigo-800 transition"
                        href="{{ route('password.request') }}">

                        Forgot password?

                    </a>

                    @else

                    <div></div>

                    
                    

                    @endif -->

                    <a
                        class="text-sm text-indigo-600 hover:text-indigo-800 transition"
                        href="{{ route('register') }}">

                        Register Here

                    </a>





                    <button
                        type="submit"
                        class="px-6 py-3 rounded-xl bg-indigo-600 text-white font-medium hover:bg-indigo-700 transition shadow">


                        <i class="bi bi-box-arrow-in-right mr-2"></i>

                        Login


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