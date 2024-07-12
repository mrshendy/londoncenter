<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Storedashbord;
use App\models\generalsetting;
use App\models\sections;
use App\models\gallery;
use App\models\courses;
use App\models\place;
use App\models\courses_details;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class detailsCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $date = generalsetting::first();
        $sections = Sections::where('status', 1)->get();
        $place = place::where('status', 1)->get();
        $gallery = gallery::where('status', 1)->take(5)->get();
        $courses = courses::with('sections')->where('status', 1)->orderBy('date')->get();
        return view('website.courses', compact('date', 'sections', 'gallery', 'courses', 'place'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashbord.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Storedashbord $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $footer_data = generalsetting::first();
        $sections = sections::where('status', 1)->get();
        $place = place::where('status', 1)->get();
        $gallery = gallery::where('status', 1)->take(5)->get();
        $category = sections::where('status', 1)->get();
        $courses = courses::with(['sections'])->findOrFail($id);
        $courses_details=courses_details::with(['place'])->where('course_id',$id)->where('status', 1)->get();
        return view('website.SingleCourse',compact('footer_data', 'sections', 'gallery', 'courses', 'place', 'category','courses_details'));
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
    public function update(Storedashbord $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {
    }
}

?>