<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class Index extends Component
{
   
    public function render()
    {
        $hallo = $this->id;
       
        return view('livewire.frontend.index');
    }
}
