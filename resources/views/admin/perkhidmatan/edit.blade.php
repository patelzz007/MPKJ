@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.perkhidmatan.title_singular') }}:
                    {{ trans('cruds.perkhidmatan.fields.id') }}
                    {{ $perkhidmatan->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('perkhidmatan.edit', [$perkhidmatan])
        </div>
    </div>
</div>
@endsection