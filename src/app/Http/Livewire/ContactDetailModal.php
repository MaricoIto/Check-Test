<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactDetailModal extends Component
{
    public $contact;
    public $showModal = false;

    protected $listeners = ['showContactDetail'];

    public function showContactDetail($contactId)
    {
        $this->contact = Contact::find($contactId);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function render()
    {
        return view('livewire.contact-detail-modal');
    }
}
