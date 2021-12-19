<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePerkhidmatanRequest;
use App\Http\Requests\UpdatePerkhidmatanRequest;
use App\Http\Resources\Admin\PerkhidmatanResource;
use App\Models\Perkhidmatan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerkhidmatanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perkhidmatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerkhidmatanResource(Perkhidmatan::all());
    }

    public function store(StorePerkhidmatanRequest $request)
    {
        $perkhidmatan = Perkhidmatan::create($request->validated());

        return (new PerkhidmatanResource($perkhidmatan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Perkhidmatan $perkhidmatan)
    {
        abort_if(Gate::denies('perkhidmatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PerkhidmatanResource($perkhidmatan);
    }

    public function update(UpdatePerkhidmatanRequest $request, Perkhidmatan $perkhidmatan)
    {
        $perkhidmatan->update($request->validated());

        return (new PerkhidmatanResource($perkhidmatan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Perkhidmatan $perkhidmatan)
    {
        abort_if(Gate::denies('perkhidmatan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $perkhidmatan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
