<?php

namespace App\Http\Controllers;

use App\Models\AdminPackage;
use App\Models\PrePackage;
use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomPackageController extends Controller
{
//     public function addToPackage(Request $request)
//     {
//         $customPackage = Session::get('customPackage', []);
//         $totalPrice = Session::get('totalPrice', 0);

//         $newItem = [
//             'id' => $request->id,
//             'name' => $request->name,
//             'type' => $request->type
//         ];

//         $exists = collect($customPackage)->firstWhere('id', $request->id);
//         if (!$exists) {
//             $customPackage[] = $newItem;

//             if ($request->type === 'package') {
//                 $package = PrePackage::find($request->id);
//                 if ($package) {
//                     $totalPrice += $package->price;
//                 }
//             } elseif ($request->type === 'service') {
//                 $service = Services::find($request->id);
//                 if ($service) {
//                     $totalPrice += $service->price;
//                 }
//             }
//         }

//         Session::put('customPackage', $customPackage);
//         Session::put('totalPrice', $totalPrice);

//         Log::info('Custom Package Updated:', Session::get('customPackage'));

//         return response()->json(['message' => 'Item added to custom package', 'totalPrice' => $totalPrice]);
//     }

//     public function createPackage()
//     {
//         $customPackage = Session::get('customPackage', []);
//         $totalPrice = Session::get('totalPrice', 0);
//         $detailedPackage = [];

//         foreach ($customPackage as $item) {
//             if ($item['type'] === 'package') {
//                 $package = PrePackage::find($item['id']);
//                 if ($package) {
//                     $detailedPackage[] = [
//                         'id' => $package->package_id,
//                         'name' => $package->package_name,
//                         'price' => $package->price,
//                         'type' => 'Package'
//                     ];
//                 }
//             } elseif ($item['type'] === 'service') {
//                 $service = Services::find($item['id']);
//                 if ($service) {
//                     $detailedPackage[] = [
//                         'id' => $service->service_id,
//                         'name' => $service->service_type,
//                         'price' => $service->price,
//                         'type' => 'Service'
//                     ];
//                 }
//             }
//         }

//         return view('MainAdminPanel.createcustompackage', compact('detailedPackage', 'totalPrice'));
//     }

//     public function removeFromPackage(Request $request)
//     {
//         $customPackage = Session::get('customPackage', []);
//         $totalPrice = Session::get('totalPrice', 0);

//         $updatedPackage = [];
//         foreach ($customPackage as $item) {
//             if ($item['id'] == $request->id) {
//                 if ($item['type'] === 'package') {
//                     $package = PrePackage::find($item['id']);
//                     if ($package) {
//                         $totalPrice -= $package->price;
//                     }
//                 } elseif ($item['type'] === 'service') {
//                     $service = Services::find($item['id']);
//                     if ($service) {
//                         $totalPrice -= $service->price;
//                     }
//                 }
//             } else {
//                 $updatedPackage[] = $item;
//             }
//         }

//         Session::put('customPackage', $updatedPackage);
//         Session::put('totalPrice', max($totalPrice, 0));

//         return response()->json(['message' => 'Item removed from custom package', 'totalPrice' => $totalPrice]);
//     }

//     public function store(Request $request)
// {
//     $customPackage = Session::get('customPackage', []);
//     $totalPrice = Session::get('totalPrice', 0);

//     if (empty($customPackage)) {
//         return redirect()->back()->with('error', 'No items in custom package.');
//     }

//     $serviceIds = [];
//     $packageIds = [];

//     foreach ($customPackage as $item) {
//         if ($item['type'] === 'service') {
//             $serviceIds[] = $item['id'];
//         } elseif ($item['type'] === 'package') {
//             $packageIds[] = $item['id'];
//         }
//     }

//     $adminPackage = new AdminPackage();
//     $adminPackage->package_name = $request->package_name;
//     $adminPackage->description = $request->package_description;
//     $adminPackage->totalcost = $totalPrice;
//     $adminPackage->service_ids = implode(',', $serviceIds);
//     $adminPackage->package_ids = implode(',', $packageIds);
//     $adminPackage->save();

//     Session::forget('customPackage');
//     Session::forget('totalPrice');

//     return redirect()->back()->with('success', 'Custom package created successfully.');
// }

public function custompackageform(){

    // $services = Services::all();
    // $packages = PrePackage::all();

    return view('MainAdminPanel.custompackageform');
}

// public function getServices()
// {
//     $services = Services::with(['vendor.user'])->get();
//     Log::info('Services fetched:', $services->toArray());
//     return response()->json(['services' => $services]);
// }

// public function getPackages()
// {
//     $packages = PrePackage::with(['vendor.user'])->get();
//     return response()->json(['packages' => $packages]);
// }
public function getServices()
{
    $services = Services::with(['vendor.user'])->get();
    Log::info('Services fetched:', $services->toArray());
    return response()->json(['services' => $services]);
}

public function getPackages()
{
    $packages = PrePackage::with(['vendor.user'])->get();
    return response()->json(['packages' => $packages]);
}


public function storedata(Request $request){
    echo'<pre>';
    print_r($request->all());
}

public function viewPackage(Request $request) {
    $search = $request->input('search');

    $query = AdminPackage::query();

    if (!empty($search)) {
        $query->where('package_name', 'LIKE', "%{$search}%");
    }

    $custompackage = $query->paginate(5);

    foreach ($custompackage as $package) {
        // Fetching services detail
        if (!empty($package->service_ids)) {
            $serviceIds = array_map('intval', explode(',', $package->service_ids));
            $package->services = !empty($serviceIds)
                ? Services::whereIn('service_id', $serviceIds)->with('vendor.user')->get()
                : collect();
        } else {
            $package->services = collect();
        }

        // Fetching package detail
        if (!empty($package->package_ids)) {
            $packageIds = array_map('intval', explode(',', $package->package_ids));
            $package->packages = !empty($packageIds)
                ? PrePackage::whereIn('package_id', $packageIds)->with('vendor.user')->get()
                : collect();
        } else {
            $package->packages = collect();
        }
    }

    return view('MainAdminPanel.custompackageview', compact('custompackage','search'));
}

// Trash and Force Delete
public function custompackagetrash(){

    $custompackage = AdminPackage::onlyTrashed()->paginate(5);

    foreach ($custompackage as $package) {
        // Fetching services detail
        if (!empty($package->service_ids)) {
            $serviceIds = array_map('intval', explode(',', $package->service_ids));
            $package->services = !empty($serviceIds)
                ? Services::whereIn('service_id', $serviceIds)->with('vendor.user')->get()
                : collect();
        } else {
            $package->services = collect();
        }

        // Fetching package detail
        if (!empty($package->package_ids)) {
            $packageIds = array_map('intval', explode(',', $package->package_ids));
            $package->packages = !empty($packageIds)
                ? PrePackage::whereIn('package_id', $packageIds)->with('vendor.user')->get()
                : collect();
        } else {
            $package->packages = collect();
        }
    }
    return view('MainAdminPanel.custompackagetrash',compact('custompackage'));
}

public function custompackagedelete($id)
    {
        $packages=AdminPackage::find($id);
        if(!is_null($packages)){
            $packages->delete();
        }

        return redirect('/CustomPackageview');
    }

    public function custompackagerestore($id)
    {

        $packages=AdminPackage::withTrashed()->find($id);

        if(!is_null($packages)){
            $packages->restore();
        }
        return redirect('CustomPackageview');
    }

    public function custompackageforcedelete($id)
    {
        $packages=AdminPackage::withTrashed()->find($id);
        if(!is_null($packages)){
            $packages->forceDelete();
        }
        return redirect()->back();
    }


    //Removing any servies or packages from build-in package

    public function removePackage($adminPackageId, $packageId)
{
    $customPackage = AdminPackage::find($adminPackageId);

    if ($customPackage) {

        $package = PrePackage::find($packageId);

        if ($package) {

            $customPackage->totalcost -= $package->price;
            if ($customPackage->totalcost < 0) {
                $customPackage->totalcost = 0;
            }
        }

        $packageIds = explode(',', $customPackage->package_ids);
        $packageIds = array_diff($packageIds, [$packageId]);

        $customPackage->package_ids = implode(',', $packageIds);
        $customPackage->save();

        Session::flash('remove', 'Package removed successfully');
        return redirect()->back();
    }

    Session::flash('notfound', 'Package not found');
    return redirect()->back();
}

public function removeService($adminPackageId, $serviceId)
{
    // Log::info('ad_id'.$adminPackageId);
    // Log::info('service_id'.$serviceId);

    $customPackage = AdminPackage::find($adminPackageId);

    if ($customPackage) {

        $service = Services::find($serviceId);

        if ($service) {
            $servicePrice = $service->price;

            $customPackage->totalcost -= $servicePrice;
            if ($customPackage->totalcost < 0) {
                $customPackage->totalcost = 0;
            }
        }

        $serviceIds = explode(',', $customPackage->service_ids);
        $serviceIds = array_diff($serviceIds, [$serviceId]);

        $customPackage->service_ids = implode(',', $serviceIds);
        $customPackage->save();

        Log::info("After Removal - Service IDs: " . $customPackage->service_ids);

        Session::flash('remove', 'Service removed successfully');
        return redirect()->back();
    }

    Session::flash('notfound', 'Service not found');
    return redirect()->back();
}

// Edit and Update
public function custompackageedit($id){

    $custompackage=AdminPackage::find($id);
    if(is_null($custompackage)){
        return redirect('/CustomPackageview');
    }
    else
    {
        $existingServiceIds = explode(',', $custompackage->service_ids);
        $existingPackageIds = explode(',', $custompackage->package_ids);

        // Fetch only services that are NOT in the custom package and have status = 1
        $services = Services::whereNotIn('service_id', $existingServiceIds)
                            ->where('status', 1)
                            ->get();

        // Fetch only packages that are NOT in the custom package and have status = 1
        $packages = PrePackage::whereNotIn('package_id', $existingPackageIds)
                              ->where('status', 1)
                              ->get();
        $data=compact('custompackage','services','packages');
        return view('MainAdminPanel.custompackageeditform')->with($data);
    }
}

}
