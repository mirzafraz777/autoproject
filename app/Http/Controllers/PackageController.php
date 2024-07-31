<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\Package;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::with('category')->paginate(5,['*'],'p');
        return view('admin.packages', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = category::select('id','category_name')->get();
        return view('admin.create_package' , compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
        "package_name" => 'required|max:255',
        "package_price" => 'required|decimal:2,8',
        "package_days" => 'required|integer',
        "package_category" => 'required|integer',
        ]);

        if ($request->hasFile('package_image')) {

            $request->validate([
                'package_image' => 'image|mimes:jpeg,png,jpg|max:2048',
            ]);

            $imageName = time().'.'.$request->package_image->extension();


            $request->file('package_image')->storeAs('images',$imageName , 'public');
        }else{
            $imageName = 'package_default.png';

        }



        $package = new Package();
        $package->name = $request->package_name;
        $package->price = $request->package_price;
        $package->no_of_days = $request->package_days;
        if(empty($request->featured_package)){
            $package->type = 0;
        }else{
            $package->type = $request->featured_package;
        }

        $package->cat_id = $request->package_category;
        $package->image = 'images/'.$imageName;
        $package->save();

        return redirect()->route('packages.index')->with('message', 'Package Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // $package = Package::all();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::with('category')->find($id);
        $category = category::select('id','category_name')->get();
        // return $package;
        return view('admin.edit-package', compact(['package','category']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Validate request data
    $request->validate([
        'package_name' => 'required|string|max:255',
        'package_price' => 'required|decimal:2,8',
        'package_days' => 'required|integer',
        'package_category' => 'required|exists:categories,id',
        'featured_package' => 'nullable|boolean',
        'package_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Find the package by id
    $package = Package::find($id);

    if (!$package) {
        return redirect()->route('packages.index')->with('error', 'Package not found.');
    }

    // Update package details
    $package->name = $request->package_name;
    $package->price = $request->package_price;
    $package->no_of_days = $request->package_days;
    $package->type = $request->has('featured_package') ? 1 : 0;
    $package->cat_id = $request->package_category;

    // Handle image upload if there's an image
    if ($request->hasFile('package_image')) {

        if ($package->image && $package->image !== 'images/package_default.png') {
            // Delete the old image
            Storage::disk('public')->delete($package->image);
        }

        // Store the new image
        $imageName = time().'.'.$request->package_image->extension();
        $request->package_image->storeAs('images', $imageName, 'public');
        $package->image = 'images/'.$imageName;
    }


    $package->save(); //save

    return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pkg = Package::find($id);
        if($pkg){
            $pkg->delete();
            return redirect()->route('packages.index')->with('message','Product Deleted Successfully.');
        }
    }
}
