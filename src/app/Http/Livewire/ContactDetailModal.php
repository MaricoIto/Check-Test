<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;
use Illuminate\Support\Facades\Log; // Logクラスをインポート

class ContactDetailModal extends Component
{
    public $contact;
    public $isOpen = false;

    protected $listeners = [
        'showContactDetail' => 'openModal'
    ];

    public function openModal($contactId)
    {
        \Log::info('openModal called with contactId: ' . $contactId);
        $this->contact = Contact::find($contactId);

        if ($this->contact) {
            \Log::info('Contact found: ', $this->contact->toArray());
        } else {
            \Log::error('Contact not found with ID: ' . $contactId);
            $this->isOpen = false; // モーダルを開かないようにする
            return;
        }

        $this->isOpen = true;
    }

    public function closeModal()
    {
        Log::info('closeModal called');
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.contact-detail-modal');
    }
}
