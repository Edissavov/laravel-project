<?php

namespace App\Livewire;

use Livewire\Component;

class ContactPage extends Component
{

    public $names;
    public $email;

    public function submit(){
        $this->validate([ 
            'names' => 'required|min:2',
        ]);

        

        dd($this->names , $this->email);
    }

    public function render()
    {
        return view('livewire.contact-page');
    }
}
