@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.masaTemuJanji.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('masa_temu_janji_create')
                    <a class="btn btn-indigo" href="{{ route('admin.masa-temu-janjis.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.masaTemuJanji.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        @livewire('masa-temu-janji.index')

    </div>
</div>
@endsection