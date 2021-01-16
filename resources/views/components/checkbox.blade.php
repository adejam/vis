<div class="mb-3">
    <label class="block text-gray-500 font-bold">
        @if ($input['value'])
            <input class="mr-2 leading-tight" name="{{ $input['name'] }}" checked type="checkbox">
        @else
            <input class="mr-2 leading-tight" name="{{ $input['name'] }}" type="checkbox">
        @endif

        <span class="text-sm">
            {{ $input['title'] }} Role
        </span>
    </label>
    @if ($errors->has($input['name']))
        <span class="text-sm text-red-600" role="alert">
            <strong>{{ $errors->first($input['name']) }}</strong>
        </span>
    @endif
</div>
