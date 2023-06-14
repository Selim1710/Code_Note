<?php

/*
////////// Checkbox checked and unchecked 

// step-1: button                          
   <a href="#" class="btn btn-danger" id="checkAll">Deselect all</a>

// step-2: script
 
 <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        $("#checkAll").click(function(e) {
       e.preventDefault();
            if($("input[type='checkbox']").is(':checked')){
                $("input[type='checkbox']").attr('checked', false);
                $("#checkAll").text('Select All');
            }else{
                $("input[type='checkbox']").attr('checked', true);
                $("#checkAll").text('Unselect All');
            }
        });
    });
</script>


///////////  Checkbox checked add class ////////////

    <script>
        $(document).ready(function() {
            $('input[type="checkbox"]').on('click', function() {
                var values = $(this).val();
                if ($(this).prop('checked') == true) {
                    $('#tr-' + values).addClass('bg-style');
                } else {
                    $('#tr-' + values).removeClass('bg-style');
                }
            });
        });
    </script>


*/
