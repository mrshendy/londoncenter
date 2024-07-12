<?php
namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\RequestsJoin;
use App\Traits\web\sendmail;

class requestsjoincontroller extends Controller
{
     use sendmail;
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'notes' => 'nullable|string',
            'id_courses_details' => 'nullable|integer', // Validate as per your requirement
        ]);

        // Create a new instance of RequestsJoin model and fill it with validated data
        RequestsJoin::create($validatedData);
        $this->sendMail_join("Request to join a course",$request->name,$request->email,$request->phone,$request->name_courses_details,$request->date_courses_details,$request->place_courses_details,$request->message);

        // Optionally, you can return a response or redirect back with a success message
        return redirect()->back()->with('success',trans('trans_website.requestContactsave'));
    }
}