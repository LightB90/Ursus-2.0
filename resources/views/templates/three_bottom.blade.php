<div class="temp_two_bottom">
    <div class="col-md-12">
        <div class="col-md-12">
            <div class="container_two_top">
                <div class="row">
                    @foreach($page->images as $key => $val)
                        @if($key == 'opm')
                            <div class="col-md-4">
                                {{$key}}
                            </div>
                        @elseif($key == 'opl')
                            <div class="col-md-4">
                                {{$key}}
                            </div>
                        @elseif($key == 'opxl')
                            <div class="col-md-4">
                                {{$key}}
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="container_two_middle">
                <div class="row">
                @foreach($page->images as $key => $val)
                    @if($key == 'opm')
                        <div class="col-md-4">
                            <div class="image_holder">
                                <div class="img-overlay-wrap">
                                    <img alt="" src="{{asset('images/'.$val)}}">
                                </div>
                            </div>
                        </div>
                    @elseif($key == 'opl')
                        <div class="col-md-4">
                            <div class="image_holder">
                                <div class="img-overlay-wrap_l">
                                    <img alt="" src="{{asset('images/'.$val)}}">
                                </div>
                            </div>
                        </div>
                    @elseif($key == 'opxl')
                        <div class="col-md-4">
                            <div class="image_holder">
                                <div class="img-overlay-wrap_xl">
                                    <img alt="" src="{{asset('images/'.$val)}}">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="container_two_bottom">
                @auth
                <div id="summernote"></div>
                <a class="btn" id="submit_text">Submit</a>
                <div class="success-holder"></div>
                @endauth
                @guest
                    {!! $page->page_data !!}
                @endguest
            </div>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#summernote').summernote({height: 100});
        let markupStr = '{!! $page->page_data  !!}';

        $('#summernote').summernote('code', markupStr);

        $('#submit_text').click(function(){
            let data = $('#summernote').summernote('code');
            let cur_page = $('.button_pag').data('page');

            $.ajax({
                type: "POST",
                data: {data: data,page: cur_page},
                url: "/text_edit",
                success: function(result){
                    $('.success-holder').show().html(result);
                }
            });
        })
    });
</script>
<style>
    .holder {
        top: 5px;
        text-align: center;
    }
    .container_two_top {
        font-size: 20px;
        text-transform: uppercase;
        padding: 5px 0;
        color: #fff;
        font-weight: bold;
    }
    .container_two_middle {
        border: 3px solid #fff;
        border-radius: 25px;
        padding: 15px 10px;
    }
    .container_two_bottom {
        border: 3px solid #fff;
        border-radius: 25px;
        padding: 20px;
        margin-top: 20px;
        text-align: left;
        height: 250px;
        @guest
        line-height: 1;
        color: #fff;
        font-size: 15px;
    @endguest
}
    .image_holder {
        display: block;
        margin: 0 auto;
    }
    .img-overlay-wrap, .img-overlay-wrap_l, .img-overlay-wrap_xl  {
        position: relative;
        display: inline-block;
    }
    .img-overlay-wrap { left: 20px; }
    .img-overlay-wrap_l { left: 40px; }
    .img-overlay-wrap_xl { left: 50px; }
    .img-overlay-wrap:after, .img-overlay-wrap_l:after, .img-overlay-wrap_xl:after {
        content: ' ';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 20;
        background-size: contain;
        background-repeat: no-repeat;
    }
    .img-overlay-wrap:after { background-image: url('../../images/rama_opm.svg');}
    .img-overlay-wrap_l:after { background-image: url('../../images/rama_opl.svg'); }
    .img-overlay-wrap_xl:after { background-image: url('../../images/rama_opxl.svg'); }
    .img-overlay-wrap img {
        display: block;
        padding: 56px 14px 0;
        max-width: 75%;
        height: auto;
    }
    .img-overlay-wrap_l img, .img-overlay-wrap_xl img {
        display: block;
        padding: 70px 13px 0;
        max-width: 75%;
        height: auto;
    }
    .container_two_bottom .btn {
        background: #fff;
        margin-top: 10px;
        display: inline-block;
    }
    .container_two_bottom .btn:hover {
        background: #0f0;
    }
    .success-holder {
        color: #00ff00;
        background: #fff;
        margin-left: 30px;
        display: inline-block;
        width: 50%;
    }
</style>
