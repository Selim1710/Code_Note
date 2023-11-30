<?php

/*

// login with mobile username and email in laravel
public function index(Request $request)
{
    if (is_numeric($request->email)) {
        $data = ['mobile_number' => $request->get('email'), 'password' => $request->get('password')];
    } elseif (filter_var($request->get('email'), FILTER_VALIDATE_EMAIL)) {
        $data = ['email' => $request->get('email'), 'password' => $request->get('password')];
    } else {
        $data = ['username' => $request->get('email'), 'password' => $request->get('password')];
    }


    if (Auth::attempt($data)) {
        return back()->with('success', 'Login successfull');
    } else {
        return back()->with('error', 'Invalid data');
    };
}


 
//////////////// edit with modal ////////////////
  edit-button:
    <button type="button" data-id="{{ $account->id }}"
        data-account_no="{{ $account->account_no }}"
        data-name="{{ $account->name }}"
        data-initial_balance="{{ $account->initial_balance }}"
        data-note="{{ $account->note }}"
        data-edit_status="{{ $account->is_active }}" class="edit-btn btn btn-link"
        data-toggle="modal" data-target="#editModal">
        <i class="dripicons-document-edit"></i>
        {{ trans('file.edit') }}
    </button>
  <script>
      $('.edit-btn').on('click', function() {
            $("#editModal input[name='account_no']").val($(this).data('account_no'));
            $("#editModal input[name='name']").val($(this).data('name'));
            $("#editModal input[name='initial_balance']").val($(this).data('initial_balance'));
            $("#editModal input[name='account_id']").val($(this).data('id'));
            $("#editModal textarea[name='note']").val($(this).data('note'));
            var status = $(this).data('edit_status');
            if(status==1){
                alert('active');
                $("#editModal input[name='edit_status']").
            }else{
                alert('in-active');
            }
        });
  </script>

//////////////// Problem: Multiple autocomplete in laravel  ////////////////
// Blade:

// {{-- description --}}
   <div class="form-group">
   <label> Details</label>
      <input type="search" class="form-control description_search"
        placeholder="Type here">
       <div class="description_suggession"></div>
     <textarea name="description" cols="30" rows="3" class="form-control description"></textarea>
   </div>

script:


// {{-- description ajax --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
</script>
<script>
    $(document).ready(function() {
        $('.description_search').keyup(function(e) {
            e.preventDefault();
            var searching_data = $('.description_search').val();
            //  console.log(searching_data);


            $.ajax({
                url: "{{ route('remainder.autocomplete-search') }}",
                type: "get",
                data: {
                    searching_data: searching_data
                },
                success: function(data) {
                    $('.description_suggession').fadeIn();
                    $('.description_suggession').html(data);
                },
                errors: function(error) {
                    console.log(error);
                }
            });
        });


        $(document).on('click', '.description_suggession li', function(e) {
            e.preventDefault();
            var content = $('.description').val();
            var text = $(this).text();
            // Add the text to the textarea
            var removed_button = '<button class="text-danger">X</button>';
            if (content) {
                $('.description').val(content + ' ,  ' + text);
            } else {
                $('.description').val(text);
            }


            $('.description_search').val(' ');
            $('.description_suggession').fadeOut();
        });
    });
</script>


// controller:
  public function autoCompleteSearch(Request $request)
    {
        $search = ($request->searching_data);
        $data = Lead::where('name', 'LIKE', "%$search%")->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
        foreach ($data as $row) {
            $output .= '
       <li><a href="#">' . $row->name . '</a></li>
       ';
        }
        $output .= '</ul>';
        echo $output;
    }

 // route:
 Route::get('/autocomplete/search', 'RemainderController@autoCompleteSearch')->name('remainder.autocomplete-search');



//////////////////////////  three input field calculation  //////////////////////////  


 $(document).on('keyup', '.principal_amount,.loan_interest,.loan_interest_amount', function() {
   var principal_amount = parseFloat($(".principal_amount").val());
   var loan_interest = parseFloat($(".loan_interest").val());
  var loan_interest_amount = parseFloat($(".loan_interest_amount").val());
    if (loan_interest) {
        var interest = 0;
        interest = principal_amount * loan_interest / 100;
        if (!interest) interest = 0
        $(".loan_interest_amount").val(interest);
        var grand_total = 0;
        grandtotal = (principal_amount + parseFloat(interest));
        if (!grandtotal) grand_total = 0;
        $(".grand_total").val(grandtotal);
    } else {
        var interest = 0;
        interest = principal_amount + loan_interest_amount;
        $(".grand_total").val(interest);
    }
});



//////////////////////////  Ajax search //////////////////////////
        
 // search Yearly Deposit:

$('#searchYearlyDeposit').on('keyup', function() {
    var search = $(this).val();
    // alert(search);
    $.ajax({
        type: 'get',
        url: '{{ URL::to('search/yearly/deposit/member') }}',
        data: { value:search },
        success: function(data) {
            $('#resultYearlyDeposit').html(data)
        },
    });
});                         
    
 // controller code:

public function searchYearlyDeposite(Request $request)
{
    $search = $request->value;
    $data['items'] = YearlyDeposit::where('years',$search)->orderBy('id','DESC')->get();
    return view('yearlydeposit.search_yearly_deposite_by_ajax', $data);
}




////////////////////////// Add a string into ajax ( .val() )  ////////////////////////// 
 
$('#customer-group-id').on('change', function(){
    var member_type = $(this).val();
    var get_member_code = $('#get_member_code').val();


    if(member_type == 1){
        $('#member_code').val('G' + get_member_code);
    }else{
        $('#member_code').val('B' + get_member_code);
    }
});


//////////////////////////  laravel dependency with ajax  ////////////////////////// 

Step-1:

{{-- ajax - dept_wise_subdept --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#filterResult").hide();
            $("#depart_id").change(function() {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                var depart_id = $("#depart_id").val();
                $.ajax({
                    type: "GET",
                    url: "dept-wise-subdept-search-ajax/" + depart_id,
                    dataType: "json",
                    success: function(response) {
                        $('#sub_depart_id').html(response);
                    },
                    error: function(error) {
                        alert('ajax error 1');
                    }
                });
                $("#sub_depart_id").click(function() {


                    $('#allResult').hide();
                    $("#filterResult").show();


                    var sub_dept_id = $("#sub_depart_id").val();
                    $.ajax({
                        type: "GET",
                        url: "get/subdepartment/wise/employee/by/ajax",
                        data: {
                            sub_dept_id: sub_dept_id
                        },
                        success: function(data) {
                            $('#filterResult').html(data);
                        },
                        error: function(error) {
                            alert('ajax error 2');
                        },
                    });
                });
            });
            $("#sub_depart_id").change(function() {


                $('#allResult').hide();
                $("#filterResult").show();


                var sub_dept_id = $("#sub_depart_id").val();
                $.ajax({
                    type: "GET",
                    url: "get/subdepartment/wise/employee/by/ajax",
                    data: {
                        sub_dept_id: sub_dept_id
                    },
                    success: function(data) {
                        $('#filterResult').html(data);
                    },
                    error: function(error) {
                        alert('ajax error 2');
                    },
                });
            });
        });
</script>

Step-2: controller code

// sub department ajax search

public function deptWiseSubDeptAjaxSearch($id)
{
    $html = '';
    $subdepts = SubDepartment::where('sdepart_departid', $id)->get();
    foreach ($subdepts as $sub) {
        $html .= '<option value="' . $sub->sdepart_id  . '"> ' . $sub->sdepart_name . ' </option> ';
    }
    return response()->json($html);
}


// employee ajax search
public function subDeptWiseEmployeeAjaxSearch(Request $request)
{
    $id = $request->sub_dept_id;
    $data['employees'] = Employee::where('emp_sdepart_id', $id)->get();
    return view('Admin.sub_dept_wise_shift.sub_dept_employee',$data);
}


////////////// Problem: add more input field using jquery  //////////////

// step-1:

<div class="row" id="academic_document">
  <div class="col-12 d-flex">
  <input class="form-control" type="text" name="academic_documentation[0]">
 <input class="form-control ml-1" type="file" name="academic_documentation_file[0]">
 <button type="button" class="btn btn-primary ml-1 btn-sm" id="add_more_button">Add more</button>
      </div>
   </div>

// step-2:
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add_more_button').click(function() {
            var number = i++;

            var new_input = "<div class='col-12 mt-3 d-flex' id='academic_document'>" +
                "<input class='form-control' type='text' name='academic_documentation[" + number +
                "]'>" +
                "<input class='form-control ml-2' type='file' name='academic_documentation_file[" +
                number + "]'>" +
                "<button type='button' class='btn btn-danger ml-2 btn-sm' id='remove_button'>" +
                "Remove" +
                "</button>" +
                "</div>";
            $('#academic_document').append(new_input);
        });


        $(document).on('click', '#remove_button', function() {
            $(this).parent('div').remove();
        });


    });
</script>


/////////////////////////////////  add more with calculation  /////////////////////////////////

<script>

    var counter = 0;
    $("#add_more_btn").on('click', function(e) {
        e.preventDefault();

        ++counter;
        // console.log(counter);

        if (counter == 3) {
            alert('You can add maximum 3 row');
        } else {
            var html =
                '<tr><td><input type="text"name="note[' + counter +
                ']"class="form-control note_' + counter + '"></td><td><input type ="text"name="unit[' +
                counter +
                ']"class="form-control unit_' + counter + '"></td><td><input type="text"name="total_amount[' +
                counter +
                ']"class ="form-control total_amount_' + counter +
                ' amount"readonly></td><td><button type="button" class="btn btn-danger btn-sm delete_class remove">X</button></td></tr>';

            $("#wrapper").append(html);

            $(document).on('click', '.remove', function() {
                $(this).parents('tr').remove();
            });
        }


        $(".note_" + counter).on('keyup', function() {
            var note = $(".note_" + counter).val();
            // console.log(note);

            if (note == '') {
                note = 0;
            }

            var unit = $(".unit_" + counter).val();
            if (unit == '') {
                unit = 0;
            }

            var total_amount = parseFloat(note) * parseFloat(unit);
            $(".total_amount_" + counter).val(total_amount);

            // grand_total
            var total = 0;
            $(".amount").each(function() {
                total += parseFloat($(this).val());
            });
            $("#grand_total").val(total);

        });

        $(".unit_" + counter).on('keyup', function() {
            var note = $(".note_" + counter).val();
            // console.log('note ' + note);

            if (note == '') {
                note = 0;
            }

            var unit = $(".unit_" + counter).val();
            if (unit == '') {
                unit = 0;
            }

            // console.log('unit ' + unit);

            var total_amount = parseFloat(note) * parseFloat(unit);
            $(".total_amount_" + counter).val(total_amount);

            // grand_total
            var total = 0;
            $(".amount").each(function() {
                total += parseFloat($(this).val());
            });
            $("#grand_total").val(total);

        });
    });
</script>

/////////////////////////// index no calculation ///////////////////////////

<script>
    // total_amount, note, unit
    $(".note,.unit").on('keyup', function() {
        var index_no = $(this).data('index_no');

        var note = $("#note_" + index_no).val();
        // alert(note);

        if (note == '') {
            note = 0;
        }

        var unit = $("#unit_" + index_no).val();
        if (unit == '') {
            unit = 0;
        }

        var total_amount = parseFloat(note) * parseFloat(unit);
        $("#total_amount_" + index_no).val(total_amount);

        // grand_total
        var total = 0;
        $(".amount").each(function() {
            total += parseFloat($(this).val());
        });
        $("#grand_total").val(total);

    });
</script>


///////////////////////////// payment type calculation ///////////////////////////
<div class="col-3">
    <div class="form-group">
        <label>Payment type<span class="text-danger">*</span></label>
        <select name="payment_type" id="paid_by" class="form-control text-capitalize">
            <option value="1"
                @if (isset($payment->payment_type)) {{ $payment->payment_type == 1 ? 'selected' : '' }} @endif>
                Cash
            </option>
            <option value="2"
                @if (isset($payment->payment_type)) {{ $payment->payment_type == 2 ? 'selected' : '' }} @endif>
                Bank
            </option>

        </select>
    </div>
    </div>

    <div class="col-3 banking">
    <div class="form-group">
        <label class="text-capitalize">
            Cheque Number
        </label>
        <input type="text" name="cheque_no" class="form-control cheque_no"
            value="{{ $payment->cheque_no ?? '' }}">
    </div>
    </div>
    <div class="col-3 banking">
    <div class="form-group">
        <label class="text-capitalize">
            Accounts
        </label>
        <select name="account_id" id="account_id" class="form-control">
            @forelse ($accounts as $account)
                <option value="{{ $account->id }}"
                    @if (isset($payment->account_id)) {{ $payment->account_id == $account->id ? 'selected' : '' }} @endif>
                    {{ $account->name }}</option>
            @empty
                <option value="">No data found</option>
            @endforelse

        </select>
    </div>
</div>

// script
<script>
    $(document).ready(function() {
        var paid_by = $('#paid_by').find('option:selected').val();

        // paid - by cash
        if (paid_by == 1) {
            $('.banking').hide();

        }
        // paid - by bank
        else if (paid_by == 2) {
            $('.banking').show();

        }
        // paid - by bank
        else {
            $('.banking').hide();
        }

        // cash , cheque, bkash....
        $('#paid_by').on('change', function() {
            var paid_by = $(this).val();
            // cash
            if (paid_by == 1) {
                $('.banking').hide();
                $('.bank_name').val('');
                $('.cheque_no').val('');
                $('#account_id').val('');
            }
            // cheque
            else if (paid_by == 2) {
                $('.banking').show();
            }
            // mobile banking
            else {
                $('.banking').hide();
                $('.bank_name').val('');
                $('.branch_name').val('');
                $('.cheque_no').val('');
                $('#account_id').val('');
            }
        });
    });
</script>
// end payment type calculation



// fixed after point in jquery

 var total = parseFloat(1.25555) * parseFloat(1);
 total = total.toFixed(3);

// end

