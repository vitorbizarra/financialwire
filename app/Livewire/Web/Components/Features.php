<?php

namespace App\Livewire\Web\Components;

use App\Models\Content\Feature;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class Features extends Component
{
    public Collection $features;

    public function mount()
    {
        $this->features = Feature::orderBy('sort')->get();
    }
}
