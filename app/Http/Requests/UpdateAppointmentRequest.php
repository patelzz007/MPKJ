<?php

namespace App\Http\Requests;

use App\Models\Appointment;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateAppointmentRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('appointment_edit'),
            response()->json(
                ['message' => 'This action is unauthorized.'],
                Response::HTTP_FORBIDDEN
            ),
        );

        return true;
    }

    public function rules(): array
    {
        return [
            'appointment_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'masa_temu_janji_id' => [
                'integer',
                'exists:masa_temu_janjis,id',
                'required',
            ],
            'name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'email:rfc',
                'required',
            ],
            'phone_number' => [
                'string',
                'required',
            ],
            'alamat_1' => [
                'string',
                'required',
            ],
            'alamat_2' => [
                'string',
                'nullable',
            ],
            'alamat_3' => [
                'string',
                'nullable',
            ],
            'postcode' => [
                'string',
                'nullable',
            ],
            'bahagian_id' => [
                'integer',
                'exists:bahagians,id',
                'required',
            ],
        ];
    }
}
