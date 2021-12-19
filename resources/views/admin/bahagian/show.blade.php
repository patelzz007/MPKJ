@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.bahagian.title_singular') }}:
                    {{ trans('cruds.bahagian.fields.id') }}
                    {{ $bahagian->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.bahagian.fields.id') }}
                            </th>
                            <td>
                                {{ $bahagian->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.bahagian.fields.bahagian') }}
                            </th>
                            <td>
                                {{ $bahagian->bahagian }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('bahagian_edit')
                    <a href="{{ route('admin.bahagians.edit', $bahagian) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.bahagians.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection