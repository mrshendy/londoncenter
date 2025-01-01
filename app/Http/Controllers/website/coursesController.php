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
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\models\courses_details;
use Illuminate\Support\Facades\DB;
class coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        if (App::getLocale() == 'ar') {
            $lang = 'ar';
        } else {
            $lang = 'en'; // Set a default or handle other languages
        }
        $footer_data = generalsetting::first();
        $sections = sections::where('status', 1)->get();
        $place = place::where('status', 1)->get();
        $gallery = gallery::where('status', 1)->take(6)->get();
        $courses = courses::where('id_sections', 7)->where('status', 1)->orderBy('date')->get();
        $category = sections::where('status', 1)->get();
        $dates = courses::selectRaw('DATE_FORMAT(date, "%Y-%m") as date')
            ->distinct()
            ->get()
            ->map(function ($course) use ($lang) {
                return [
                    'original' => $course->date,
                    'formatted' => Carbon::parse($course->date . '-01')
                        ->locale($lang)
                        ->isoFormat('MMMM YYYY'),
                ];
            })
            ->filter(function ($date) {
                return Carbon::parse($date['original'] . '-01')->isAfter(Carbon::now()->startOfMonth());
            })
            ->toArray();

        return view('website.courses', compact('footer_data', 'sections', 'gallery', 'courses', 'place', 'category', 'dates'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function create()
    {
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
    public function show(Request $request)
    {
        
        if (App::getLocale() == 'ar') {
            $lang = 'ar';
        } else {
            $lang = 'en'; // Set a default or handle other languages
        }
        $footer_data = generalsetting::first();
        $sections = sections::where('status', 1)->get();
        $gallery = gallery::where('status', 1)->take(6)->get();
        
        // Initialize the courses query with join on courses_details
        $query = DB::table('courses')
        ->join('courses_details', 'courses.id', '=', 'courses_details.course_id')
        ->join('place', 'courses_details.place_id', '=', 'place.id')
        ->select('courses.*', 'courses_details.duration',  'place.name as place_name', 'courses_details.date')
        ->where('courses.status', 1)
        ->where('courses_details.status', 1)
        ->where('courses.deleted_at', null)
        ->where('courses_details.deleted_at', null);
        // Filter by category if 'category_id' is provided in the request
        if ($request->filled('category_id')) {
            $category_id = $request->input('category_id');
            $query->where('courses.id_sections', $category_id);
        }

        // Filter by course name if 'name' is provided in the request
        if ($request->filled('name')) {
            $name = $request->input('name');
            $query->where('courses.name', 'like', '%' . $name . '%');
        }

        // Sort courses by date in ascending order
        $query->orderBy('courses_details.date', 'asc');

        // Fetch filtered and sorted courses and group them by formatted date (Year-Month)
        $courses = $query->get()->groupBy(function ($course) {
            return Carbon::parse($course->date)->format('Y-m');
        });

           // Translate course names based on selected language
        $courses = $courses->map(function ($group) use ($lang) {
            return $group->map(function ($course) use ($lang) {
                $name = json_decode($course->name, true)[$lang];
                $duration = json_decode($course->duration, true)[$lang];
                $place_name = json_decode($course->place_name, true)[$lang];
                $course->name = $name;
                $course->duration = $duration;
                $course->place_name = $place_name;
                return $course;
            });
        });
        $category = Sections::all();

        // Get distinct dates from the courses table and format them
        $dates = courses_details::selectRaw('DISTINCT DATE_FORMAT(courses_details.date, "%Y-%m") as date')
            ->join('courses', 'courses.id', '=', 'courses_details.course_id')
            ->where('courses.id_sections', $category_id)
            ->whereDate('courses_details.date', '>=', Carbon::now())
            // Filter out dates that are after the current date // Replace with your actual column name and value
            ->get()
            ->map(function ($course) use ($lang) {
                return [
                    'original' => $course->date,
                    'formatted' => Carbon::parse($course->date . '-01')
                        ->locale($lang)
                        ->isoFormat('MMMM YYYY'),
                ];
            })
            ->toArray();

        return view('website.courses', compact('footer_data', 'sections', 'gallery', 'courses', 'category', 'dates','category_id'));
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