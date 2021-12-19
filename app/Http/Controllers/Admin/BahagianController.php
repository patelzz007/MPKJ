<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bahagian;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BahagianController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bahagian_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bahagian.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bahagian_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bahagian.create');
    }

    public function edit(Bahagian $bahagian)
    {
        abort_if(Gate::denies('bahagian_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bahagian.edit', compact('bahagian'));
    }

    public function show(Bahagian $bahagian)
    {
        abort_if(Gate::denies('bahagian_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bahagian.show', compact('bahagian'));
    }
}
