<?php

namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Storedashbord;
use App\models\generalsetting;
use App\models\sections;
use App\models\gallery;
use App\models\s_and_c;
use App\models\place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use App\models\s_and_c_d;
use Illuminate\Support\Facades\DB;
class s_and_cController extends Controller
{
public function index()
{
    // جلب الأقسام النشطة
    $category = sections::where('status', 1)->get();

    // تحديد اللغة بناءً على اللغة الحالية للتطبيق
    $lang = App::getLocale() == 'ar' ? 'ar' : 'en'; // Set a default or handle other languages

    // جلب البيانات العامة والإعدادات
    $footer_data = generalsetting::first();

    // جلب 5 عناصر فقط من المعرض النشط
    $gallery = gallery::where('status', 1)->take(6)->get();

    // بناء استعلام معقد لجلب البيانات من الجداول المرتبطة
    $query = DB::table('s_and_c')
        ->join('s_and_c_d', 's_and_c.id', '=', 's_and_c_d.s_and_c_id')
        ->join('place', 's_and_c_d.place_id', '=', 'place.id')
        ->select('s_and_c.*', 's_and_c_d.duration', 'place.name as place_name', 's_and_c_d.date')
        ->where('s_and_c.status', 1)
        ->where('s_and_c_d.status', 1)
        ->whereNull('s_and_c.deleted_at')
        ->whereNull('s_and_c_d.deleted_at');

    // ترتيب النتائج حسب التاريخ بترتيب تصاعدي
    $query->orderBy('s_and_c_d.date', 'asc');

    // جلب النتائج المجمعه حسب التاريخ (السنة-الشهر)
    $s_and_c = $query->get()->groupBy(function ($s_and_c) {
        return Carbon::parse($s_and_c->date)->format('Y-m');
    });

    // ترجمة الأسماء بناءً على اللغة المحددة
    $s_and_c = $s_and_c->map(function ($group) use ($lang) {
        return $group->map(function ($s_and_c) use ($lang) {
            $s_and_c->name = json_decode($s_and_c->name, true)[$lang];
            $s_and_c->duration = json_decode($s_and_c->duration, true)[$lang];
            $s_and_c->place_name = json_decode($s_and_c->place_name, true)[$lang];
            return $s_and_c;
        });
    });
    // جلب التواريخ المميزة وتنسيقها
    $dates = s_and_c_d::selectRaw('DISTINCT DATE_FORMAT(s_and_c_d.date, "%Y-%m") as date')
        ->join('s_and_c', 's_and_c.id', '=', 's_and_c_d.s_and_c_id')
        ->whereDate('s_and_c_d.date', '>=', Carbon::now())
        ->get()
        ->map(function ($s_and_c) use ($lang) {
            return [
                'original' => $s_and_c->date,
                'formatted' => Carbon::parse($s_and_c->date . '-01')->locale($lang)->isoFormat('MMMM YYYY'),
            ];
        })
        ->toArray();

    // عرض البيانات في العرض المحدد
    return view('website.seminars_and_conferences', compact('footer_data', 'gallery', 's_and_c', 'dates', 'category'));
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