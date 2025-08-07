<?php
namespace App\Http\Controllers\Spot;


use App\Models\Spot;
use App\Models\SpotDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;




class SpotController extends Controller
{



    public function index()
    {
        $spots = Spot::orderby('id', 'asc')->get();
        return view('pages.spot.index', compact('spots'));
    }


    public function create()
    {
        return view('pages.spot.create');
    }

    public function store(Request $request)
    {

        // $spot = new Spot();

        $input = $request->all();


        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:20480',
            ]);
            $image = $request->file('image');
            $name = date('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
            $image_path_folder = $image->storeAs('public/images/spot', $name);
            $input['image'] = 'images/spot/' . $name;
        }

        $spot = Spot::create($input);

        // Handle multiple gallery images
        if ($request->hasFile('spot_gallery_image')) {
            foreach ($request->file('spot_gallery_image') as $image) {
                $name2 = now()->format('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/images/spot', $name2);

                SpotDetail::create([
                    'spot_id' => $spot->id,
                    'image_path' => 'images/spot/' . $name2,
                ]);
            }
        }


        // $spot->title = $request->title;
        // $spot->description = $request->description;
        // $spot->price = $request->price;
        // $spot->status = $request->status;

        // $spot->save();

        return redirect()->route('spots.index')->with('success', 'Created successfully.');
    }



    public function show($id)
    {
        $data['spot'] = Spot::with('spot_detail')->find($id);

        // dd($data['spot']);

        return view('pages.spot.show', $data);
    }


    public function edit($id)
    {
        // $data['spots'] = Spot::find($id);

        $data['spots'] = Spot::with('spot_detail')->find($id);


        return view('pages.spot.edit', $data);
    }


    public function update(Request $request, $id)
    {
        $spot = Spot::find($id);

        if ($request->hasfile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            ]);
            $image = $request->file('image');
            $name = date('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
            $image_path_folder = $image->storeAs('public/images/spot', $name);
            $spot->image = 'images/spot/' . $name;
        }


        // Handle multiple gallery images
        if ($request->hasFile('spot_gallery_image')) {
            foreach ($request->file('spot_gallery_image') as $image) {
                $name2 = now()->format('d-m-Y-H-i-s') . '-' . $image->getClientOriginalName();
                $imagePath = $image->storeAs('public/images/spot', $name2);

                SpotDetail::create([
                    'spot_id' => $spot->id,
                    'image_path' => 'images/spot/' . $name2,
                ]);
            }
        }



        $spot->title = $request->title;
        $spot->description = $request->description;
        $spot->price = $request->price;
        $spot->status = $request->status;
        $spot->save();

        return redirect()->route('spots.index')->with('success', 'Created sucessfully.');
    }


    public function imageDestroy($id)
    {
        $spot = Spot::find($id);

        if ($spot->image != null) {
            // Delete from storage/app/public
            Storage::disk('public')->delete($spot->image);

            $spot->image = null;
            $spot->save();
        }

        return redirect()->route('spots.edit', $spot->id)
            ->with('success', 'Image successfully deleted from storage.');
    }


    // Spot details image destroy
    public function galleryImageDestroy($id)
    {
        $spotDetail = SpotDetail::find($id);

        if ($spotDetail->image_path != Null) {
            Storage::disk('public')->delete($spotDetail->image_path);
        }

        $spotDetail->delete();

        return redirect()->route('spots.index', $spotDetail->id)->with([
            'message' => 'File successfully deleted. !',
            'alert-type' => 'danger'
        ]);
    }

    public function destroy($id)
    {
        $spot = Spot::with('spot_detail')->find($id);

        // Delete spot main image
        if ($spot->image != null) {
            Storage::disk('public')->delete($spot->image);
        }

        // Delete all spot_detail images
        foreach ($spot->spot_detail as $detail) {
            if ($detail->image_path != null && Storage::disk('public')->exists($detail->image_path)) {
                Storage::disk('public')->delete($detail->image_path);
            }
        }

        // Optionally delete spot_detail records first if using foreign key constraints
        $spot->spot_detail()->delete();

        // Finally delete the spot
        $spot->delete();

        return redirect()->route('spots.index')->with('success', 'Successfully deleted.');
    }



}
