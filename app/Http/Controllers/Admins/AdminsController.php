<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\Admin;
use App\Models\Prop\Property;
use App\Models\Prop\AllRequest;
use App\Models\Prop\HomeType;
use App\Models\Prop\PropImage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class AdminsController extends Controller
{
    

    public function viewLogin(){
        // dd(auth()->guard('admin')->user());
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admins.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Error logging in']);
        }
    }

    public function index(){
        // dd(session()->all());

        $adminsCount = Admin::select()->count();
        $propsCount = Property::select()->count();
        $hometypesCount = HomeType::select()->count();

       
        return view('admins.index', compact('adminsCount', 'propsCount', 'hometypesCount'));

        
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('admin')->user();
        dd('User before logout:', $user);

        Auth::guard('admin')->logout();

        dd('Session after logout:', $request->session()->all());


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');  // Redirect to the home page
    }

    
    public function AllAdmins(){
        // dd(session()->all());

        $allAdmins = Admin::select()->get();
        

       
        return view('admins.admins', compact('allAdmins'));

        
    }
    public function createAdmins(){
        // dd(session()->all());

        $allAdmins = Admin::select()->get();
        

       
        return view('admins.createadmins');

        
    }
    public function storeAdmins(Request $request)
    {

        Request()->validate([
            "name" => "required|max:40",
            "email" => "required|max:40",
            "password" => "required|max:40",

        ]);


        $storeAdmins =  Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($storeAdmins) {
            return redirect('/admin/all-admins/')->with('success', 'Admin added successfully');

        }
    }

    public function allHomeTypes(){
        // dd(session()->all());

        $allHomeTypes = HomeType::select()->get();
        

       
        return view('admins.hometypes', compact('allHomeTypes'));

        
    }
    public function createHomeTypes(){

        

       
        return view('admins.createhometypes');

        
    }
    public function storeHomeTypes(Request $request)
    {

        Request()->validate([
            "hometypes" => "required|max:40",
        ]);


        $storeHomeTypes =  HomeType::create([
            'hometypes' => $request->hometypes,
        ]);

        if($storeHomeTypes) {
            return redirect('/admin/all-hometypes/')->with('success', 'Home type created successfully');

        }
    }
    public function editHomeTypes($id){

        $homeType = HomeType::find($id);

       
        return view('admins.edithometypes', compact('homeType'));

        
    }



    
    public function updateHomeTypes(Request $request, $id)
    {

        Request()->validate([
            "hometypes" => "required|max:40",
        ]);


        $singleHomeType = HomeType::find($id);
        $singleHomeType->update($request->all());
        

        if($singleHomeType) {
            return redirect('/admin/all-hometypes/')->with('update', 'Home type updated successfully');

        }
    }

    public function deleteHomeTypes($id){

        $homeType = HomeType::find($id);

        $homeType->delete();
       
        if($homeType) {
            return redirect('/admin/all-hometypes/')->with('delete', 'Home type deleted successfully');

        }
    }   
    
    public function Requests(){

        $requests = AllRequest::all();

       
        return view('admins.requests', compact('requests'));

        
    }

    public function allProps(){

        $props = Property::all();

       
        return view('admins.props', compact('props'));

        
    }


    public function createProps(){


       
        return view('admins.createprops');

        
    }


    public function storeProps(Request $request)
    {
        // dd($request->all());
    
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'beds' => 'required|integer',
            'baths' => 'required|integer',
            'sq_ft' => 'required|integer',
            'year_built' => 'required|integer',
            'price_sqft' => 'required|numeric',
            'location' => 'required|string|max:255',
            'home_type' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'more_info' => 'nullable|string',
            'agent_name' => 'required|string|max:255',
        ]);
    
        // image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $destinationPath = public_path('assets/images/');
            $image->move($destinationPath, $imageName);
        } else {
            $imageName = null; 
        }
    
        // Store the property data
        $storeProps = Property::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $imageName, 
            'beds' => $request->beds,
            'baths' => $request->baths,
            'sq_ft' => $request->sq_ft,
            'year_built' => $request->year_built,
            'price_sqft' => $request->price_sqft,
            'location' => $request->location,
            'home_type' => $request->home_type,
            'type' => $request->type,
            'city' => $request->city,
            'more_info' => $request->more_info,
            'agent_name' => $request->agent_name,
        ]);
    
        // Redirect with success message
        if ($storeProps) {
            return redirect('/admin/all-props/')->with('success', 'Property added successfully');
        }
    }
    
    public function createGallery(){

        $allProps = Property::all();


       
        return view('admins.creategallery', compact('allProps'));

        
    }

    public function storeGallery(Request $request)
    {
        $request->validate([
            'image.*' => 'image|max:2048', 
            'prop_id' => 'required|exists:props,id', 
        ]);
    
        $files = [];
        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $file) {
                $path = "assets/images_gallery";
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path($path), $name);
                $files[] = $name;
    
                PropImage::create([
                    "image" => $name,
                    "prop_id" => $request->prop_id,
                ]);
            }
            return redirect()->route('gallery.create')->with('success', 'Gallery created successfully!');

        }
    
    }


    public function deleteProps($id){

        $deleteProp = Property::find($id);
        if(File::exists(public_path('assets/images/' . $deleteProp->image))){
            File::delete(public_path('assets/images/' . $deleteProp->image));
        }else{
            //dd('File does not exists.');
        }


        $deleteProp->delete();

        //delete just the gallery
        $deleteGallery = PropImage::where("prop_id", $id)->get();

        foreach($deleteGallery as $delete){
            if(File::exists(public_path('assets/images_gallery/' . $delete->image))){
                File::delete(public_path('assets/images_gallery/' . $delete->image));
            }else{
                //dd('File does not exists.');
            }

            $delete->delete();
        }

        if($deleteProp) {
            return redirect('/admin/all-props/')->with('delete', 'Property deleted successfully');

        }

        
    }

    public function editProps($id)
{
    
    $prop = Property::findOrFail($id);

    // Pass the property to the edit view
    return view('admins.editprops', compact('prop'));
}

public function updateProps(Request $request, $id)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'beds' => 'required|integer',
        'baths' => 'required|integer',
        'sq_ft' => 'required|integer',
        'year_built' => 'required|integer',
        'price_sqft' => 'required|numeric',
        'location' => 'required|string|max:255',
        'home_type' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'more_info' => 'nullable|string',
        'agent_name' => 'required|string|max:255',
    ]);

    // Find the property to update
    $property = Property::findOrFail($id);

    // Handle image upload
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($property->image && file_exists(public_path('assets/images/' . $property->image))) {
            unlink(public_path('assets/images/' . $property->image));
        }

        // Upload the new image
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $destinationPath = public_path('assets/images/');
        $image->move($destinationPath, $imageName);
    } else {
        // Use the old image if no new image is provided
        $imageName = $property->image;
    }

    // Update the property data
    $property->update([
        'title' => $request->title,
        'price' => $request->price,
        'image' => $imageName,
        'beds' => $request->beds,
        'baths' => $request->baths,
        'sq_ft' => $request->sq_ft,
        'year_built' => $request->year_built,
        'price_sqft' => $request->price_sqft,
        'location' => $request->location,
        'home_type' => $request->home_type,
        'type' => $request->type,
        'city' => $request->city,
        'more_info' => $request->more_info,
        'agent_name' => $request->agent_name,
    ]);

    // Redirect with success message
    return redirect('/admin/all-props/')->with('success', 'Property updated successfully');
}

}
