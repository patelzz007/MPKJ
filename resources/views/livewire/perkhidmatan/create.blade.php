<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('perkhidmatan.jenis') ? 'invalid' : '' }}">
        <label class="form-label required" for="jenis">{{ trans('cruds.perkhidmatan.fields.jenis') }}</label>
        <input class="form-control" type="text" name="jenis" id="jenis" required wire:model.defer="perkhidmatan.jenis">
        <div class="validation-message">
            {{ $errors->first('perkhidmatan.jenis') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perkhidmatan.fields.jenis_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.perkhidmatans.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>