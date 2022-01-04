<div class="flex ">
    <form wire:submit.prevent="submit" class="pt-3 w-full">


            <div class="form-group {{ $errors->has('appointment.appointment_date') ? 'invalid' : '' }}">
                <label class="form-label required" for="appointment_date">{{ trans('cruds.appointment.fields.appointment_date') }}</label>
                <x-date-picker class="form-control" required wire:model="appointment.appointment_date" id="appointment_date" name="appointment_date" picker="date" />
                <div class="validation-message">
                    {{ $errors->first('appointment.appointment_date') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.appointment_date_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.masa_temu_janji_id') ? 'invalid' : '' }}">
                <label class="form-label required" for="masa_temu_janji">{{ trans('cruds.appointment.fields.masa_temu_janji') }}</label>
                <x-select-list class="form-control" required id="masa_temu_janji" name="masa_temu_janji" :options="$this->listsForFields['masa_temu_janji']" wire:model="appointment.masa_temu_janji_id" />
                <div class="validation-message">
                    {{ $errors->first('appointment.masa_temu_janji_id') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.masa_temu_janji_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.name') ? 'invalid' : '' }}">
                <label class="form-label required" for="name">{{ trans('cruds.appointment.fields.name') }}</label>
                <input class="form-control" type="text" name="name" id="name" required wire:model.defer="appointment.name">
                <div class="validation-message">
                    {{ $errors->first('appointment.name') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.name_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.email') ? 'invalid' : '' }}">
                <label class="form-label required" for="email">{{ trans('cruds.appointment.fields.email') }}</label>
                <input class="form-control" type="email" name="email" id="email" required wire:model.defer="appointment.email">
                <div class="validation-message">
                    {{ $errors->first('appointment.email') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.email_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.phone_number') ? 'invalid' : '' }}">
                <label class="form-label required" for="phone_number">{{ trans('cruds.appointment.fields.phone_number') }}</label>
                <input class="form-control" type="text" name="phone_number" id="phone_number" required wire:model.defer="appointment.phone_number">
                <div class="validation-message">
                    {{ $errors->first('appointment.phone_number') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.phone_number_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.alamat_1') ? 'invalid' : '' }}">
                <label class="form-label required" for="alamat_1">{{ trans('cruds.appointment.fields.alamat_1') }}</label>
                <input class="form-control" type="text" name="alamat_1" id="alamat_1" required wire:model.defer="appointment.alamat_1">
                <div class="validation-message">
                    {{ $errors->first('appointment.alamat_1') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.alamat_1_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.alamat_2') ? 'invalid' : '' }}">
                <label class="form-label" for="alamat_2">{{ trans('cruds.appointment.fields.alamat_2') }}</label>
                <input class="form-control" type="text" name="alamat_2" id="alamat_2" wire:model.defer="appointment.alamat_2">
                <div class="validation-message">
                    {{ $errors->first('appointment.alamat_2') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.alamat_2_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.alamat_3') ? 'invalid' : '' }}">
                <label class="form-label" for="alamat_3">{{ trans('cruds.appointment.fields.alamat_3') }}</label>
                <input class="form-control" type="text" name="alamat_3" id="alamat_3" wire:model.defer="appointment.alamat_3">
                <div class="validation-message">
                    {{ $errors->first('appointment.alamat_3') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.alamat_3_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.postcode') ? 'invalid' : '' }}">
                <label class="form-label required" for="postcode">{{ trans('cruds.appointment.fields.postcode') }}</label>
                <input class="form-control" type="text" name="postcode" id="postcode" required wire:model.defer="appointment.postcode">
                <div class="validation-message">
                    {{ $errors->first('appointment.postcode') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.postcode_helper') }}
                </div>
            </div>
            <div class="form-group {{ $errors->has('appointment.bahagian_id') ? 'invalid' : '' }}">
                <label class="form-label required" for="bahagian">{{ trans('cruds.appointment.fields.bahagian') }}</label>
                <x-select-list class="form-control" required id="bahagian" name="bahagian" :options="$this->listsForFields['bahagian']" wire:model="appointment.bahagian_id" />
                <div class="validation-message">
                    {{ $errors->first('appointment.bahagian_id') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.appointment.fields.bahagian_helper') }}
                </div>
            </div>


        <div class="form-group">
            <button class="btn btn-indigo mr-2" type="submit">
                {{ trans('global.save') }}
            </button>
            <a href="{{ route('admin.appointments.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>
    </form>
</div>