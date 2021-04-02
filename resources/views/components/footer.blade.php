<script>

    $(document).ready(function(){

        @auth
            @if(Session::has('message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.success("{{ session('message') }}");
        @endif

            @if(Session::has('error'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.error("{{ session('error') }}");
        @endif

            @if(Session::has('info'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.info("{{ session('info') }}");
        @endif

            @if(Session::has('warning'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
        toastr.warning("{{ session('warning') }}");
        @endif
        @endauth

        var container = $('.main-content');

        @if(Session::has('redirect_id'))

        var ses_id = '{!! session('redirect_id') !!}';

            fetch('/pagina/'+ses_id, {
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

        @else

            fetch('/pagina/1', {
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

        @endif

    });

</script>
