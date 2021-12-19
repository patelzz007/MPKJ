<?php

namespace App\Http\Livewire\MasaTemuJanji;

use App\Models\MasaTemuJanji;
use Livewire\Component;

class Create extends Component
{
    public MasaTemuJanji $masaTemuJanji;

    public function mount(MasaTemuJanji $masaTemuJanji)
    {
        $this->masaTemuJanji = $masaTemuJanji;
    }

    public function render()
    {
        return view('livewire.masa-temu-janji.create');
    }

    public function submit()
    {
        $this->validate();

        $this->masaTemuJanji->save();

        return redirect()->route('admin.masa-temu-janjis.index');
    }

    protected function rules(): array
    {
        return [
            'masaTemuJanji.masa' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
        ];
    }
}
