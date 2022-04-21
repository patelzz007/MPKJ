<?php

namespace App\Http\Livewire\Appointment\User;

use App\Models\Appointment;
use App\Models\Bahagian;
use App\Models\MasaTemuJanji;
use Livewire\Component;

class Edit extends Component
{
    public Appointment $appointment;

    public array $listsForFields = [
        "appointment_status" => [
            'Pending',
            'Approved',
            'Rejected',
        ],
    ];

    public function mount(Appointment $appointment)
    {
        $this->appointment = $appointment;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.appointment.user.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->appointment->save();

        return redirect()->route('user.appointments.index');
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
            'appointment.appointment_status' => [
                'string',
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
