@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.masaTemuJanji.title_singular') }}:
                    {{ trans('cruds.masaTemuJanji.fields.id') }}
                    {{ $masaTemuJanji->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.masaTemuJanji.fields.id') }}
                            </th>
                            <td>
                                {{ $masaTemuJanji->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.masaTemuJanji.fields.masa') }}
                            </th>
                            <td>
                                {{ $masaTemuJanji->masa }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('masa_temu_janji_edit')
                    <a href="{{ route('admin.masa-temu-janjis.edit', $masaTemuJanji) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.masa-temu-janjis.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection