<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('bahagian.bahagian') ? 'invalid' : '' }}">
        <label class="form-label required" for="bahagian">{{ trans('cruds.bahagian.fields.bahagian') }}</label>
        <input class="form-control" type="text" name="bahagian" id="bahagian" required wire:model.defer="bahagian.bahagian">
        <div class="validation-message">
            {{ $errors->first('bahagian.bahagian') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.bahagian.fields.bahagian_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.bahagians.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>