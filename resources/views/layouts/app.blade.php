<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Konserin')</title>

    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class=" bg-[#FDF0D5]">

    <!-- Navbar -->
    <div class="navbar bg-[#7A0000] text-white px-6">
        <div class="flex-1">
            <a class="text-2xl font-bold flex items-center gap-2" href="/">
                Konserin
            </a>
        </div>
        <div class="flex-none space-x-6 hidden md:flex">
            @guest
                <x-button label="Login" link="{{ route('login') }}" class="btn-ghost" />
                <x-button label="Sign Up" link="{{ route('register') }}" class="btn-ghost" />
            @endguest

            @auth
            <x-button label="Hubungi Kami" link="{{ route('hub') }}" class="btn-ghost"/>
            <x-button label="Home" link="{{ route('home') }}" class="btn-ghost"/>
            <livewire:auth.logout />
            @endauth
        </div>
    </div>

    <!-- Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="footer p-10 bg-[#7A0000] text-white mt-16 ">
        <div class="flex flex-wrap justify-between gap-40">
            <aside class="max-w-xs">
                <div class="flex items-center gap-2 mb-4">
                    <span class="text-xl font-bold">Konserin</span>
                </div>
                <p>
                    Konserin adalah platform pemesanan tiket konser yang memudahkan siapa saja untuk menemukan, membagikan, dan menghadiri berbagai acara musik yang menginspirasi serta menghadirkan pengalaman tak terlupakan.
                </p>
                <div class="flex space-x-4 mt-4">
                    <a href="#"><img src="/facebook.svg" alt="Facebook" class="h-6" /></a>
                    <a href="#"><img src="/twitter.svg" alt="Twitter" class="h-6" /></a>
                    <a href="#"><img src="/linkedin.svg" alt="LinkedIn" class="h-6" /></a>
                </div>
            </aside>
            
            <nav >
                <h6 class="footer-title">Menu</h6>
                <nav class="flex-none space-x-6 hidden md:flex">
                    <a class="link link-hover" href="/register">Register</a>
                    <a class="link link-hover" href="/">Home</a>
                    <a class="link link-hover" href="/hub">Hubungi Kami</a>
                </nav>
            </nav>
            
            <nav>
                <h6 class="footer-title">Get Connected</h6>
                <p>
                    Purbalingga, Jawa Tengah <br/>
                    Konserin@gmail.com <br/>
                    08381234589
                </p>
            </nav>
        </div>
    </footer>

    @livewireScripts
</body>
</html>
