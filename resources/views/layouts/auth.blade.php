<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
     @livewireStyles
</head>
<body class="text-[#FDF0D5] bg-[#FDF0D5]">
<div class="flex h-screen">
  <div class="w-1/3 bg-cover bg-center" style="background-image: url('/images/concert.jpg')"></div>

    <div class="w-2/3 bg-[#7A0000] flex items-center justify-center relative">

        <!-- Tombol login di pojok kanan atas -->
        <div class="absolute top-4 right-4">
          <x-button
             label="{{ request()->routeIs('login') ? 'Register' : 'Login' }}"
             link="{{ request()->routeIs('login') ? route('register') : route('login') }}"
             class="btn-ghost"/>
          <x-button label="Home" link="{{ route('home') }}" class="btn-ghost"/>

        </div>

        <!-- Form -->
        <div class="w-[400px] text-neutral-content">
         <h2 class="text-3xl font-bold mb-6 text-center">Welcome Peeps!</h2>
         {{ $slot }}
        </div>
    </div>

</div>


 @livewireScripts
</body>
</html>