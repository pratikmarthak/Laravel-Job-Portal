<script>
    /**
     *
     * Start : Third party plugin initialization
     *
     * **/
    // Create an instance of Notyf
    var notyf = new Notyf();

    //  datetimepicker
    $('.datetimepicker').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    // year picker
    $('.yearpicker').datetimepicker({
        format: 'YYYY'
    });


    ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    /**
     *
     * End : Third party plugin initialization
     *
     * **/

    function showLoader() {
        $('.preloader_demo').removeClass('d-none');
    }

    function hideLoader() {
        $('.preloader_demo').addClass('d-none');
    }
</script>
