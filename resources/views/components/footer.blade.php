<script>
$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    @if(Session::has('message'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.success("{{ session('message') }}");
    @endif

    @if(Session::has('error'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.error("{{ session('error') }}");
    @endif

    @if(Session::has('info'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.info("{{ session('info') }}");
    @endif

    @if(Session::has('warning'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
    toastr.warning("{{ session('warning') }}");
    @endif

    let container = $('.main-content');

    @if(Session::has('redirect_id'))

        var ses_id = '{!! session('redirect_id') !!}';
        $.ajax({
            type: "GET",
            data: {page: ses_id},
            url: "/pagina",
            success: function(result){
                container.html(result);
            }
        });
    @else
        $.ajax({
            type: "GET",
            data: {page: '1'},
            url: "/pagina",
            success: function(result){
                container.html(result);
            }
        });
    @endif

});
</script>
