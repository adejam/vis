<section id="{{$modalId}}" class="modal">
    <div class="modal-content md:max-w-md">
        <header class="modal-header">
            <h5 class="modal-title">{{$modalTitle}}</h5>
            <button type="button" id="close-modal" class="close-modal-button"
                data-dismiss="{{ $modalId }}"
                aria-label="Close">
                <span aria-hidden="true">X</span>
            </button>
        </header>
        {{$slot}}
    </div>
</section>