<?php

namespace App\Http\Livewire\Perkhidmatan;

use App\Models\Perkhidmatan;
use Livewire\Component;

class Edit extends Component
{
    public Perkhidmatan $perkhidmatan;

    public function mount(Perkhidmatan $perkhidmatan)
    {
        $this->perkhidmatan = $perkhidmatan;
    }

    public function render()
    {
        return view('livewire.configuration.perkhidmatan.edit');
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
