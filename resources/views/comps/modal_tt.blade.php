<form method="post" action="{{route('file_up')}}" enctype="multipart/form-data">
    <div class="modal-header">
        @csrf
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <input type="hidden" value="{{$id}}" name="id" id="up_id">
        <input type="file" id="myFile" name="filename">
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" id="upload_file">Trimite</button>
    </div>
</form>

<div class="response_result">

</div>

<script>
    // $('#upload_file').on('click', function() {
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        //
        // let u_id = $('#up_id').val();
        // let fd = new FormData();
        // let files = $('#myFile')[0].files;
        // fd.append('file',files[0]);

        {{--$.ajax({--}}
        {{--    type: 'POST',--}}
        {{--    url: "{{route('upload_file')}}",--}}
        {{--    data: {id: u_id, file: fd},--}}
        {{--    cache: false,--}}
        {{--    contentType: false,--}}
        {{--    processData: false,--}}
        {{--    success: function(result){--}}
        {{--        $('.response_result').html(result);--}}
        {{--    }--}}
        {{--});--}}
    // });
</script>
