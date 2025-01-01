<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storecourses;
use App\models\s_and_c;
use App\models\place ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\web\file_storage;
use App\models\sections ;
use App\models\s_and_c_d;
class s_and_c_settingsController extends Controller
{
    use file_storage;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $s_and_c=s_and_c::all();
    return view('settings.seminars_and_conferences',compact('s_and_c'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
     return view('settings.seminars_and_conferencescreate');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
public function store(Request $request)
{
  /*  // تحقق من أن اسم الدورة موجود بالفعل بأي من اللغتين
    if (s_and_c::where('name->ar', $request->name_ar)->orWhere('name->en', $request->name_en)->exists()) {
        return redirect()->back()->withErrors([trans('sections_trans.existes')]);
    }

    // تحقق من صحة البيانات القادمة
    $request->validate([
        'name_en' => 'required|string|max:255',
        'name_ar' => 'required|string|max:255',
        'img' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'file' => 'file|mimes:pdf,doc,docx|max:10240',
    ]);

    try {*/
        // رفع الملفات
        $img = $this->file_storage($request->file('img'), 'img_s_and_c');
        $file = $this->file_storage($request->file('file'), 'file_s_and_c');

        // إنشاء كائن جديد من courses وتعبئة البيانات
        $courses = new s_and_c();
        $courses->name = ['en' => $request->name_en, 'ar' => $request->name_ar];
        $courses->introduction = ['en' => $request->introduction_en, 'ar' => $request->introduction_ar];
        $courses->content = ['en' => $request->course_content_en, 'ar' => $request->course_content_ar];
        $courses->status = 1;
        $courses->img = $img;
        $courses->file = $file;
        $courses->sorting = $request->sorting;
        $courses->user_add = Auth::user()->id;
        $courses->save();

        // عرض رسالة نجاح وتوجيه المستخدم
        session()->flash('add', 'added successfully!');
        return redirect()->route('s_and_c_d_settings.show', ['id' => $courses->id]);

    /*} catch (\Exception $e) {
        // التعامل مع الأخطاء وإعادة التوجيه مع رسالة الخطأ
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }*/
}

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
        $s_and_c = s_and_c::findorFail($id);
        $sections=sections::all();
        $place=place::all();
        $s_and_c_d=s_and_c_d::where('s_and_c_id',$id)->get();
        return view('settings.seminars_and_conferencesedit',compact('s_and_c','sections','place','s_and_c_d','id'));
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
  public function update(Storecourses $request)
  {
    try
    {
    $courses= s_and_c::findorFail($request->id);
    if($request->file('img'))
    {
       $img = $this->file_storage($request->file('img'), 'img_courses');
    }else
    {
      $img=$courses->img;
    }
     if($request->file('file'))
    {
       $file = $this->file_storage($request->file('file'), 'file_courses');
    }else
    {
      $file=$courses->file;
    }
        $courses->update([
        $courses->name=['en'=>$request->name_en,'ar'=>$request->name_ar],
        $courses->introduction=['en'=>$request->introduction_en,'ar'=>$request->introduction_ar],
        $courses->content=['en'=>$request->course_content_en,'ar'=>$request->course_content_ar],
        $courses->status=$request->status,
        $courses->img = $img,
        $courses->file = $file,
        $courses->sorting=$request->sorting,
    ]);
    session()->flash('edit_m');
    return redirect()->route('s_and_c_settings.index');

    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Request $request)
  {
    try
    {

      $courses= s_and_c::findorFail($request->id)->delete();
      session()->flash('edit_m');
      return redirect()->route('s_and_c_settings.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>