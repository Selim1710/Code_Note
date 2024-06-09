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


//////////////////////////  check-uncheck //////////////////////////
    <script>
        function check_uncheck_checkbox(category_id, isChecked) {
            if (isChecked) {
                $('.sub_category_' + category_id).each(function() {
                    $('#' + category_id).show(); // sub category show
                    this.checked = true;
                });
            } else {
                $('.sub_category_' + category_id).each(function() {
                    this.checked = false;
                    $('#' + category_id).hide(); // sub category hide
                });
            }
        }
    </script>


 

//////////////////////////  Ajax search //////////////////////////
        
$('#search').on('keyup', function() {
    var search = $(this).val();
    // alert(search);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: 'get',
        url: '{{ URL::to('search/yearly/deposit/member') }}',
        data: { value:search },
        success: function(data) {
            $('#result').html(data)
        },
    });
});                         
    
 // controller code:

public function search(Request $request)
{
    $search = $request->value;
    $data['items'] = YearlyDeposit::where('years',$search)->orderBy('id','DESC')->get();
    return view('yearlydeposit.search_yearly_deposite_by_ajax', $data);
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




///////////////////////////// fixed after point in jquery ///////////////////////////

 var total = parseFloat(1.25555) * parseFloat(1);
 total = total.toFixed(3);

// end

