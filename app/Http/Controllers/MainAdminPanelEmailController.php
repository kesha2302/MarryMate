<?php

namespace App\Http\Controllers;

use App\Mail\EventManagerPasswordMail;
use Illuminate\Http\Request;
use App\Models\EventManager;
use App\Models\UserTable;
use App\Models\Vendors;
use Illuminate\Support\Facades\Mail;
use App\Mail\VendorPasswordMail;
use App\Models\PrePackage;
use App\Models\Services;
use Illuminate\Support\Str;

class MainAdminPanelEmailController extends Controller
{
    public function sendPassword($vendor_id)
    {
        $vendor = Vendors::findOrFail($vendor_id);

        $password = str_shuffle(Str::random(6) . rand(10, 99));

        Mail::to($vendor->user->email)->send(new VendorPasswordMail($password, $vendor->user->email));

        $hashedPassword = bcrypt($password);

        // Updating UserTable with new password
        $user = $vendor->user;
        $user->password = $hashedPassword;
        $user->save();

        // Updating the vendors status to 'Approved'
        $vendor->status = 1;
        $vendor->save();

        return redirect()->back()->with('status', 'Password sent successfully and vendor status updated to Approved.');
    }

    public function sendPassword2($em_id)
    {
        $em = EventManager::findOrFail($em_id);

        $password = str_shuffle(Str::random(6) . rand(10, 99));

        Mail::to($em->user->email)->send(new EventManagerPasswordMail($password, $em->user->email));

        $hashedPassword = bcrypt($password);

        // Updating UserTable with new password
        $user = $em->user;
        $user->password = $hashedPassword;
        $user->save();

        // Updating the eventmanager status to 'Approved'
        $em->status = 1;
        $em->save();

        return redirect()->back()->with('status2', 'Password sent successfully and eventmanager status updated to Approved.');
    }

    public function blockVendor($vendor_id)
{

    $vendor = Vendors::where('vendor_id', $vendor_id)->first();

    if (!$vendor) {
        return redirect()->back()->with('status3', 'Vendor not found');
    }

    // Update vendor status to 0 (Blocked)
    $vendor->status = 0;
    $vendor->save();

    Services::where('vendor_id', $vendor_id)->update(['status' => 0]);
    PrePackage::where('vendor_id', $vendor_id)->update(['status' => 0]);

    UserTable::where('user_id', $vendor->user_id)->update(['password' => null]);

    return redirect()->back()->with('status3', 'Vendor blocked successfully');
}

public function blockEM($em_id)
{

    $em = EventManager::where('em_id', $em_id)->first();

    if (!$em) {
        return redirect()->back()->with('status', 'EventMananger not found');
    }

    // Update vendor status to 0 (Blocked)
    $em->status = 0;
    $em->save();

    PrePackage::where('vendor_id', $em_id)->update(['status' => 0]);

    UserTable::where('user_id', $em->user_id)->update(['password' => null]);

    return redirect()->back()->with('status', 'EventManager blocked successfully');
}
}
