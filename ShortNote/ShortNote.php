<?php
/*

    /////////////////// Note-1: limit string ///////////////////

    {!! Str::limit($item->description, 30) !!}


    /////////////////////  Note-2: month array ///////////////////

    @php
        $arraymonths = [
            '1' => 'January',
            '2' => 'February',
            '3' => 'March',
            '4' => 'April',
            '5' => 'May',
            '6' => 'June',
            '7' => 'July',
            '8' => 'August',
            '9' => 'September',
            '10' => 'October',
            '11' => 'November',
            '12' => 'December',
        ];
    @endphp
    @if(!empty($arraymonths))
        @foreach ($arraymonths as $key => $month)
            <option value="{{ $key }}"
                {{ $month == date('F') ? 'Selected' : '' }}>
                {{ $month }}
            </option>
        @endforeach
    @endif


    ///////////////////// Note-3: when query ///////////////////
    
    $data['start_date'] = $start_date =$request->start_date ?? date('Y-m-d');
    $data['end_date'] = $end_date = $request->end_date ?? date('Y-m-d');
    $data['customer_id'] = $customer_id = $request->customer_id ?? 0;

    $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            ->whereDate('date', '>=', $start_date)
            ->whereDate('date', '<=', $end_date)
            ->when($customer_id != 0, function ($query) use ($customer_id) {
                $query->where('customer_id', $customer_id);
            })
            ->get();
            


   ///////////////////// Note-4: array sum in jquery ///////////////////

    var total = 0;
    $(".amount").each(function() {
        if($(this).val() != ''){
         total += parseFloat($(this).val());
        }
    });
    total = total.toFixed(3); // after point it will take 3 digit. example: 1.333
    $("#grand_total").val(total);

    

   ///////////////////// Note-5:  ///////////////////



 */
