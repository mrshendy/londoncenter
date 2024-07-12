<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storesections;
use App\models\countries;
use App\models\sections ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\web\file_storage;


class sections_settingsController extends Controller
{
    use file_storage;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $sections=sections::all();
    return view('settings.sections',compact('sections'));

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
  public function store(Storesections $request)
  {
    if(sections::where('name->ar',$request->name_ar)->orwhere('name->en',$request->name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('sections_trans.existes') ]);
    }
    try
    {
        $img = $this->file_storage($request->file('img'), 'img_sections');
        $validated = $request->validated();
        $sections=new sections();
        $sections->name=['en'=>$request->name_en,'ar'=>$request->name_ar];
        $sections->status=1;
        $sections->img = $img;
        $sections->sorting=$request->sorting;
        $sections->user_add = Auth::user()->id;
        $sections->save();
        session()->flash('add');
        return redirect()->route('sections_settings.index');

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
  public function update(Storesections $request)
  {
    try
    {
    $validated = $request->validated();
    $sections= sections::findorFail($request->id);
    if($request->file('img'))
    {
       $img = $this->file_storage($request->file('img'), 'img_sections');
    }else
    {
      $img=$sections->img;
    }
    $sections->update([
        $sections->name=['en'=>$request->name_en,'ar'=>$request->name_ar],
        $sections->img=$img,
        $sections->status=$request->status,
        $sections->sorting=$request->sorting,

    ]);
    session()->flash('edit_m');
    return redirect()->route('sections_settings.index');

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

      $sections= sections::findorFail($request->id)->delete();
      Alert::success( '', trans('nationalities_trans.savesuccess'));
      return redirect()->route('sections_settings.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>