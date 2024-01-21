<?php

namespace App\Livewire\Forms;

use App\Enums\ContactStatus;
use App\Models\Contacts\Contact;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ContactForm extends Form
{
    #[Validate(['required', 'string', 'min:3', 'max:255'], as: 'nome')]
    public ?string $name;

    #[Validate(['required', 'email', 'max:255'])]
    public ?string $email;

    #[Validate(['required', 'string', 'min:3', 'max:255'], 'assunto')]
    public ?string $subject;

    #[Validate(['required', 'string', 'min:3', 'max:255'], 'mensagem')]
    public ?string $message;

    public ContactStatus $status = ContactStatus::New;

    public function store(): Contact
    {
        $this->validate();

        $contact = Contact::create($this->all());

        return $contact;
    }
}
