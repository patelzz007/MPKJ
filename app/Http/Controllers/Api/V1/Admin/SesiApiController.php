<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSesiRequest;
use App\Http\Requests\UpdateSesiRequest;
use App\Http\Resources\Admin\SesiResource;
use App\Models\Sesi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SesiApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sesi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SesiResource(Sesi::all());
    }

    public function store(StoreSesiRequest $request)
    {
        $sesi = Sesi::create($request->validated());

        return (new SesiResource($sesi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Sesi $sesi)
    {
        abort_if(Gate::denies('sesi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new SesiResource($sesi);
    }

    public function update(UpdateSesiRequest $request, Sesi $sesi)
    {
        $sesi->update($request->validated());

        return (new SesiResource($sesi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Sesi $sesi)
    {
        abort_if(Gate::denies('sesi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sesi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
