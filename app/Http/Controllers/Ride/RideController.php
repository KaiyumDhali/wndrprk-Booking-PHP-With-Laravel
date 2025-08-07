<?php
namespace App\Http\Controllers\Ride;

use App\Models\Ride;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;



class RideController extends Controller
{

    public function index()
    {
        $rides = Ride::orderby('id', 'asc')->get();
        return view('pages.ride.index', compact('rides'));
    }


    public function create()
    {
        return view('pages.ride.create');
    }

    public function store(Request $request)
    {

        $ride = new Ride();

        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            ]);
            $image = $request->file('image');
            $name = date('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
            $image_path_folder = $image->storeAs('public/images/ride', $name);
            $ride->image = 'images/ride/' . $name;
        }

        // if ($request->hasfile('banner_image')) {
        //     $request->validate([
        //         'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        //     ]);
        //     $image2 = $request->file('banner_image');
        //     $name2 = date('d-m-Y-H-i-s') . '-' . $image2->getClientOriginalName();
        //     $image_path2 = $image2->storeAs('images/banner', $name2);
        //     $ride->banner_image = $image_path2;
        // }

        $ride->title = $request->title;
        $ride->description = $request->description;
        $ride->price = $request->price;
        $ride->status = $request->status;

        //        echo '<pre>';
        //        print_r($Ride);
        //        echo '</pre>';
        //        die();

        $ride->save();

        return redirect()->route('rides.index')->with('success', 'Created successfully.');
    }



    public function show($id)
    {
        $data['ride'] = Ride::find($id);
        return view('pages.ride.show', $data);
    }


    public function edit($id)
    {
        $data['rides'] = Ride::find($id);
        return view('pages.ride.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $ride = Ride::find($id);

        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            ]);
            $image = $request->file('image');
            $name = date('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
            $image_path_folder = $image->storeAs('public/images/ride', $name);
            $ride->image = 'images/ride/' . $name;
        }

        // if ($request->hasfile('banner_image')) {
        //     $request->validate([
        //         'banner_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
        //     ]);
        //     $image2 = $request->file('banner_image');
        //     $name2 = date('d-m-Y-H-i-s') . '-' . $image2->getClientOriginalName();
        //     $image_path2_folder = $image2->storeAs('public/images/banner', $name2);
        //     $ride->banner_image = 'images/banner/' . $name2;
        // }

        $ride->title = $request->title;
        $ride->description = $request->description;
        $ride->price = $request->price;
        $ride->status = $request->status;
        $ride->save();

        return redirect()->route('rides.index')->with('success', 'Created sucessfully.');
    }


    public function imageDestroy($id)
    {
        $ride = Ride::find($id);

        if ($ride->image != null) {
            // Delete from storage/app/public
            Storage::disk('public')->delete($ride->image);

            $ride->image = null;
            $ride->save();
        }

        return redirect()->route('rides.edit', $ride->id)
            ->with('success', 'Image successfully deleted from storage.');
    }


    //Banner Image Storage Destroy

    //    public function bannerDestroy($id) {
    //        $Ride = Ride::find($id);
    //        if ($Ride->banner_image != Null) {
    //            // dd($Ride->image);
    //            Storage::delete($Ride->banner_image);
    //            $Ride->banner_image = Null;
    //            $Ride->save();
    //        }
    //        return redirect()->route('admin.about_us.edit', $Ride->id)->with('success', 'Image storage successfully deleted.');
    //    }




    public function destroy($id)
    {
        $ride = Ride::find($id);
        if ($ride->image != Null) {
            Storage::disk('public')->delete($ride->image);
        }
        // if ($ride->banner_image != Null) {
        //     Storage::delete($ride->banner_image);
        // }
        $ride->delete();
        return redirect()->route('rides.index')->with('success', 'Successfully deleted.');
    }



    
}
