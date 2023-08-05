
<!-- button -->
<a id="click_print" class="btn btn-info ml-2 text-white btn-sm">
    <i class="dripicons-print"></i>
    Print
</a>


<!-- js script -->
<script src="{{ asset('js/Print.js') }}" type="text/javascript"></script>
<script type="text/javascript">
    $('#click_print').click(function() {
        $('#table_print').printThis();
    })
</script>