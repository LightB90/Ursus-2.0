<div class="temp_one">
    <div class="col-md-10 offset-1">
        <div class="temp_one_container">
            @foreach($page->images as $val)
                <img alt="" src="{{asset('images/'.$val)}}">
            @endforeach
            <a href="{{route('edit_file',$page->id)}}" type="button" class="btn btn-primary edit_modal" data-toggle="modal" data-target="#exampleModal">
                Edit
            </a>
        </div>
    </div>
</div>
<div class="pagination" data-page="{{$page->page_id}}" style="display: none"></div>
<div class="button_pag" data-page="{{$page->id}}" style="display: none;"></div>
<script>
    $(document).ready(function(){
        let container = $('.navigation');
        let page = $('.pagination').data('page');

        $.ajax({
            type: "GET",
            data: {page: page},
            url: "/navigation",
            success: function(result){
                container.html(result);
            }
        });

        $('.edit_modal').click(function(){
           let route = $(this).attr('href');

            $.ajax({
                type : 'GET',
                url : route,
                success: function(result) {
                    $('.modal-content').html();
                    $('.modal-content').html(result);
                }
            });
        });
    });
</script>
<style>
    .holder {
        top: 50px;
        text-align: center;
    }
    .temp_one img {
        border-radius: 30px;
        max-width: 100%;
    }
    .temp_one_container {
        position: relative;
    }
    .temp_one_container button {
        position: absolute;
        left: 10px;
        top: 10px;
    }
</style>
