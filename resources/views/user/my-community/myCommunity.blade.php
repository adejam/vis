<x-app-layout>
    @section('title', "My-Communities")
    @foreach ($communities as $community)
        <div>
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
                href="{{ url('my-community/' . $community->communityId) }}">
                {{ __($community->communityName) }}
            </a>

        </div>
    @endforeach

    @if (Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('community.add') }}">
        @csrf

        <div class="col-span-6 sm:col-span-4">
            <input type="text" name="communityName" />
            @if ($errors->has('communityName'))
                <span class="help-block alert alert-danger" role="alert">
                    <strong>{{ $errors->first('communityName') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4">
            <input type="text" name="communityLocation" />
            @if ($errors->has('communityLocation'))
                <span class="help-block alert alert-danger" role="alert">
                    <strong>{{ $errors->first('communityLocation') }}</strong>
                </span>
            @endif
        </div>

        <div class="col-span-6 sm:col-span-4">
            <textarea class="form-control" id="aboutCommunity" rows="3" name="aboutCommunity"
                placeholder="About Community"></textarea>
            @if ($errors->has('aboutCommunity'))
                <span class="help-block alert alert-danger" role="alert">
                    <strong>{{ $errors->first('aboutCommunity') }}</strong>
                </span>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit">Submit</button>
        </div>
    </form>
</x-app-layout>