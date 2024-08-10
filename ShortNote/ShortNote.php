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
    $orders = DB::table('orders')
            ->orderBy('id', 'desc')
            ->when($status != '', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->get();
            


   ///////////////////// Note-4: array sum in jquery ///////////////////

    var total = 0;
    $(".amount").each(function() {
        if($(this).val() != ''){
         total += parseFloat($(this).val());
        }
    });
    $("#grand_total").val(total);

    

   ///////////////////// Note-5:  ///////////////////



 */
