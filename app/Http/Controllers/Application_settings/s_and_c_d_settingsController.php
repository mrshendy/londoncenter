<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storecourses;
use App\models\s_and_c;
use App\models\place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\web\file_storage;
use App\models\sections;
use App\models\s_and_c_d;

class s_and_c_d_settingsController extends Controller
{
    use file_storage;

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $s_and_c_d = s_and_c_d::all();
        $place = place::all();
        return view('settings.courses_details', compact('s_and_c_d', 'place'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $sections = sections::all();
        $place = place::all();
        return view('settings.coursescreate', compact('sections', 'place'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        if (
            s_and_c_d::where('date', $request->date)
                ->where('place_id', $request->place_id)
                ->where('s_and_c_id', $request->course_id)
                ->exists()
        ) {
            return redirect()
                ->back()
                ->withErrors([trans('sections_trans.existes')]);
        }
        try {
            $courses_details = new s_and_c_d();
            $courses_details->duration = ['en' => $request->duration_en, 'ar' => $request->duration_ar];
            $courses_details->status = 1;
            $courses_details->place_id = $request->place_id;
            $courses_details->s_and_c_id = $request->course_id;
            $courses_details->date = $request->date;
            $courses_details->user_add = Auth::user()->id;
            $courses_details->save();
            session()->flash('add');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $s_and_c_d = s_and_c_d::where('s_and_c_id', $id)->get();
        $place = place::all();
        $course_id = $id;
        return view('settings.seminars_and_conferences_details', compact('s_and_c_d', 'place', 'course_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, )
    {
       
        $courses_details = s_and_c_d::findOrFail($request->id);

        // Update the course details with the new data
        $courses_details->duration = ['en' => $request->duration_en, 'ar' => $request->duration_ar];
        $courses_details->status = $request->has('status') ? $request->status : 1;
        $courses_details->place_id = $request->place_id;
        $courses_details->date = $request->date;
        $courses_details->save();

        // Flash a session message to indicate the update was successful
        session()->flash('add', 'Course details updated successfully!');

        // Redirect back to the previous page
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
        try {
            $courses_details = s_and_c_d::findorFail($request->id)->delete();
            session()->flash('edit_m');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }
}

?>