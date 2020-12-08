@if (session('success'))
<div class="flex justify-between items-start bg-green-100 border border-green-400 text-green-700 px-4 py-3 m-3 rounded relative" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
    <button type="button" id="close-alert" class="text-xl focus:outline-none text-green-700 close-alert" data-dismiss="alert" aria-label="Close Alert">
        &times;
    </button>
</div>
@endif

@if (session('error'))
    <div id="sessionError" class="flex justify-between items-start bg-red-100 border border-red-400 text-red-700 px-4 py-3 m-3 rounded relative" role="alert">
        <span class="">{{ session('error') }}</span>
        <button type="button" id="close-alert" class="text-xl focus:outline-none text-red-700 close-alert" data-dismiss="alert" aria-label="Close Alert">
            &times;
        </button>
    </div>
@endif
