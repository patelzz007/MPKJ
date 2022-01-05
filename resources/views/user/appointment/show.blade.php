@extends('layouts.user')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.appointment.title_singular') }}:
                    {{ trans('cruds.appointment.fields.id') }}
                    {{ $appointment->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.id') }}
                            </th>
                            <td>
                                {{ $appointment->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.appointment_date') }}
                            </th>
                            <td>
                                {{ $appointment->appointment_date }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.masa_temu_janji') }}
                            </th>
                            <td>
                                @if($appointment->masaTemuJanji)
                                    <span class="badge badge-relationship">{{ $appointment->masaTemuJanji->masa ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.name') }}
                            </th>
                            <td>
                                {{ $appointment->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $appointment->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $appointment->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.phone_number') }}
                            </th>
                            <td>
                                {{ $appointment->phone_number }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.alamat_1') }}
                            </th>
                            <td>
                                {{ $appointment->alamat_1 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.alamat_2') }}
                            </th>
                            <td>
                                {{ $appointment->alamat_2 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.alamat_3') }}
                            </th>
                            <td>
                                {{ $appointment->alamat_3 }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.postcode') }}
                            </th>
                            <td>
                                {{ $appointment->postcode }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.appointment.fields.bahagian') }}
                            </th>
                            <td>
                                @if($appointment->bahagian)
                                    <span class="badge badge-relationship">{{ $appointment->bahagian->bahagian ?? '' }}</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('appointment_edit')
                    <a href="{{ route('admin.appointments.edit', $appointment) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection