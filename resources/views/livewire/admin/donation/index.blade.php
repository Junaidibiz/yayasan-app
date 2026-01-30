<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Donasi</h1>
            <p class="text-sm text-slate-500">Daftar seluruh kontribusi donatur yang masuk.</p>
        </div>
        <button
            class="bg-blue-600 text-white px-5 py-2.5 rounded-xl font-semibold hover:bg-blue-700 transition shadow-sm">
            + Tambah Donasi
        </button>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <table class="w-full text-left">
            <thead class="bg-slate-50 border-b border-slate-200">
                <tr>
                    <th class="p-4 font-semibold text-slate-700">No. Invoice</th>
                    <th class="p-4 font-semibold text-slate-700">Donatur</th>
                    <th class="p-4 font-semibold text-slate-700">Nominal</th>
                    <th class="p-4 font-semibold text-slate-700">Status</th>
                    <th class="p-4 font-semibold text-slate-700">Tanggal</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($donations as $donation)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 font-mono text-sm text-slate-600">{{ $donation->invoice_number }}</td>
                        <td class="p-4">
                            <span class="font-medium text-slate-800">{{ $donation->user->name ?? 'Anonim' }}</span>
                        </td>
                        <td class="p-4 text-emerald-600 font-bold">
                            Rp {{ number_format($donation->amount, 0, ',', '.') }}
                        </td>
                        <td class="p-4">
                            @if ($donation->status === 'confirmed')
                                <span
                                    class="bg-emerald-100 text-emerald-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Confirmed</span>
                            @else
                                <span
                                    class="bg-amber-100 text-amber-700 px-3 py-1 rounded-full text-xs font-bold uppercase">Pending</span>
                            @endif
                        </td>
                        <td class="p-4 text-slate-500 text-sm">
                            {{ $donation->created_at->format('d M Y H:i') }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-12 text-center text-slate-400 italic">
                            Belum ada data donasi tercatat.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="p-4 border-t border-slate-100">
            {{ $donations->links() }}
        </div>
    </div>
</div>
