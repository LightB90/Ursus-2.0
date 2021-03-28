<div class="page-container">
    <div class="container">
        <div class="col-12">
            <div class="menu-holder">
                <nav class="menu">
                    <input type="checkbox" class="menu-open" name="menu-open" id="menu-open" value="true">
                    <label class="menu-open-button" @if($page->id != '1') data-page=" {{$page->parents->id}}" @endif for="menu-open">
                        <img alt="MT" class="back_img" src="@if($page->id == '1') {{asset('images/home_asahi.svg')}} @else {{asset('images/back.svg')}}@endif">
                    </label>
                    @foreach($page->childrens as $child)
                        <a class="menu-item" data-page="{{$child->id}}"><img alt="" src="{{asset('images/icons/'.$child->picture)}}"></a>
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</div>
