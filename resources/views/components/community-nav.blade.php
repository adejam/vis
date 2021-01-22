<div class=" mb-5 border-gray-100">
    <h3 class="text-center font-bold text-3xl capitalize">{{$communityName}}</h3>
</div>
<ul class="border-b border-gray-100 mb-0 justify-center text-primary flex flex-wrap">
    <li class="" style="margin-bottom: -1px">
        <a href="{{ url('my-community/' . $communityId) }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Main</a>
    </li>
    <li class="" style="margin-bottom: -1px">
        <a href="{{ url('my-community/' . $communityId . '/admins') }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get.admins') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Admins</a>
    </li>
    <li class="" style="margin-bottom: -1px">
        <a href="{{ url('my-community/' . $communityId . '/settings') }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get.settings') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Settings</a>
    </li>
    <li class="" style="margin-bottom: -1px">
        <a href="{{ url('my-community/' . $communityId . '/settings') }}"
            class="border rounded-t block px-3 py-2 {{ request()->routeIs('community.get.settings') ? 'text-dark bg-white border-gray-100 border-b-white' : 'border-transparent' }}">Add Vehicle</a>
    </li>
</ul>
