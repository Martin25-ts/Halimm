<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @stack('css-content')
    @stack('font-content')


    <link rel="shortcut icon" href="https://ucarecdn.com/b2facfe5-d66f-41c2-ac40-2820fd5eeb17/EllockerLogo1.png">
    <title>@yield('title')</title>

</head>
<body>


    {{-- extend content in other page file --}}
    @yield('content')


    @stack('js-content')
</body>
</html>
