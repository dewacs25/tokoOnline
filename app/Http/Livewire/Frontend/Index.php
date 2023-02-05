<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Toko;
use Livewire\Component;

class Index extends Component
{
   
    public function render()
    {
        $t = Toko::where('id_toko','1')->get()->first();


        return view('livewire.frontend.index',['t'=>$t]);
    }
}
