<?php



namespace App\Http\Controllers\website;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\Storedashbord;
use App\models\generalsetting;
use App\models\sections;
use App\models\gallery;
use App\models\requestscontactus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\web\sendmail;
class contactController extends Controller
{
    use sendmail;
  public function index()
  {
    $footer_data = generalsetting::first();
    $sections = Sections::take(5)->get();
    $gallery = gallery::take(5)->get();
     $category = Sections::all();
    return view('website.contact',compact('footer_data','sections','gallery','category'));
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
 public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string',
            'massege' => 'nullable|string',
        ]);

        // Create a new instance of RequestsContactUs model and fill it with validated data
        $requestContact = requestscontactus::create($validatedData);
        // Optionally, you can return a response or redirect back with a success message
        $this->sendMail("Contact Mail",$request->name,$request->email,$request->phone,$request->address,$request->message);
        return redirect()->back()->with('success',trans('trans_website.requestContactsave'));
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    return view('dashbord.reserve');

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