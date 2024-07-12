<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storecourses;
use App\models\courses ;
use App\models\place ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\web\file_storage;
use App\models\sections ;
use App\models\courses_details ;


class courses_settingsController extends Controller
{
    use file_storage;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $courses=courses::all();
    return view('settings.courses',compact('courses'));

  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      $sections=sections::all();
      $place=place::all();
     return view('settings.coursescreate',compact('sections','place'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Storecourses $request)
  {
    if(courses::where('name->ar',$request->name_ar)->orwhere('name->en',$request->name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('sections_trans.existes') ]);
    }
    try
    {
        $img = $this->file_storage($request->file('img'), 'img_courses');
        $file = $this->file_storage($request->file('file'),'file_courses');
        $validated = $request->validated();
        $courses=new courses();
        $courses->name=['en'=>$request->name_en,'ar'=>$request->name_ar];
        $courses->introduction=['en'=>$request->introduction_en,'ar'=>$request->introduction_ar];
        $courses->course_content=['en'=>$request->course_content_en,'ar'=>$request->course_content_ar];
        $courses->status=1;
        $courses->img = $img;
        $courses->file = $file;
        $courses->id_sections=$request->sections;
        $courses->id_place=$request->place;
        $courses->date=$request->date;
        $courses->duration=$request->duration;
        $courses->price=$request->price;
        $courses->sorting=$request->sorting;
        $courses->user_add = Auth::user()->id;
        $courses->save();
        session()->flash('add');
        return redirect()->route('courses_details_settings.show', ['id' => $courses->id]);

    }catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
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
        $courses = courses::findorFail($id);
        $sections=sections::all();
        $place=place::all();
        $courses_details=courses_details::where('course_id',$id)->get();
        return view('settings.coursesedit',compact('courses','sections','place','courses_details','id'));
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
    $courses= courses::findorFail($request->id);
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
        $courses->course_content=['en'=>$request->course_content_en,'ar'=>$request->course_content_ar],
        $courses->status=$request->status,
        $courses->img = $img,
        $courses->file = $file,
        $courses->id_sections=$request->sections,
        $courses->duration=$request->duration,
        $courses->sorting=$request->sorting,
    ]);
    session()->flash('edit_m');
    return redirect()->route('courses_settings.index');

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

      $courses= courses::findorFail($request->id)->delete();
      session()->flash('edit_m');
      return redirect()->route('courses_settings.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>