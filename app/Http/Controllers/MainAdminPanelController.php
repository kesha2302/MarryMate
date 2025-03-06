<?php

namespace App\Http\Controllers;

use App\Models\EventManager;
use App\Models\PrePackage;
use App\Models\Services;
use App\Models\UserTable;
use App\Models\Vendors;
use Illuminate\Http\Request;


class MainAdminPanelController extends Controller
{
    public function index(){
        return view('MainAdminPanel.index');
    }

    public function clientsdetail(Request $request){

        $search=$request['search']??"";
        if($search!=""){
            $clients=UserTable::where('name',"LIKE","%$search%")
            ->orwhere('email',"LIKE","%$search%")->get();
        }
        else{
            $clients = UserTable::paginate(5);
        }

        return view('MainAdminPanel.clientsdetail', compact('clients', 'search'));
    }

    public function vendorsdetail(Request $request){

        $search=$request['search']??"";
        $query = Vendors::with('user');

        if (!empty($search)) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                  ->orWhere('email', 'LIKE', "%$search%");
            });
        }

        $vendors = $query->paginate(5);
        return view('MainAdminPanel.vendorsdetail', compact('vendors', 'search'));
    }

    public function emdetails(Request $request){
        $search=$request['search']??"";
        $query = EventManager::with('user');

    if (!empty($search)) {
        $query->whereHas('user', function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%")
              ->orWhere('email', 'LIKE', "%$search%");
        });
    }

    $eventmanagers = $query->paginate(5);
        return view('MainAdminPanel.eventmanagersdetail', compact('eventmanagers', 'search'));
    }


    public function vendorservicesdetail(Request $request){

    $search=$request['search']??"";
    // $query = Services::with('vendor.user');
    $query = Services::with('vendor.user')->orderBy('vendor_id');

    if (!empty($search)) {
        $query->whereHas('vendor.user', function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%");
        });
    }

        $services = $query->paginate(5);

        return view('MainAdminPanel.vendorserviceview',compact('services','search'));
    }

    public function vendorspackagesdetail(Request $request){
        $search=$request['search']??"";

    $query = PrePackage::with('vendor.user')->orderBy('vendor_id');

    if (!empty($search)) {
        $query->whereHas('vendor.user', function ($q) use ($search) {
            $q->where('name', 'LIKE', "%$search%");
        });
    }
 
        $packages = $query->paginate(5);

        return view('MainAdminPanel.vendorpackageview', compact('packages','search'));
    }



}
