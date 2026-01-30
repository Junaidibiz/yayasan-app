<?php

namespace App\Livewire\Admin\Donation;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Str;

#[Layout('layouts.admin')]
#[Title('Kelola Donasi - Core Multazam')]
class Index extends Component
{
    use WithPagination;

    // Properti Form
    public $amount, $payment_method = 'manual_transfer', $note;
    public $isModalOpen = false;
    public $selectedDonationId = null; // Menandai ID saat mode Edit

    protected $rules = [
        'amount' => 'required|numeric|min:1000',
        'payment_method' => 'required',
        'note' => 'nullable|string',
    ];

    public function openModal() {
        $this->resetInputFields();
        $this->isModalOpen = true;
    }

    public function closeModal() {
        $this->isModalOpen = false;
        $this->resetInputFields();
    }

    private function resetInputFields() {
        $this->amount = '';
        $this->payment_method = 'manual_transfer';
        $this->note = '';
        $this->selectedDonationId = null;
    }

    // Fungsi untuk memicu mode Edit
    public function edit($id) {
        $donation = Donation::findOrFail($id);
        $this->selectedDonationId = $id;
        $this->amount = $donation->amount;
        $this->payment_method = $donation->payment_method;
        $this->note = $donation->note;
        $this->isModalOpen = true;
    }

    // Fungsi untuk menghapus data
    public function delete($id) {
        Donation::findOrFail($id)->delete();
        session()->flash('message', 'Data donasi berhasil dihapus.');
    }

    public function store() {
        $this->validate();

        if ($this->selectedDonationId) {
            // Logika UPDATE
            $donation = Donation::find($this->selectedDonationId);
            $donation->update([
                'amount' => $this->amount,
                'payment_method' => $this->payment_method,
                'note' => $this->note,
            ]);
            session()->flash('message', 'Donasi berhasil diperbarui!');
        } else {
            // Logika CREATE
            Donation::create([
                'invoice_number' => 'INV-' . strtoupper(Str::random(8)),
                'amount' => $this->amount,
                'payment_method' => $this->payment_method,
                'note' => $this->note,
                'status' => 'confirmed', 
                'confirmed_at' => now(),
            ]);
            session()->flash('message', 'Donasi baru berhasil dicatat!');
        }

        $this->closeModal();
    }

    public function render() {
        return view('livewire.admin.donation.index', [
            'donations' => Donation::latest()->paginate(10)
        ]);
    }
}