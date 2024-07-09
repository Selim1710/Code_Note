<?php 
/*

// limit string
{!! Str::limit($item->description, 30) !!}

// month array

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

?>