@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.perkhidmatan.title_singular') }}:
                    {{ trans('cruds.perkhidmatan.fields.id') }}
                    {{ $perkhidmatan->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.perkhidmatan.fields.id') }}
                            </th>
                            <td>
                                {{ $perkhidmatan->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.perkhidmatan.fields.jenis') }}
                            </th>
                            <td>
                                {{ $perkhidmatan->jenis }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('perkhidmatan_edit')
                    <a href="{{ route('admin.perkhidmatans.edit', $perkhidmatan) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.perkhidmatans.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection