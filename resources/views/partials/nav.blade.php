<div class="navigation">
    <div class="page_top_menu">
        <div class="col-12">
            <div class="row">
                <div class="col-3">
                    <div class="back_btn" data-page="{{$subpage->parent->parents->id}}">
                        <img alt="" src="{{asset('images/back_alb.svg')}}">
                    </div>
                </div>
                <div class="col-6">
                    <div class="bread">
                        {{$subpage->parent->name}}
                    </div>
                </div>
                <div class="col-3">
                    <div class="logo">
                        <img alt="" src="{{asset('images/logo_white.svg')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($subpage->parent->subpages->count() > 1)
    <div class="page_top_bottom_menu">
        <div class="container">
            <div class="col-12">
                <div class="row">
                    @if($subpage->parent->subpages->count() == 2)
                        @foreach($subpage->parent->subpages as $val)
                            <div class="col-6">
                                <span class="top_bottom_menu_button @if($subpage->id == $val->id) current @endif" data-page="s{{$val->id}}">{{$val->name}}
                            </div>
                        @endforeach
                    @elseif($subpage->parent->subpages->count() == 3)
                        @foreach($subpage->parent->subpages as $val)
                            <div class="col-4">
                                <span class="top_bottom_menu_button @if($subpage->id == $val->id) current @endif" data-page="s{{$val->id}}">{{$val->name}}
                            </div>
                        @endforeach
                    @elseif($subpage->parent->subpages->count() == 4)
                        @foreach($subpage->parent->subpages as $val)
                            <div class="col-3">
                                <span class="top_bottom_menu_button @if($subpage->id == $val->id) current @endif" data-page="s{{$val->id}}">{{$val->name}}
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
