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
            var file_size = (this.files[0].size);
            var maximum_file_size = Math.round(file_size / (1024 * 1024)); // for mb
            // console.log('maximum_file_size: ' + maximum_file_size);

            // 2mb validation
            if (maximum_file_size > 2) {
                alert('large');
                $('#image').val('');
            };
        });
    });
</script>
