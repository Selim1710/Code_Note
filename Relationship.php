<?php
/*

<!-- Filter in relationship -->

$doctors = Doctor::with('user')
            ->whereHas('user', function (Builder $query) use ($searched_doctor_name) {
                $query->where('name', 'like', $searched_doctor_name);
            })
            ->get();
        } 



*/