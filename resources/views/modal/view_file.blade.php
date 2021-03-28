@component('components.modal.modal_view')
    @slot('fields')
        <img alt="" src="{{asset('storage/'.$image->path)}}">
    @endslot
@endcomponent
