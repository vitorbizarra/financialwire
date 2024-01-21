<?php

namespace App\Livewire\Web\Components;

use App\Enums\UserRoles;
use App\Livewire\Forms\ContactForm;
use App\Models\User;
use App\Notifications\ContactCreated;
use Illuminate\Support\Facades\Notification;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class Contact extends Component
{
    use Interactions;

    public ContactForm $form;

    public function save()
    {
        $contact = $this->form->store();

        $admins = User::where('role', UserRoles::Admin)->get();

        try {
            Notification::sendNow($admins, (new ContactCreated($contact)));
        } catch (\Exception) {
            $this->finishContact();
        }

        $this->finishContact();
    }

    private function finishContact(): void
    {
        $this->form->reset();
        $this->dialog()
            ->success('Sucesso!', 'Contato realizado com sucesso! Em breve entraremos em contato com você!')
            ->send();
    }
}
