<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('masaTemuJanji.masa') ? 'invalid' : '' }}">
        <label class="form-label required" for="masa">{{ trans('cruds.masaTemuJanji.fields.masa') }}</label>
        <x-date-picker class="form-control" required wire:model="masaTemuJanji.masa" id="masa" name="masa" picker="time" />
        <div class="validation-message">
            {{ $errors->first('masaTemuJanji.masa') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.masaTemuJanji.fields.masa_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.configuration.masa-temu-janjis.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>