@if(Session::has('message'))
    <script>
        $(function(){
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "30000",
                "hideDuration": "1300",
                "timeOut": "5000",
                "showMethod": "slideDown",
            };

            toastr["{{ Session::get('status') }}"]("{{ Session::get('message') }}");
        });
    </script>
@endif