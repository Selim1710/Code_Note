<?php
/*

use Illuminate\Support\Facades\File;


$filename = '';
if ($request->hasfile('image')) {
    File::delete(public_path('/uploads/users/' . $user->image));
    $file = $request->file('image');
    $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads/users'), $filename);
}