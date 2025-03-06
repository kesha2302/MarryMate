<?php

namespace App\Http\Controllers;

use App\Models\PrePackage;
use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Vendors;
use Illuminate\Support\Facades\Auth;

class VendorPackageController extends Controller
{
    public function packages( Request $request){
        $search=$request['search']??"";
        $user = Auth::user();
        $vendor = Vendors::where('user_id', $user->user_id)->first();

        $query = PrePackage::where('vendor_id', $vendor->vendor_id);

        if (!empty($search)) {
            $query->where('package_name', 'LIKE', "%$search%");
        }

        $packages = $query->paginate(5);

        $data=compact('packages', 'search');
        return view('SecondAdminPanel.packages')->with($data);
    }

    public function packagesform()
     {
        $user = Auth::user();
        $packages = new PrePackage();

        $url=url('/Packageform2');
        $title="Package Details Form";
        $existingImages = [];
        $data=compact('url','title','packages','existingImages');

        return view('SecondAdminPanel.packagesform')->with($data);
    }


    public function packagesform2(Request $request)
{
    $request->validate(
        [

          'name' =>'required',
          'service_types' => 'required',
          'description' => 'required',
          'price' => 'required',
          'images' => 'required|array|max:4',
          'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:6000'
        ]);

        // echo"<pre>";
        // print_r($request->all());

        $user = auth()->user();
        $vendor = Vendors::where('user_id', $user->user_id)->first();
        $vendor_id = $vendor->vendor_id;

    $package = new PrePackage();
    $package ->vendor_id = $vendor_id;
    $package ->package_name = $request->input('name');
    $package ->service_types = $request->input('service_types');
    $package ->description= $request->input('description');
    $package ->price = $request->input('price');

    $imageNames = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $file) {
            $fileName = time() . "img" . ($index + 1) . "." . $file->getClientOriginalExtension();
            $file->move('PackageImages', $fileName);
            $imageNames[] = $fileName;
        }
    }

    $package->images = implode(',', $imageNames);
    $package ->save();

    return redirect('/Packages');
}


    public function packagestrash()
    {
        $user = Auth::user();
        $vendor = Vendors::where('user_id', $user->user_id)->first();

        $packages = PrePackage::onlyTrashed()
        ->where('vendor_id', $vendor->vendor_id)
        ->paginate(5);

        $data=compact('packages');

        return view("SecondAdminPanel.packagestrash")->with($data);
    }

    public function packagesedit($id)
    {
        $packages=PrePackage::find($id);
        if(is_null($packages)){
            return redirect('/Packages');
        }
        else
        {
            $url=url('/package/update')."/".$id;
            $title="Update Package Details";
            $existingImages = explode(',', $packages->images);
            $data=compact('packages','url','title','existingImages');
            return view('SecondAdminPanel.packagesform')->with($data);
        }

    }


    public function packagesupdate($id, Request $request)
{
    $package = PrePackage::find($id);
    $package ->package_name = $request->input('name');
    $package ->service_types = $request->input('service_types');
    $package ->description= $request->input('description');
    $package ->price = $request->input('price');

    $existingImages = $package->images ? explode(',', $package->images) : [];

    if ($request->hasFile('images')) {
        $uploadedImages = count($request->file('images'));

        $allowedUploads = max(0, 4 - count($existingImages));

        if ($allowedUploads > 0) {
            $newImages = [];

            foreach ($request->file('images') as $index => $file) {
                if ($index >= $allowedUploads) break;

                $fileName = time() . "img" . ($index + 1) . "." . $file->getClientOriginalExtension();
                $file->move(public_path('PackageImages'), $fileName);
                $newImages[] = $fileName;
            }

            $existingImages = array_merge($existingImages, $newImages);
        }
    }

    $package->images = implode(',', $existingImages);
    $package->save();

    return redirect('/Packages');
}


    public function packagesdelete($id)
    {
        $packages=PrePackage::find($id);
        if(!is_null($packages)){
            $packages->delete();
        }

        return redirect('/Packages');
    }

    public function packagesrestore($id)
    {

        $packages=PrePackage::withTrashed()->find($id);

        if(!is_null($packages)){
            $packages->restore();
        }
        return redirect('Packages');
    }

    public function pckagesforcedelete($id)
    {
        $packages=PrePackage::withTrashed()->find($id);
        if(!is_null($packages)){
            $packages->forceDelete();
        }
        return redirect()->back();
    }
}
