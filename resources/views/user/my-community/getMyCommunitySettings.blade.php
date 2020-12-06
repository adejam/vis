<x-app-layout>
    @section('title', $community->communityName)
        <div class="mx-auto py-10 sm:px-6 lg:px-8">
            <x-community-nav :communityId="$community->communityId" :communityName="$community->communityName" />
            <x-session-message />
            <div>
                <h4>Update</h4>
                <form method="POST" action="{{ route('community.update') }}">
                    @csrf
                    <input type="hidden" name="communityId" value={{ $community->communityId }} />
                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="communityName" value={{ $community->communityName }} />
                        @if ($errors->has('communityName'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('communityName') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <input type="text" name="communityLocation" value={{ $community->communityLocation }} />
                        @if ($errors->has('communityLocation'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('communityLocation') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-span-6 sm:col-span-4">
                        <textarea class="form-control" value="{{ $community->aboutCommunity }}" id="aboutCommunity" rows="3"
                            name="aboutCommunity">{{ $community->aboutCommunity }}</textarea>
                        @if ($errors->has('aboutCommunity'))
                            <span class="help-block alert alert-danger" role="alert">
                                <strong>{{ $errors->first('aboutCommunity') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <button type="submit">Update</button>
                    </div>
                </form>
                <form method="POST" action="{{ route('community.delete') }}">
                    @csrf
                    <input type="hidden" name="communityId" value={{ $community->communityId }} />
                    <div class="flex items-center justify-end mt-4">
                        <button type="submit" class="alert alert-danger">delete</button>
                    </div>
                </form>
            </div>
        </div>
    </x-app-layout>
