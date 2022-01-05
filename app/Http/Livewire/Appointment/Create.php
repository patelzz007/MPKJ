<?php

namespace App\Http\Livewire\Appointment;

use Auth;
use App\Models\Appointment;
use App\Models\Bahagian;
use App\Models\MasaTemuJanji;
use Livewire\Component;
use App\User;
use App\Models\RoleUser;


class Create extends Component
{
    public Appointment $appointment;
    public array $listsForFields = [];

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.appointment.create');
    }

    public function submit()
    {
        $this->validate();
        $user = auth()->user();
        $role = RoleUser::where('user_id', auth()->user()->id)->first();
        // $data = $this->appointment->all();
        // $data['user_id'] = $user->id;
        //dd($user);
        $this->appointment->user_id = $user->id;
        $this->appointment->save();

        return redirect()->route('admin.appointments.index');
    }

    protected function rules(): array
    {
        return [
            'appointment.appointment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'appointment.masa_temu_janji_id' => [
                'integer',
                'exists:masa_temu_janjis,id',
                'required',
            ],
            'appointment.name' => [
                'string',
                'required',
            ],
            'appointment.email' => [
                'email:rfc',
                'required',
            ],
            'appointment.phone_number' => [
                'string',
                'required',
            ],
            'appointment.alamat_1' => [
                'string',
                'required',
            ],
            'appointment.alamat_2' => [
                'string',
                'nullable',
            ],
            'appointment.alamat_3' => [
                'string',
                'nullable',
            ],
            'appointment.postcode' => [
                'string',
                'required',
            ],
            'appointment.bahagian_id' => [
                'integer',
                'exists:bahagians,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['masa_temu_janji'] = MasaTemuJanji::pluck('masa', 'id')->toArray();
        $this->listsForFields['bahagian']        = Bahagian::pluck('bahagian', 'id')->toArray();
    }
}
