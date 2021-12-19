<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('perkhidmatan.bahagian') ? 'invalid' : '' }}">
        <label class="form-label required" for="bahagian">{{ trans('cruds.perkhidmatan.fields.bahagian') }}</label>
        <input class="form-control" type="text" name="bahagian" id="bahagian" required wire:model.defer="perkhidmatan.bahagian">
        <div class="validation-message">
            {{ $errors->first('perkhidmatan.bahagian') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.perkhidmatan.fields.bahagian_helper') }}
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