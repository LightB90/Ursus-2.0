<div class="page-container">
    <div class="container">
        <div class="col-12">
            <div class="menu-holder">
                <nav class="menu">
                    <input type="checkbox" class="menu-open" name="menu-open" id="menu-open" value="true">
                    <label class="menu-open-button" @if($page->id != '1') data-page="{{$page->parents->id}}" @endif for="menu-open">
                        <img alt="MT" width="60px" height="60px" class="back_img" src="@if($page->id == '1') {{asset('images/home_asahi.svg')}} @else {{asset('images/back.svg')}}@endif">
                    </label>
                    @foreach($page->childrens as $child)
                        <a class="menu-item" data-page="{{$child->id}}"><img alt="button" width="60px" height="60px" src="{{asset('images/icons/'.$child->picture)}}"></a>
                    @endforeach
                </nav>
            </div>
        </div>
    </div>
</div>
<script>

</script>
<style>
    @media screen and (max-width:900px) {
        .page-container {
            margin-top: 0;
        }
    }
    @media screen and (max-width: 600px) {
        .page-container {
            margin-top: 40%;
        }
    }
</style>
