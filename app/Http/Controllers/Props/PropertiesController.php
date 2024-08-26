<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use App\Models\Prop\AllRequest;
use App\Models\Prop\SavedProp;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    public function index()
    {
        $props = Property::take(9)->orderBy('id', 'DESC')->get();
        return view('home', compact('props'));
    }

    public function single($id)
    {
        $singleProp = Property::find($id);
    
        if (!$singleProp) {
            return abort(404, 'Property not found');
        }
    
        $propImages = PropImage::where('prop_id', $id)->get();
        $relatedProps = Property::where('home_type', $singleProp->home_type)
            ->where('id', '!=', $id)
            ->latest()
            ->take(3)
            ->get();

        $validateFormCount = 0;
        if (Auth::check()) {
            $validateFormCount = AllRequest::where('prop_id', $id)
                ->where('user_id', Auth::id())
                ->count();
        }

        return view('props.single', compact('singleProp', 'propImages', 'relatedProps', 'validateFormCount'));
    }

    public function insertRequest(Request $request)
{
    // Ensure the user is authenticated
    if (!Auth::check()) {
        return redirect()->back()->withErrors(['error' => 'User is not authenticated']);
    }

    // Validate the incoming request
    $validated = $request->validate([
        'prop_id' => 'required|exists:props,id',
        'agent_name' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    // Check if the request already exists
    $existingRequestCount = AllRequest::where('prop_id', $validated['prop_id'])
        ->where('user_id', Auth::user()->id)
        ->count();
    
    if ($existingRequestCount > 0) {
        return redirect()->back()->withErrors(['error' => 'You already sent a request for this property']);
    }

    // Add user_id to validated data
    $validated['user_id'] = Auth::user()->id;

    // Create the request
    try {
        AllRequest::create($validated);
    } catch (\Exception $e) {
        // Debug the error
        // dd($e->getMessage());
    }

    // Redirect with a success message
    return redirect('/props/prop-details/'.$validated['prop_id'])->with('success', 'Request completed successfully');
}
    public function saveProps(Request $request)
    {
        // Ensure the user is authenticated
        if (!Auth::check()) {
            return redirect()->back()->withErrors(['error' => 'User is not authenticated']);
        }
        
        // Validate the incoming request
        $validated = $request->validate([
            'prop_id' => 'required|exists:props,id',
            'title' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
        ]);
    
        // Create the saved property
        try {
            SavedProp::create([
                'prop_id' => $validated['prop_id'],
                'user_id' => Auth::user()->id,
                'title' => $validated['title'],
                'image' => $validated['image'],
                'location' => $validated['location'],
                'price' => $validated['price'],
            ]);
        } catch (\Exception $e) {
            // Debug the error
            dd($e->getMessage());
        }
    
        // Redirect with a success message
        return redirect('/props/prop-details/'.$validated['prop_id'])->with('save', 'Property saved successfully');
    }
    
    public function propsBuy()
    {
        $type = "Buy";

        $propsBuy = Property::select()->where('type', $type)->get();
        return view('props.propsbuy', compact('propsBuy'));
    }

    public function propsRent()
    {
        $type = "Rent";

        $propsRent = Property::select()->where('type', $type)->get();
        return view('props.propsrent', compact('propsRent'));
    }


    public function displayByHomeType($hometype)
    {

        $propsByHomeType = Property::select()->where('home_type', $hometype)->get();
        return view('props.propshometype', compact('propsByHomeType', 'hometype'));
    }


    public function priceAsc()
    {

        $propsByPriceAsc = Property::select()->take(9)->orderBy('price', 'asc')->get();
        return view('props.propspriceacs', compact('propsByPriceAsc'));
    }

    public function priceDesc()
    {

        $propsByPriceDesc = Property::select()->take(9)->orderBy('price', 'desc')->get();
        return view('props.propspricedesc', compact('propsByPriceDesc'));
    }
    

    //searching props

    public function searchProps(Request $request)
    {
        $list_types = $request->get('list_types');
        $offer_types = $request->get('offer_types');
        $select_city = $request->get('select_city');
    
        // dd($list_types, $offer_types, $select_city);

        $query = Property::query();
    
        if (!empty($list_types)) {
            $query->where('home_type', '=', $list_types);
        }
    
        if (!empty($offer_types)) {
            $query->where('type', '=', $offer_types);
        }
    
        if (!empty($select_city)) {
            $query->where('city', '=', $select_city);
        }
    
        // Debugging: Get SQL query and bindings
      
        // dd($query->toSql(), $query->getBindings());

        $searches = $query->get();


        return view('props.searches', compact('searches'));
    }
    
    
}
