<?php

namespace App\Http\Requests;

use App\Models\Sesi;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSesiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('sesi_create'),
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
            'sesi' => [
                'nullable',
                'date_format:' . config('project.time_format'),
            ],
        ];
    }
}
