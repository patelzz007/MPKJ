<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMasaTemuJanjiRequest;
use App\Http\Requests\UpdateMasaTemuJanjiRequest;
use App\Http\Resources\Admin\MasaTemuJanjiResource;
use App\Models\MasaTemuJanji;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MasaTemuJanjiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('masa_temu_janji_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasaTemuJanjiResource(MasaTemuJanji::all());
    }

    public function store(StoreMasaTemuJanjiRequest $request)
    {
        $masaTemuJanji = MasaTemuJanji::create($request->validated());

        return (new MasaTemuJanjiResource($masaTemuJanji))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(MasaTemuJanji $masaTemuJanji)
    {
        abort_if(Gate::denies('masa_temu_janji_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new MasaTemuJanjiResource($masaTemuJanji);
    }

    public function update(UpdateMasaTemuJanjiRequest $request, MasaTemuJanji $masaTemuJanji)
    {
        $masaTemuJanji->update($request->validated());

        return (new MasaTemuJanjiResource($masaTemuJanji))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(MasaTemuJanji $masaTemuJanji)
    {
        abort_if(Gate::denies('masa_temu_janji_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $masaTemuJanji->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
