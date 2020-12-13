<div class="mb-3">
    <label class="block font-medium text-sm text-gray-700" for="{{ $input['name'] }}">
        {{ $input['title'] }}
    </label>
    <textarea required class="form-input rounded-md shadow-sm mt-1 block w-full" id="{{ $input['name'] }}"
        autocomplete="{{ $input['name'] }}" placeholder="{{ $input['title'] }}" value="{{ $input['value'] ? $input['value'] : old($input['name']) }}"
        name="{{ $input['name'] }}" rows="3">{{ $input['value'] ? $input['value'] : old($input['name']) }}</textarea>
    @if ($errors->has($input['name']))
        <span class="text-sm text-red-600" role="alert">
            <strong>{{ $errors->first($input['name']) }}</strong>
        </span>
    @endif
</div>
