<div class="p-6">
    @if (session()->has('message'))
        <div class="mb-4 p-4 bg-emerald-100 text-emerald-700 rounded-xl border border-emerald-200">
            {{ session('message') }}
        </div>
    @endif

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold text-slate-800">Manajemen Donasi</h1>
            <p class="text-sm text-slate-500">Daftar seluruh kontribusi donatur yang masuk.</p>
        </div>
        <button wire:click="openModal"
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
                    <th class="p-4 font-semibold text-slate-700 text-center">Aksi</th>
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
                        <td class="p-4 text-center">
                            <div class="flex justify-center gap-2">
                                <button wire:click="edit({{ $donation->id }})"
                                    class="p-2 bg-amber-50 text-amber-600 rounded-lg hover:bg-amber-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>

                                <button
                                    onclick="confirm('Yakin ingin menghapus data donasi ini?') || event.stopImmediatePropagation()"
                                    wire:click="delete({{ $donation->id }})"
                                    class="p-2 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-12 text-center text-slate-400 italic">
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

    @if ($isModalOpen)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-slate-900/50 backdrop-blur-sm">
            <div class="bg-white w-full max-w-md rounded-2xl shadow-2xl p-6 relative">
                <h3 class="text-xl font-bold text-slate-800 mb-4">
                    {{ $selectedDonationId ? 'Edit Donasi' : 'Catat Donasi Baru' }}
                </h3>

                <form wire:submit.prevent="store">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-slate-700">Nominal (Rp)</label>
                            <input type="number" wire:model="amount"
                                class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none @error('amount') border-red-500 @enderror"
                                placeholder="Contoh: 50000">
                            @error('amount')
                                <span class="text-red-500 text-xs">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Metode Pembayaran</label>
                            <select wire:model="payment_method"
                                class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none text-slate-600">
                                <option value="manual_transfer">Transfer Bank</option>
                                <option value="cash">Tunai (Cash)</option>
                                <option value="qris">QRIS</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-slate-700">Catatan (Opsional)</label>
                            <textarea wire:model="note" class="w-full mt-1 p-3 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"
                                rows="3" placeholder="Contoh: Hamba Allah"></textarea>
                        </div>
                    </div>

                    <div class="flex gap-3 mt-6">
                        <button type="button" wire:click="closeModal"
                            class="flex-1 px-4 py-2 border rounded-xl text-slate-600 hover:bg-slate-50 transition font-semibold">
                            Batal
                        </button>
                        <button type="submit"
                            class="flex-1 px-4 py-2 bg-blue-600 text-white rounded-xl hover:bg-blue-700 transition font-semibold">
                            {{ $selectedDonationId ? 'Update Donasi' : 'Simpan Donasi' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
