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
