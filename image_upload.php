<?php
/*

use Illuminate\Support\Facades\File;



/////////////////// single image upload  ///////////////////

if ($request->hasfile('image')) {
    // File::delete(public_path('/uploads/users/' . $user->image));
    $file = $request->file('image');
    $filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads/users'), $filename);
}else{
    $filename = $user->image ?? '';
}


/////////////////// multiple image upload  ///////////////////

if (!empty($request->degree)) {
    foreach ($request->degree as $index => $degree) {
        // if file exist
        if (isset($request->file('file')[$index])) {
            // return 'file';
            $file = $request->file('file')[$index];
    
            if ($file) {
                File::delete(public_path('/uploads/users/education_file/' . $file->getClientOriginalName()));
                $edu_filename = date('Ymdmhs') . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/users/education_file'), $edu_filename);
    
                UserEducation::create([
                    'user_id' => $user->id,
                    'degree' => $degree,
                    'institute' => $request->institute[$index] ?? null,
                    'board' => $request->board[$index] ?? null,
                    'passing_year' => $request->passing_year[$index] ?? null,
                    'result' => $request->result[$index] ?? null,
                    'file' => $edu_filename,
                ]);
            }
        } else {
            // return 'no file';
            $edu_filename = $request->file[$index] ?? '';
            UserEducation::create([
                'user_id' => $user->id,
                'degree' => $degree,
                'institute' => $request->institute[$index] ?? null,
                'board' => $request->board[$index] ?? null,
                'passing_year' => $request->passing_year[$index] ?? null,
                'result' => $request->result[$index] ?? null,
                'file' => $edu_filename ?? null,
            ]);
        }
    }
}
