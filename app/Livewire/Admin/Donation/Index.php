<?php

namespace App\Livewire\Admin\Donation;

use App\Models\Donation;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.admin')] // Menggunakan layout admin yang sudah dibuat
#[Title('Kelola Donasi - Core Multazam')]
class Index extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.admin.donation.index', [
            'donations' => Donation::with('user')->latest()->paginate(10)
        ]);
    }
}