@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.perkhidmatan.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('perkhidmatan_create')
                    <a class="btn btn-indigo" href="{{ route('admin.perkhidmatans.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.perkhidmatan.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('perkhidmatan.index')

    </div>
</div>
@endsection