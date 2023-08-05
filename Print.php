
<!-- button -->
<a id="click_print" class="btn btn-info ml-2 text-white btn-sm">
    <i class="dripicons-print"></i>
    Print
</a>


<!-- js script -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script src="{{ asset('js/Print.js') }}" type="text/javascript"></script>

<script type="text/javascript">
    $('#click_print').click(function() {
        $('#table_print').printThis();
    })
</script>