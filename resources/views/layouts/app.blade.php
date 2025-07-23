<!DOCTYPE html>
<html lang="fr" theme="pro">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LarappeUI</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans min-h-screen flex flex-col">
    <!-- Header -->
    <header class="w-full bg-white shadow-sm py-4 px-6 flex items-center justify-between">
        <div class="flex items-center gap-3">
            <span class="text-xl font-bold text-blue-600">LarappeUI</span>
            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-0.5 rounded">for Laravel</span>
        </div>
        <nav class="flex gap-6 text-sm">
            <a href="#components" class="hover:text-blue-600">Composants</a>
            <a href="#install" class="hover:text-blue-600">Installation</a>
            <a href="https://github.com/martin-lechene/LarappeUI" target="_blank" class="hover:text-blue-600">Github</a>
        </nav>
        <div class="flex items-center gap-2 bg-blue-50 border border-blue-200 rounded-lg px-3 py-1 shadow-sm ml-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m8.66-13.66l-.71.71M4.05 19.07l-.71.71M21 12h-1M4 12H3m16.66 5.66l-.71-.71M4.05 4.93l-.71-.71M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            <label for="theme-select" class="sr-only">Thème</label>
            <select id="theme-select" class="border-none bg-transparent focus:ring-2 focus:ring-blue-400 rounded px-2 py-1 text-sm font-medium text-blue-700 hover:bg-blue-100 transition">
                <option value="pro">Pro (FrappeUI)</option>
                <option value="light">Light</option>
                <option value="dark">Dark</option>
                <option value="glass">Glass</option>
                <option value="forest">Forest</option>
                <option value="sea">Sea</option>
                <option value="summer">Summer</option>
                <option value="2d">2D</option>
            </select>
        </div>
        <style>
            [theme="pro"] { --tw-bg-opacity: 1; background-color: #f8fafc; color: #1e293b; }
            [theme="light"] { background-color: #fff; color: #111827; }
            [theme="dark"] { background-color: #18181b; color: #f3f4f6; }
            [theme="glass"] { background: rgba(255,255,255,0.6); color: #374151; backdrop-filter: blur(8px); }
            [theme="forest"] { background-color: #f0fdf4; color: #14532d; }
            [theme="sea"] { background-color: #e0f2fe; color: #0c4a6e; }
            [theme="summer"] { background-color: #fff7ed; color: #78350f; }
            [theme="2d"] { background-color: #f1f5f9; color: #0f172a; }
            html[theme] { transition: background 0.3s, color 0.3s; }
        </style>
    </header>
    <!-- Hero -->
    <section class="bg-blue-50 py-12 px-4 text-center border-b border-blue-100">
        <h1 class="text-4xl font-bold mb-2 text-blue-700">LarappeUI</h1>
        <p class="text-lg text-blue-900 mb-6">Une collection de composants UI inspirés de FrappeUI pour Laravel 12+ & TailwindCSS</p>
        <a href="#install" class="inline-block bg-blue-600 text-white px-6 py-2 rounded shadow hover:bg-blue-700 transition">Installer maintenant</a>
    </section>
    <!-- Main Content -->
    <main class="flex-1 w-full max-w-7xl mx-auto py-10 px-4">
        @yield('content')
    </main>
    <!-- Footer -->
    <footer class="w-full bg-white border-t border-gray-200 py-6 mt-10 text-center text-sm text-gray-500">
        <div class="mb-2">
            <a href="https://github.com/martin-lechene/LarappeUI" target="_blank" class="hover:text-blue-600 underline">Github</a> |
            <a href="https://linkedin.com/in/martin-lechene/" target="_blank" class="hover:text-blue-600 underline">LinkedIn</a>
        </div>
        <div>&copy; {{ date('Y') }} LarappeUI. Inspiré par <a href="https://ui.frappe.io/" class="underline hover:text-blue-600" target="_blank">FrappeUI</a>.</div>
    </footer>
</body>
</html> 