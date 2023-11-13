<?php
/*

// <!-- error message -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
@endif

// <!-- validation rule -->

// form validation
$request->validate([
    'name' => 'required|alpha', // alpha:only take letter
    'username' => 'required|regex:/^\S*$/u|regex:/^[\pL\s\-]+$/u', // for white space + special character 
]);

$request->validate([
    'email' => 'unique:table_name,email,' . $user->id
]);



// <!-- file size validation using jquery -->
 <script>
    $(document).ready(function() {
        $('#image').bind('change', function() {
            var uploaded_file_size = (this.files[0].size);
            var file_size = Math.round(uploaded_file_size / (1024 * 1024)); // for mb
            // console.log('file_size: ' + file_size);

            var maximum_required_size = 2; // 2mb validation
            if (file_size > maximum_required_size) {
                alert('You can upload maximum: '+maximum_required_size +' mb . But your file size is: '+file_size + 'mb .');
                $('#image').val('');
            };
        });
    });
</script>