<?php

namespace App\Http\Livewire\Bahagian;

use App\Models\Bahagian;
use Livewire\Component;

class Create extends Component
{
    public Bahagian $bahagian;

    public function mount(Bahagian $bahagian)
    {
        $this->bahagian = $bahagian;
    }

    public function render()
    {
        return view('livewire.bahagian.create');
    }

    public function submit()
    {
        $this->validate();

        $this->bahagian->save();

        return redirect()->route('admin.bahagians.index');
    }

    protected function rules(): array
    {
        return [
            'bahagian.bahagian' => [
                'string',
                'required',
            ],
        ];
    }
}