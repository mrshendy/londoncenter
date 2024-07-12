<?php
namespace App\Traits\web;
use App\Mail\YourMailable;
use App\Mail\YourMailableCourse;
use Illuminate\Support\Facades\Mail;
trait sendmail
{
    public function sendMail($type, $name, $email, $phone, $subject, $message)
    {
        $details = [
            'type' => $type,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'subject' => $subject,
            'message' => $message,
        ];

        Mail::to('mohamad@lcentre.co.uk')->send(new YourMailable($details));
        Mail::to('info@lcentre.co.uk')->send(new YourMailable($details));
        Mail::to('mohamedshendy448@gmail.com')->send(new YourMailable($details));

        return 'Email Sent';
    }
    public function sendMail_join($type, $name, $email, $phone, $Course_name, $Course_date, $Course_Place, $message)
    {
        $details = [
            'type' => $type,
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'Course_name' => $Course_name,
            'Course_date' => $Course_date,
            'Course_Place' => $Course_Place,
            'message' => $message,
        ];

        /*  Mail::to('mohamad@lcentre.co.uk')->send(new YourMailableCourse($details));
        Mail::to('info@lcentre.co.uk')->send(new YourMailableCourse($details));
        Mail::to('mohamedshendy448@gmail.com')->send(new YourMailableCourse($details));*/
        // Define recipients
        $to = 'mohamad@lcentre.co.uk';
        $bcc = 'mohamedshendy448@gmail.com';
        $cc = 'info@lcentre.co.uk';
        Mail::to($to)->cc($cc)->bcc($bcc)->send(new YourMailableCourse($details));
        return 'Email Sent';
    }
}

?>