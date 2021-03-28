<script>
    $(document).ready(function(){

        $('[data-toggle="modal"]').click(function(){
            let url = ($(this).attr('href') !== undefined)? $(this).attr('href') : $(this).data('href');
            $('.modal-content').html('<img src="{{asset('images/icons/loading.gif')}}" style="width: 50px; height: 50px; display: block; margin: 0 auto;">');

            $.ajax({
                type : 'GET',
                url : url,
                success: function(result) {
                    $('.modal-content').html(result);
                }
            });
        });

        let butoane = ['.back_btn','.top_bottom_menu_button'];
        butoane.forEach(function(value){
            $(value).click(function(){
                let page = $(this).data('page');
                $.ajax({
                    type: "GET",
                    data: {page: page},
                    url: "/pagina",
                    success: function(result){
                        $('.main-content').html(result);
                    }
                });
            });
        });

    });
</script>
<style>
    @if($subpage->parent->subpages->count() > 1)
        .navigation {
            height: 98px;
        }
        .page_top_bottom_menu {
            background: #e1e5e8;
            height: 40px;
            width: 100%;
            text-align: center;
            font-size: 12px;
            padding-top: 18px;
        }
        .page_top_bottom_menu .col-4, .page_top_bottom_menu .col-3 {
            padding-left: 5px;
            padding-right: 5px;
        }
        .top_bottom_menu_button {
            color: #004391;
            text-transform: uppercase;
            cursor: pointer;
            font-weight: bold;
            padding: 10px 0;
            font-size: 12px;
        }
        .page-container {
            margin-top: 98px;
        }
    @endif

    .one_container {
        position: relative;
        top: 50px;
    }
    .element_container {
        background: #e1e5e8;
        padding: 10px;
        border-radius: 20px;
        margin-bottom: 20px;
    }
    .element_header {
        text-transform: uppercase;
        color: #004391;
        text-align: center;
        font-size: 16px;
        padding-top: 5px;
        font-weight: bold;
    }
    .element_image, .element_image_border {
        position: relative;
        text-align: center;
    }
    .element_image_frigider {
        height: 378px;
        width: 210px;
        text-align: center;
        margin: 0 auto;
        position: relative;
    }
    .element_image_frigider img {
        height: 100%;
    }
    .element_image img,
    .element_image_border img {
        max-width: 100%;
        object-fit: cover;
    }
    .element_image_border img { border-radius: 20px;}
    .vitrina_holder {
        display: block;
        text-align: center;
        position: relative;
    }
    .img-overlay-wrap_m,
    .img-overlay-wrap_1d,
    .img-overlay-wrap_2d,
    .img-overlay-wrap_3d,
    .img-overlay-wrap_s800,
    .img-overlay-wrap_s900,
    .img-overlay-wrap_s1300,
    .img-overlay-wrap_l,
    .img-overlay-wrap_xl  {
        position: relative;
        display: inline-block;
        height: 378px;
    }

    .img-overlay-wrap_m {
        width: 133px;
        padding: 29px 9px 0;
    }
    .img-overlay-wrap_s800 {
        width: 146px;
        padding: 44px 9px 0;
    }
    .img-overlay-wrap_s900 {
        width: 146px;
        padding: 44px 9px 0;
    }
    .img-overlay-wrap_s1300 {
        width: 232px;
        padding: 60px 10px 0;
    }
    .img-overlay-wrap_l {
        width: 165px;
        padding: 50px 9px 0;
    }
    .img-overlay-wrap_xl {
        width: 210px;
        padding: 54px 8px 0;
    }
    .img-overlay-wrap_1d {
        width: 146px;
        padding: 66px 13px 0;
    }
    .img-overlay-wrap_2d {
        width: 264px;
        padding: 64px 11px 0;
    }
    .img-overlay-wrap_3d {
        width: 365px;
        padding: 55px 10px 0;
    }
    .img-overlay-wrap_1d:after,
    .img-overlay-wrap_2d:after,
    .img-overlay-wrap_3d:after,
    .img-overlay-wrap_m:after,
    .img-overlay-wrap_s800:after,
    .img-overlay-wrap_s900:after,
    .img-overlay-wrap_s1300:after,
    .img-overlay-wrap_l:after,
    .img-overlay-wrap_xl:after {
        content: ' ';
        display: block;
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 15;
        background-size: contain;
        background-repeat: no-repeat;
    }
    .img-overlay-wrap_m:after { background-image: url('../../images/rame/rama_opm.svg');}
    .img-overlay-wrap_s800:after { background-image: url('../../images/rame/rama_s800.svg');}
    .img-overlay-wrap_s900:after { background-image: url('../../images/rame/rama_opm.svg');}
    .img-overlay-wrap_s1300:after { background-image: url('../../images/rame/rama_s1300.svg');}
    .img-overlay-wrap_l:after { background-image: url('../../images/rame/rama_opl.svg'); }
    .img-overlay-wrap_xl:after { background-image: url('../../images/rame/rama_opxl.svg'); }
    .img-overlay-wrap_1d:after { background-image: url('../../images/rame/rama_1door.svg'); }
    .img-overlay-wrap_2d:after { background-image: url('../../images/rame/rama_2_doors.svg'); }
    .img-overlay-wrap_3d:after { background-image: url('../../images/rame/rama_3_doors.svg'); }

    .img-overlay-wrap_m img,
    .img-overlay-wrap_1d img,
    .img-overlay-wrap_2d img,
    .img-overlay-wrap_3d img,
    .img-overlay-wrap_l img,
    .img-overlay-wrap_xl img,
    .img-overlay-wrap_s800 img,
    .img-overlay-wrap_s900 img,
    .img-overlay-wrap_s1300 img {
        width: 100%;
    }
    .text_holder {
        color: #004391;
        margin-top: 30px;
        font-size: 12px;
        line-height: 1;
    }
    .text_holder table {
        width: 100%;
    }
    .text_holder table th {
        padding: 0.1rem;
        word-break: break-word;
    }
    .text_holder table td img {
        width: 100%;
    }
    .text_holder .btn {
        background: #fff;
        margin-top: 10px;
        display: inline-block;
    }
    .text_holder .btn:hover {
        background: #0f0;
    }
    .success-holder {
        background: #fff;
        margin-top: 10px;
        padding: 5px;
        display: none;
        width: 100%;
    }
    .edit_button {
        position: absolute;
        left: 10px;
        top: 10px;
        z-index: 19;
    }
    .current {color: #bc970c}
    @media(min-width: 576px) {
        .modal-lg {
            max-width: 100% !important;
            margin: 0 auto;
        }
        .modal-lg .modal-body {
            padding: 2px;
        }
    }
</style>
