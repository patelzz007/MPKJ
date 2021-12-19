<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perkhidmatan;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PerkhidmatanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('perkhidmatan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perkhidmatan.index');
    }

    public function create()
    {
        abort_if(Gate::denies('perkhidmatan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perkhidmatan.create');
    }

    public function edit(Perkhidmatan $perkhidmatan)
    {
        abort_if(Gate::denies('perkhidmatan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perkhidmatan.edit', compact('perkhidmatan'));
    }

    public function show(Perkhidmatan $perkhidmatan)
    {
        abort_if(Gate::denies('perkhidmatan_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.perkhidmatan.show', compact('perkhidmatan'));
    }
}
