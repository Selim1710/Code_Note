<?php
    /*
    //////////  date picker using jquery ////////

    <input type="text" name="date" id="datepicker" class="form-control" placeholder="dd/mm/yy">

    // js
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        $(function() {
            $("#datepicker").datepicker({
                changeMonth: true,
                changeYear: true,
                showButtonPanel: true,
                dateFormat: "dd/mm/yy",

            });
        });
    </script>

    //////////  convert date format using jquery ////////

    <script>
     // thats format: d/m/y
        var date = "25/10/2023";

        var conver_date = date.split('/');

        // converting: m/d/y
        var expired_date = conver_date[1] + '/' + conver_date[0] + '/' + conver_date[2];

        output: 10/25/2023
    </script>



    //////////  Calculate duration between two times  ////////

    $time1 = new DateTime($emp_entry);
    $time2 = new DateTime($emp_exit);
    $time_difference = $time2->diff($time1);
    $total_time = $time_difference->format('%H:%I:%S');

    $total_working_hour = $total_time;
   


    /*
    ////////  add hour and subtract hour  ////////////////

    $date_time = '2023-07-15 10:00:00';
    $DateTime1 = new DateTime($date_time);
    $DateTime1->modify('+2 hours'); or $DateTime1->modify('-2 hours');
    $final_shift_end_time = $date . ' ' . $DateTime1->format("H:i:s");
    
    /*
    ////////// subtract day in php ////////

    $day = date('Y-m-d', strtotime('-7 days'))



    /*
    // Date-Time Local Value showing

    <input type="datetime-local" name="date_start" value="{{ date('Y-m-d\TH:i', strtotime($yourPassedVariableToView)) }}">


    /*
    // Week Name: Saturday, Sunday, Monday, Tuesday, Wednesday, Thursday, Friday 
    
    $week_name = date("l");
    
    // Week Name: Sat, Sun, Mon, Tue, Wed, Thu, Fri 
    
    $week_name = date("D");


    /*
    // Month Name:
    $month_name = date('F'); // December
    $month_name = date('M'); // Dec
    
    
    --- the end ---
    */