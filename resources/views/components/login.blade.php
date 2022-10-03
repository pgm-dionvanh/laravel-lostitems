<section id="content">
    <main class="container mx-auto p-4 mt-12 bg-white flex flex-col items-center justify-center text-gray-700">

        @if(isset ($errors) && count($errors) > 0)
        <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800"
            role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                    clip-rule="evenodd"></path>
            </svg>
            <span class="sr-only">Danger</span>
            <div>
                <span class="font-medium">Ensure that these requirements are met:</span>
                <ul class="mt-1.5 ml-4 text-red-700 list-disc list-inside">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif

        <div class="w-10/12 sm:w-8/12 md:w-6/12 lg:w-5/12 xl:w-4/12 mb-4">
            <h1 class="text-4xl font-semibold ">Welcome back.</h1>
        </div>
        <div class="w-10/12 sm:w-8/12 md:w-6/12 lg:w-5/12 xl:w-4/12 mb-6">
            {{ Form::open(array('url' => 'auth/login')) }}

            {{ Form::email('email',null , array('placeholder' => 'E-mail', 'class' => 'mb-4 p-2 appearance-none block w-full bg-gray-200 placeholder-gray-900 rounded border focus:border-teal-500'))}}

            {{ Form::password('password', array('placeholder' => 'password', 'class' => 'mb-4 p-2 appearance-none block w-full bg-gray-200 placeholder-gray-900 rounded border focus:border-teal-500'))}}

            <div class="flex items-center">
                <div class="w-1/2 flex items-center">
                    {{ Form::checkbox('remember-me',null ,false, array('class' => 'mt-1 mr-2')); }}
                    {{ Form::label('remember-me', 'Remember me!'); }}
                </div>

                {{ Form::submit('Log In', array('class' => 'ml-auto w-1/2 bg-gray-800 text-white p-2 rounded font-semibold hover:bg-gray-900')) }}

                {{ Form::close() }}
            </div>

        </div>
        </div>
    </main>
</section>
