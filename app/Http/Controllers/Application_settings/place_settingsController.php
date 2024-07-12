<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storesections;
use App\models\place;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class place_settingsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $place=place::all();
    return view('settings.place',compact('place'));

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
    if(place::where('name->ar',$request->name_ar)->orwhere('name->en',$request->name_en)->exists())
    {
        return  redirect()->back()->withErrors([trans('sections_trans.existes') ]);
    }
    try
    {
        $validated = $request->validated();
        $place=new place();
        $place->name=['en'=>$request->name_en,'ar'=>$request->name_ar];
        $place->status=1;
        $place->user_add = Auth::user()->id;
        $place->save();
        session()->flash('add');
        return redirect()->route('place_settings.index');

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
    $place= place::findorFail($request->id);
    $validated = $request->validated();
    $place->update([
        $place->name=['en'=>$request->name_en,'ar'=>$request->name_ar],
        $place->status=$request->status,
    ]);
    session()->flash('edit_m');
    return redirect()->route('place_settings.index');

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

      $place= place::findorFail($request->id)->delete();
      Alert::success( '', trans('nationalities_trans.savesuccess'));
      return redirect()->route('place_settings.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>