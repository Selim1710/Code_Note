<?php

/*
////////// Checkbox checked and unchecked 

// step-1:      

    # composer require milon/barcode

// step-2: 

# QR code:
 @php
 $product_name = $product->name ?? '';
    try {
        echo '<img style="margin-top:10px; width:65px" src="data:image/png;base64,' . DNS2D::getBarcodePNG($product_name, 'QRCODE') . '" alt="barcode"/>';
    } catch (Exception $e) {
        $check_error = $e;
        // dd($check_error);
    }
  @endphp
 
# barcode:

  <?php
   $visa_no = $customer->visa_no ?? 0;
   echo '<img style="margin-top:0px;width:60%;margin-left:0%;height:85px" src="data:image/png;base64,' . DNS1D::getBarcodePNG($visa_no, 'C128') . '" width="300" alt="barcode"/>';
   ?>


*/
