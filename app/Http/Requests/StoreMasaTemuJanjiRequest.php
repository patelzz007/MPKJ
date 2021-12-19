<?php

namespace App\Http\Requests;

use App\Models\MasaTemuJanji;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMasaTemuJanjiRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(
            Gate::denies('masa_temu_janji_create'),
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
            'masa' => [
                'required',
                'date_format:' . config('project.time_format'),
            ],
        ];
    }
}
