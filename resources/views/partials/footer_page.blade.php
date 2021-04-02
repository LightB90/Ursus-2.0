<link rel="stylesheet" href="{{asset('css/'.$page->childrens->count().'buttons.css')}}">
<script>
    $(document).ready(function(){
        var container = $('.main-content');
        $('.menu-open-button').click();
        $('.menu-open-button').removeAttr("for");

        $('.menu-open-button').click(function(){
            let page = $(this).data('page');

            if(page) {
                fetch('/pagina/'+page, {
                    method: "get",
                }).then(function (response) {
                    // The API call was successful!
                    return response.text();
                }).then(function (html) {
                    // Convert the HTML string into a document object
                    var parser = new DOMParser();
                    var doc = parser.parseFromString(html, 'text/html');
                    container.html(doc.querySelector('body').innerHTML);
                }).catch(function (err) {
                    console.warn('Something went wrong.', err);
                });
            }

        });

        $('.menu-item').click(function() {
            fetch('/pagina/'+$(this).data('page'), {
                method: "get",
            }).then(function (response) {
                // The API call was successful!
                return response.text();
            }).then(function (html) {
                // Convert the HTML string into a document object
                var parser = new DOMParser();
                var doc = parser.parseFromString(html, 'text/html');
                container.html(doc.querySelector('body').innerHTML);

                $('.menu-open-button').click();
                $('.menu-open-button').removeAttr("for");
            }).catch(function (err) {
                console.warn('Something went wrong.', err);
            });
        });
    });
</script>
