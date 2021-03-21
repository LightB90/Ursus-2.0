<div class="col-md-12">
    <div class="row">
        <div class="col-md-7">
            <span class="back_btn" data-page="{{$page->parents->id}}">
                <img alt="" src="{{asset('images/back_alb.svg')}}">
            </span>
            <span class="bread">
                @if($page->parents->parents->parents)
                    @if($page->parents->parents->parents->id != '1')
                        {{$page->parents->parents->parents->name}} <img src="{{asset('images/arrow.svg')}}">
                    @endif
                @endif
                @if($page->parents->parents)
                    {{$page->parents->parents->name}} <img src="{{asset('images/arrow.svg')}}">
                @endif
                @if($page->parents)
                    {{$page->parents->name}} <img src="{{asset('images/arrow.svg')}}">
                @endif
                {{$page->name}}
            </span>
        </div>
        <div class="col-md-5">
            <div class="page-menu">
                @foreach($page->subpages as $key => $val)
                    @if($key == 0)
                        <span class="button" data-page="s{{$val->id}}">{{$val->name}}</span>
                    @else
                        <span class="button" data-page="s{{$val->id}}">{{$val->name}}</span>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.back_btn').click(function(){
            let page = $(this).data('page');
            let container = $('.holder');

            $.ajax({
                type: "GET",
                data: {page: page},
                url: "/pagina",
                success: function(result){
                    container.html();
                    container.html(result);
                }
            });
        });

        let cur_page = $('.button_pag').data('page');
        let cur_button = $('.page-menu').find(".button[data-page=s"+cur_page+"]");

        if(cur_page == cur_button.data('page').substring(1,5)) cur_button.addClass('apasat');

        $('.page-menu .button').click(function(){
            let page = $(this).data('page');
            let container = $('.holder');

            $.ajax({
                type: "GET",
                data: {page: page},
                url: "/pagina",
                success: function(result){
                    container.html();
                    container.html(result);
                }
            });
        });
    });
</script>
