@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.bahagian.title_singular') }}:
                    {{ trans('cruds.bahagian.fields.id') }}
                    {{ $bahagian->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('bahagian.edit', [$bahagian])
        </div>
    </div>
</div>
@endsection