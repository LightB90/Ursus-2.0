<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        let container = $('.holder');

        $.ajax({
            type: "GET",
            data: {page: '1'},
            url: "/pagina",
            success: function(result){
                container.html();
                container.html(result);
            }
        });

    });
</script>
