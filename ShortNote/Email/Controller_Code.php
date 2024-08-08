<?php
/*

# step-1: go to env file setup smtp code.
#step-2: go to controller and copy-paste below code:

public function index(){
    
    $mail_to_name = "Corporatetechbd";
    $mail_to_email = "info@corporatetechbd.com";

    $data['name'] = $request->name;
    $data['phone'] = $request->phone;
    $data['email'] = $request->email;
    $data['title'] = $request->title;
    $data['description'] = $request->description;


    Mail::send('site.emails.complain_text', $data, function ($message) use ($mail_to_email, $mail_to_name) {
    $message->to($mail_to_email, $mail_to_name)->subject('Complain and advice in e-commerce website.');
    });
    // return view('site.emails.complain_text',$data);

    if (Mail::failures()) {
    return Redirect::back()->with('flash_message_error', 'Sorry! Complain could not emailed!');
    } else {
    $data = $request->all();
    ComplainAndAdvice::create($data);
    return Redirect::back()->with('flash_message_success', 'Complain submitted successfully.');
    }
    }

*/
?>