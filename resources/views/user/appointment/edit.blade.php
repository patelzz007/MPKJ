@extends('layouts.user')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.appointment.title_singular') }}:
                    {{ trans('cruds.appointment.fields.id') }}
                    {{ $appointment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('appointment.user.edit', [$appointment])
        </div>
    </div>
</div>
@endsection