
<!-------------------------- print-1 ---------------->
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



<!-------------------------- print-2 ---------------->
  <button type="button" onclick="printDiv()" class="btn btn-primary btn-sm mr-3" id="print-invoice"> 
      <i class="fas fa-print"></i>Print
  </button>
@push('scripts')
    <script src="{{ asset('js/jquery.printarea.js') }}"></script>
    <script>
        function printDiv() {
            var printContents = document.getElementById("invoice").innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endpush
