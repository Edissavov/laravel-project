<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactPage extends Component
{
    public $names;
    public $email;

    public function submit()
    {
        $this->validate([
            'names' => 'required|min:2',
        ]);

        Contact::create([
            'names' => $this->names,
            'email' => $this->email
        ]);

        return $this->redirect(route('blog.index'));
    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}
