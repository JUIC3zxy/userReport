<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }} bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@{{ < current_version > }}/dist/flowbite.min.js"></script>
    <!-- Styles -->

</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50 ">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form method="POST" action="/">
        @csrf
        <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
            <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                <img class="mx-auto h-10 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=600"
                    alt="Your Company">
                <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Report</h2>
            </div>

            <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
                <form class="space-y-6" action="/" method="POST">
                    <div>
                        <label for="start" class="text-sm font-medium  text-gray-900">Start
                            Date</label>
                    
                            <input id="start_date" name="start_date" type="date" autocomplete="email" required
                                class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                     
                    </div>

                    <div>
                        <div class="flex items-center justify-between">
                            <label for="end" class="block text-sm font-medium leading-6 text-gray-900">End
                                Date</label>

                        </div>
                        <div class="mt-2">
                            <input id="end_date" name="end_date" type="date" required
                                class="block w-full rounded-md border-0 px-3 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        </div>
                    </div>

                    <div>
                        <button type="submit"
                            class="flex w-full justify-center rounded-md bg-green-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Generate
                            Report </button>
                        <button type="button" onclick="document.querySelector('form').reset();" class=" margin-3 flex w-full justify-center rounded-md  px-3 py-1.5 text-sm font-semibold leading-6 shadow-sm text-sm font-semibold leading-6 text-gray-900">Cancel</button>
                    </div>
                </form>

                <p class="mt-10 text-center text-sm text-gray-500">
                    presented by juju with :)

                </p>
            </div>
        </div>
    </form>

</body>


</html>
