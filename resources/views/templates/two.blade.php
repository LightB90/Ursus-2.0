<div class="page-container">
    <div class="container">
        <div class="one_container">
            @foreach($subpage->elements as $element)
                <div class="element_container">
                    @if($element->name)
                        <h2 class="element_header">{{$element->name}}</h2>
                    @endif
                    @if(in_array($element->type,['image','image_border','image_frigider']))
                        <div class="element_{{$element->type}}">
                            <img alt="" src="{{asset('storage/'.$element->image->thumb_path)}}" data-toggle="modal" data-target="#modal-lg" data-href={{route('image_full',$element->image->id)}}>
                            @auth
                                <a href="{{route('edit_file',$element->image->id)}}" type="button" class="btn btn-primary edit_button" data-toggle="modal" data-target="#modal-s">Edit</a>
                            @endauth
                        </div>
                    @elseif($element->type == 'text')
                        <div class="text_holder">
                            @auth
                                <div id="summernote"></div>
                                <a class="btn" id="submit_text" data-text-id="{{$element->text->id}}">Submit</a>
                                <div class="success-holder"></div>
                                <script>
                                    $('#summernote').summernote({height: 200});
                                    var markupStr = '{!! $element->text->data  !!}';
                                    $('#summernote').summernote('code', markupStr);

                                    $('#submit_text').click(function(){
                                        let data = $('#summernote').summernote('code');
                                        let text_id = $(this).data('text-id');

                                        $.ajax({
                                            type: "POST",
                                            data: {data: data, id: text_id},
                                            url: "/text_edit",
                                            success: function(result){
                                                $('.success-holder').html(result);
                                                $('.success-holder').fadeIn().delay(3000).fadeOut();
                                            }
                                        });
                                    });
                                </script>
                            @endauth
                            @guest
                                @if($element->text->data)
                                    {!! $element->text->data !!}
                                @endif
                            @endguest
                        </div>
                    @else
{{--                        <div class="vitrina_holder">--}}
{{--                            <div class="img-overlay-wrap_{{$element->type}}" data-toggle="modal" data-target="#modal-lg" data-href={{route('image_full',$element->image->id)}}>--}}
{{--                                <img alt="" src="{{asset('storage/'.$element->image->thumb_path)}}">--}}
{{--                            </div>--}}
{{--                            @auth--}}
{{--                                <a href="{{route('edit_file',$element->image->id)}}" type="button" class="btn btn-primary edit_button" data-toggle="modal" data-target="#modal-s">Edit</a>--}}
{{--                            @endauth--}}
{{--                        </div>--}}
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
