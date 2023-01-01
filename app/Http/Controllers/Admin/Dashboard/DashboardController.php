<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\FlowerType;
use App\Models\Occasion;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function addFlowertype(Request $req)
    {
        if ($req->getMethod() == 'GET') {
            return view('admin.flowertype.addForm');
        }
        if ($req->getMethod() == 'POST') {
            $data = $req->all();
            $flowertype = new FlowerType;
            $flowertype->flowertype_name = $data['name'];
            $flowertype->save();

            return response()->json([
                'status' => 200,
                'msg' => 'Add Successfully!!'
            ]);
        }
        return response()->json([
            'status' => 403,
            'msg' => 'Add Fail!!'
        ]);
    }
    public function deleteFlowertype(Request $req)
    {
        if(isset($req->id)){
            FlowerType::where('flowertype_id',$req->id)->delete();
            return response()->json(['status'=>200,'msg'=>'Delete Successfully']);
        }else{
            return response()->json(['status'=>403,'msg'=>'Delete Fail!']);
        }
    }
    public function showFlowerType()
    {
        $flowertype = FlowerType::all();
        return view('admin.flowertype.showForm',compact('flowertype'));
    }

    //Occasion
    public function showOccasion()
    {
        $occasion = Occasion::all();
        return view('admin.occasion.showForm',compact('occasion'));
    }
    public function addOccasion(Request $req)
    {
        if ($req->getMethod() == 'GET') {
            return view('admin.occasion.addForm');
        }
        if ($req->getMethod() == 'POST') {
            $data = $req->all();
            $occasion = new Occasion();
            $occasion->occasion_name = $data['name'];
            $occasion->save();

            return response()->json([
                'status' => 200,
                'msg' => 'Add Successfully!!'
            ]);
        }
        return response()->json([
            'status' => 403,
            'msg' => 'Add Fail!!'
        ]);
    }
    public function deleteOccasion(Request $req)
    {
        if(isset($req->id)){
            Occasion::where('occasion_id',$req->id)->delete();
            return response()->json(['status'=>200,'msg'=>'Delete Successfully']);
        }else{
            return response()->json(['status'=>403,'msg'=>'Delete Fail!']);
        }
    }
    //Customer
    public function showCustomer()
    {
        $customer = User::all();
        return view('admin.customer.showForm',compact('customer'));
    }
}
