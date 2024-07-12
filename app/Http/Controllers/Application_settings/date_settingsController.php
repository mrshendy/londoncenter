<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storesections;
use App\models\date ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class date_settingsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $date=date::all();
    return view('settings.date',compact('date'));

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
    if(date::where('name->ar',$request->name_ar)->orwhere('name->en',$request->name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('sections_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $date=new date();
        $date->name=['en'=>$request->name_en,'ar'=>$request->name_ar];
        $date->status=1;
        $date->user_add = Auth::user()->id;
        $date->save();
        session()->flash('add');
        return redirect()->route('date_settings.index');

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
     $date= date::findorFail($request->id);
    $validated = $request->validated();
    $date->update([
        $date->name=['en'=>$request->name_en,'ar'=>$request->name_ar],
        $date->status=$request->status,
        
    ]);
    session()->flash('edit_m');
    return redirect()->route('date_settings.index');

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

      $date= date::findorFail($request->id)->delete();
      Alert::success( '', trans('nationalities_trans.savesuccess'));
      return redirect()->route('date_settings.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>