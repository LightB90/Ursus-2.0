@component('components.modal.modal_md')
    @slot('route')
        {{route('file_up')}}
    @endslot
    @slot('extra')
        enctype="multipart/form-data"
    @endslot
    @slot('title')
        Schimba Poza
    @endslot
    @slot('fields')
        <input type="hidden" value="{{$image->id}}" name="id" id="id" required>
        <input type="file" id="myFile" name="filename" required>
    @endslot
@endcomponent
