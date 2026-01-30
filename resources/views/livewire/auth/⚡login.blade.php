<div class="min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
        <h2 class="text-2xl font-bold text-center text-slate-800">Masuk ke Sistem</h2>
        <p class="text-center text-slate-500 mb-8">Gunakan akun admin atau donatur Anda</p>

        <form wire:submit="login" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-slate-700">Email</label>
                <input type="email" wire:model="email"
                    class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700">Password</label>
                <input type="password" wire:model="password"
                    class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <button type="submit"
                class="w-full bg-slate-900 text-white p-3 rounded-xl font-semibold hover:bg-slate-800 transition">
                Masuk Sekarang
            </button>
        </form>
    </div>
</div>
