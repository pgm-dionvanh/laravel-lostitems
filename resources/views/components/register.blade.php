<section id="content">
    <main class="container mx-auto p-4 mt-12 bg-white flex flex-col items-center justify-center text-gray-700">
        <div class="w-10/12 sm:w-8/12 md:w-6/12 lg:w-5/12 xl:w-4/12 mb-4">
            <h1 class="text-4xl font-semibold ">Welcome back.</h1>
        </div>
        <div class="w-10/12 sm:w-8/12 md:w-6/12 lg:w-5/12 xl:w-4/12 mb-6">
            {{ Form::open(array('url' => 'auth/register')) }}
            <input
                name="email"
                class="mb-4 p-2 appearance-none block w-full bg-gray-200 placeholder-gray-900 rounded border focus:border-teal-500"
                type="text" placeholder="Email" />
            <input
                name="password"
                class="mb-4 p-2 appearance-none block w-full bg-gray-200 placeholder-gray-900 rounded border focus:border-teal-500"
                type="password" placeholder="Password" />
            <input
                class="mb-4 p-2 appearance-none block w-full bg-gray-200 placeholder-gray-900 rounded border focus:border-teal-500"
                type="password" placeholder="Confirm password" />

            <div class="flex items-center">
                <div class="w-1/2 flex items-center">
                    <input id="remember-me" type="checkbox" class="mt-1 mr-2" />
                    <label for="remember-me">I accept the terms & rules.</label>
                </div>
                <button class="ml-auto w-1/2 bg-gray-800 text-white p-2 rounded font-semibold hover:bg-gray-900"
                    type="submit">
                    Register
                </button>
                {{ Form::close() }}
            </div>
        </div>
        </div>
    </main>
</section>
