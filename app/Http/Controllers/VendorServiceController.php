<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Models\Vendors;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VendorServiceController extends Controller
{
    public function services( Request $request){
        $search=$request['search']??"";
        $user = Auth::user();
        $vendor = Vendors::where('user_id', $user->user_id)->first();

        $query = Services::where('vendor_id', $vendor->vendor_id);

        if (!empty($search)) {
            $query->where('service_type', 'LIKE', "%$search%");
        }

        $services = $query->paginate(5);

        $data=compact('services', 'search');
        return view('SecondAdminPanel.services')->with($data);
    }

    public function servicesform()
     {
        $user = Auth::user();
        $services = new Services();

        $url=url('/Serviceform2');
        $title="Service Details Form";
        $existingImages = [];
        $data=compact('url','title','services','existingImages');

        return view('SecondAdminPanel.servicesform')->with($data);
    }


    public function servicesform2(Request $request)
{
    $request->validate(
        [

          'name' =>'required',
          'description' => 'required',
          'price' => 'required',
          'images' => 'required|array|max:4',
          'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:6000'
        ]);

        // echo"<pre>";
        // print_r($request->all());

        $user = auth()->user();
        // dd($user->vendors);
        $vendor = Vendors::where('user_id', $user->user_id)->first();
        $vendor_id = $vendor->vendor_id;

    $service = new Services();
    $service ->vendor_id = $vendor_id;
    $service ->service_type = $request->input('name');
    $service ->description= $request->input('description');
    $service ->price = $request->input('price');

    $imageNames = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $index => $file) {
            $fileName = time() . "img" . ($index + 1) . "." . $file->getClientOriginalExtension();
            $file->move('ServicesImage', $fileName);
            $imageNames[] = $fileName;
        }
    }

    $service->images = implode(',', $imageNames);
    $service ->save();

    return redirect('/Services');
}


    public function servicestrash()
    {
        $user = Auth::user();
        $vendor = Vendors::where('user_id', $user->user_id)->first();

        $services = Services::onlyTrashed()
        ->where('vendor_id', $vendor->vendor_id)
        ->paginate(5);
        // $services = Services::onlyTrashed()->paginate(5);

        $data=compact('services');

        return view("SecondAdminPanel.servicestrash")->with($data);
    }

    public function servicesedit($id)
    {
        $services=Services::find($id);
        if(is_null($services)){
            return redirect('/Services');
        }
        else
        {
            $url=url('/service/update')."/".$id;
            $title="Update Service Details";
            $existingImages = explode(',', $services->images);
            $data=compact('services','url','title','existingImages');
            return view('SecondAdminPanel.servicesform')->with($data);
        }

    }


    public function servicesupdate($id, Request $request)
{
    $service = Services::find($id);

    $service ->service_type = $request->input('name');
    $service ->description= $request->input('description');
    $service ->price = $request->input('price');

    $existingImages = $service->images ? explode(',', $service->images) : [];

    if ($request->hasFile('images')) {
        $uploadedImages = count($request->file('images'));

        $allowedUploads = max(0, 4 - count($existingImages));

        if ($allowedUploads > 0) {
            $newImages = [];

            foreach ($request->file('images') as $index => $file) {
                if ($index >= $allowedUploads) break;

                $fileName = time() . "img" . ($index + 1) . "." . $file->getClientOriginalExtension();
                $file->move(public_path('ServicesImage'), $fileName);
                $newImages[] = $fileName;
            }

            $existingImages = array_merge($existingImages, $newImages);
        }
    }

    $service->images = implode(',', $existingImages);
    $service->save();


    return redirect('/Services');
}


    public function servicesdelete($id)
    {
        // $user = Auth::user();
        // $vendor = Vendors::where('user_id', $user->user_id)->first();

        // $services = Services::where('service_id', $id)->where('vendor_id', $vendor->vendor_id)
        // ->first();
        // if(!is_null($services)){
        //     $services->delete();
        // }
        $services=Services::find($id);
        if(!is_null($services)){
            $services->delete();
        }

        return redirect('/Services');
    }

    public function servicesrestore($id)
    {
        // $user = Auth::user();
        // $vendor = Vendors::where('user_id', $user->user_id)->first();

        // $services=Services::withTrashed()
        // ->where('vendor_id', $vendor->vendor_id)
        // ->where('service_id', $id)
        // ->first();
        $services=Services::withTrashed()->find($id);

        if(!is_null($services)){
            $services->restore();
        }
        return redirect('Services');
    }

    public function servicesforcedelete($id)
    {
        // $user = Auth::user();
        // $vendor = Vendors::where('user_id', $user->user_id)->first();

        // $services=Services::OnlyTrashed()
        // ->where('vendor_id', $vendor->vendor_id)
        // ->where('service_id', $id)
        // ->first();
        $services=Services::withTrashed()->find($id);
        if(!is_null($services)){
            $services->forceDelete();
        }
        return redirect()->back();
    }
}
