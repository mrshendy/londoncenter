<?php
namespace App\Http\Controllers\Application_settings;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests\Storesections;
use App\models\gallery ;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\web\file_storage;


class gallery_settingsController extends Controller
{
    use file_storage;

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $gallery=gallery::all();
    return view('settings.gallery',compact('gallery'));

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
  public function store(Request $request)
  {
   
    try
    {
        $img = $this->file_storage($request->file('img'), 'img_gallery');
        $gallery=new gallery();
        $gallery->status=1;
        $gallery->img = $img;
        $gallery->sorting=$request->sorting;
        $gallery->user_add = Auth::user()->id;
        $gallery->save();
        session()->flash('add');
        return redirect()->route('gallery_settings.index');

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
    $gallery= gallery::findorFail($request->id);
    if($request->file('img'))
    {
       $img = $this->file_storage($request->file('img'), 'img_gallery');
    }else
    {
      $img=$gallery->img;
    }
    $gallery->update([
        $gallery->img=$img,
        $gallery->status=$request->status,
        $gallery->sorting=$request->sorting,

    ]);
    session()->flash('edit_m');
    return redirect()->route('gallery_settings.index');

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

      $gallery= gallery::findorFail($request->id)->delete();
      Alert::success( '', trans('nationalities_trans.savesuccess'));
      return redirect()->route('gallery_settings.index');
    }
    catch(\Exception $e)
    {
        return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
    }
  }

}

?>