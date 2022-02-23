@extends('layouts.user')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.appointment.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('appointment_create')
                    <a class="btn btn-indigo" href="{{ route('user.appointments.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.appointment.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('appointment.user.index')

    </div>
</div>
@endsection