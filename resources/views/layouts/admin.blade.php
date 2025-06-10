<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     @livewireStyles
</head>
<body class=" bg-[#1e2136]">
    <div class="navbar bg-[#7A0000] text-white px-6">
        <div class="flex-1">
            <a class="text-2xl font-bold flex items-center gap-2" >
                Konsermin
            </a>
        </div>
        <div class="flex-none space-x-6 hidden md:flex">
            <livewire:auth.logout />
        </div>
    </div>
    <div class="main">
        {{ $slot }}
    </div>
 @livewireScripts
</body>
</html>