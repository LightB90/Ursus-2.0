<form method="POST" action="{{$route}}" {{$extra}}>
    <div class="modal-header">
        @csrf
        <h5 class="modal-title" id="exampleModalLabel">{{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body form-horizontal">
        <div class="form-body">
            {{$fields}}
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="upload_file">Trimite</button>
    </div>
</form>
