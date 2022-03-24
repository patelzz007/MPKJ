<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('appointment_delete')
            <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                {{ __('Delete Selected') }}
            </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
            <livewire:excel-export model="Appointment" format="csv" />
            <livewire:excel-export model="Appointment" format="xlsx" />
            <livewire:excel-export model="Appointment" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.appointment.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.appointment_date') }}
                            @include('components.table.sort', ['field' => 'appointment_date'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.masa_temu_janji') }}
                            @include('components.table.sort', ['field' => 'masa_temu_janji.masa'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.phone_number') }}
                            @include('components.table.sort', ['field' => 'phone_number'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.alamat_1') }}
                            @include('components.table.sort', ['field' => 'alamat_1'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.alamat_2') }}
                            @include('components.table.sort', ['field' => 'alamat_2'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.alamat_3') }}
                            @include('components.table.sort', ['field' => 'alamat_3'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.postcode') }}
                            @include('components.table.sort', ['field' => 'postcode'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.bahagian') }}
                            @include('components.table.sort', ['field' => 'bahagian.bahagian'])
                        </th>
                        <th>
                            {{ trans('cruds.appointment.fields.appointment_status') }}
                            @include('components.table.sort', ['field' => 'appointment_status'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr>
                        <td>
                            <input type="checkbox" value="{{ $appointment->id }}" wire:model="selected">
                        </td>
                        <td>
                            {{ $appointment->id }}
                        </td>
                        <td>
                            {{ $appointment->appointment_date }}
                        </td>
                        <td>
                            @if($appointment->masaTemuJanji)
                            <span class="badge badge-relationship">{{ $appointment->masaTemuJanji->masa ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            {{ $appointment->name }}
                        </td>
                        <td>
                            <a class="link-light-blue" href="mailto:{{ $appointment->email }}">
                                <i class="far fa-envelope fa-fw">
                                </i>
                                {{ $appointment->email }}
                            </a>
                        </td>
                        <td>
                            {{ $appointment->phone_number }}
                        </td>
                        <td>
                            {{ $appointment->alamat_1 }}
                        </td>
                        <td>
                            {{ $appointment->alamat_2 }}
                        </td>
                        <td>
                            {{ $appointment->alamat_3 }}
                        </td>
                        <td>
                            {{ $appointment->postcode }}
                        </td>
                        <td>
                            @if($appointment->bahagian)
                            <span class="badge badge-relationship">{{ $appointment->bahagian->bahagian ?? '' }}</span>
                            @endif
                        </td>
                        <td>
                            @if($appointment->appointment_status=="0")
                            <span class="badge badge-pending">Pending</span>
                            @endif
                            @if($appointment->appointment_status=="1")
                            <span class="badge badge-approved">Approved</span>
                            @endif
                            @if($appointment->appointment_status=="2")
                            <span class="badge badge-rejected">Rejected</span>
                            @endif
                        </td>
                        <td>
                            <div class="flex justify-end">
                                @can('appointment_show')
                                <a class="btn btn-sm btn-info mr-2" href="{{ route('user.appointments.show', $appointment) }}">
                                    {{ trans('global.view') }}
                                </a>
                                @endcan
                                @can('appointment_edit')
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('user.appointments.edit', $appointment) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                @endcan
                                @can('appointment_delete')
                                <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $appointment->id }})" wire:loading.attr="disabled">
                                    {{ trans('global.delete') }}
                                </button>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10">No entries found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
            <p class="text-sm leading-5">
                <span class="font-medium">
                    {{ $this->selectedCount }}
                </span>
                {{ __('Entries selected') }}
            </p>
            @endif
            {{ $appointments->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    Livewire.on('confirm', e => {
        if (!confirm("{{ trans('global.areYouSure') }}")) {
            return
        }
        @this[e.callback](...e.argv)
    })
</script>
@endpush