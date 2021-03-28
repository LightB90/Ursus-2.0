<link rel="stylesheet" href="{{asset('css/'.$page->childrens->count().'buttons.css')}}">
<script>
    $(document).ready(function(){
        $('.menu-open-button').click();
        $('.menu-open-button').removeAttr("for");

        $('.menu-open-button').click(function(){
            let page = $(this).data('page');
            if(page) {
                let container = $('.main-content');

                $.ajax({
                    type: "GET",
                    data: {page: page},
                    url: "/pagina",
                    success: function(result){
                        container.html();
                        container.html(result);
                    }
                });
            }
        });

        $('.menu-item').click(function(e){
            e.preventDefault();
            let page = $(this).data('page');
            let container = $('.main-content');

            $.ajax({
                type: "GET",
                data: {page: page},
                url: "/pagina",
                success: function(result){
                    container.html();
                    container.html(result);
                    $('.menu-open-button').click();
                    $('.menu-open-button').removeAttr("for");
                }
            });
        });

    });
</script>
