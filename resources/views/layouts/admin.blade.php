<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - {{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans antialiased">
    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-slate-900 text-white flex-shrink-0 flex flex-col">
            <div class="p-6 text-xl font-bold border-b border-slate-800">
                CORE MULTAZAM
            </div>
            <nav class="flex-1 p-4 space-y-2">
                <a href="{{ route('admin.dashboard') }}"
                    class="block p-3 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-blue-400' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.donations.index') }}"
                    class="block p-3 rounded-lg hover:bg-slate-800 {{ request()->routeIs('admin.donations.*') ? 'bg-slate-800 text-blue-400' : '' }}">
                    Donasi
                </a>

                <a href="#" class="block p-3 rounded-lg hover:bg-slate-800">Data Santri (PSB)</a>
            </nav>
            <div class="p-4 border-t border-slate-800">
                <form method="POST" action="/logout">
                    @csrf
                    <button type="submit"
                        class="w-full text-left p-3 hover:bg-red-900/30 text-red-400 rounded-lg">Logout</button>
                </form>
            </div>
        </aside>

        <main class="flex-1 overflow-y-auto p-8">
            {{ $slot }}
        </main>
    </div>
    @livewireScripts
</body>

</html>
