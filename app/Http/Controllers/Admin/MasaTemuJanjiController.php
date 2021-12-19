<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasaTemuJanji;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MasaTemuJanjiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('masa_temu_janji_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masa-temu-janji.index');
    }

    public function create()
    {
        abort_if(Gate::denies('masa_temu_janji_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masa-temu-janji.create');
    }

    public function edit(MasaTemuJanji $masaTemuJanji)
    {
        abort_if(Gate::denies('masa_temu_janji_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masa-temu-janji.edit', compact('masaTemuJanji'));
    }

    public function show(MasaTemuJanji $masaTemuJanji)
    {
        abort_if(Gate::denies('masa_temu_janji_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.masa-temu-janji.show', compact('masaTemuJanji'));
    }
}
