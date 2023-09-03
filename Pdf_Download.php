<?php
/*

// Controller:
 $customPaper = array(0, 0, 720, 1000);
 $pdf = PDF::loadView('purchase.purchase_invoice_with_header', $data)->setPaper($customPaper, 'portrait');
 $pdf = $pdf->stream(\Carbon\Carbon::today()->toDateString() . 'purchase.pdf');
 return $pdf;