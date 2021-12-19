<?php

namespace App\Http\Requests;

use App\Models\Perkhidmatan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdatePerkhidmatanRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('perkhidmatan_edit'),
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
            'bahagian' => [
                'string',
                'required',
            ],
        ];
    }
}