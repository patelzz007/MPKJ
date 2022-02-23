<?php

namespace App\Http\Livewire\Perkhidmatan;

use App\Models\Perkhidmatan;
use Livewire\Component;

class Create extends Component
{
    public Perkhidmatan $perkhidmatan;

    public function mount(Perkhidmatan $perkhidmatan)
    {
        $this->perkhidmatan = $perkhidmatan;
    }

    public function render()
    {
        return view('livewire.configuration.perkhidmatan.create');
    }

    public function submit()
    {
        $this->validate();

        $this->perkhidmatan->save();

        return redirect()->route('admin.configuration.perkhidmatans.index');
    }

    protected function rules(): array
    {
        return [
            'perkhidmatan.jenis' => [
                'string',
                'required',
            ],
        ];
    }
}
