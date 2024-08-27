<?php

namespace App\Http\Livewire;

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Contact;

class ContactDetailModal extends Component
{
    public $contact;
    public $isOpen = false;

    protected $listeners = ['showContactDetail' => 'open'];

    public function open($contactId)
    {
        dd('Event triggered with contact ID: ' . $contactId);
        $this->contact = Contact::findOrFail($contactId);
        $this->isOpen = true;
    }

    public function close()
    {
        $this->isOpen = false;
    }

    public function render()
    {
        return view('livewire.contact-detail-modal');
    }
}
