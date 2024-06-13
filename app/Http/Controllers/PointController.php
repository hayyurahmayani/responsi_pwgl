<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;

class PointController extends Controller
{
    //membuat global method
    public function __construct(){
        $this->point = new Points();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $points = $this->point->points();
        
        foreach ($points as $p) {
            $feature[]=[
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'image' => $p->image,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
            ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi request
        $request->validate([
            'name' => 'required',
            'geom' => 'required',
            'image' => 'mimes:jpeg,png,jpg,tiff,gif|max:10000' //10MB
        ],

        [
            'name.required' => 'Name is required',
            'geom.required' => 'Geometry is required',
            'image.mimes' => 'The image must be a file of type: jpeg,png,jpg,tiff,gif',
            'image.max' => 'The image must not exceed 10MB'
        ]
        );

        
        //create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_point.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
        } else {
            $filename = null;
        }

        //menyimpan data
        $data = [
            'name' => $request->name, //menangkap masukan name=name
            'description' => $request->description, //menangkap masukan name=description
            'geom' => $request->geom, //menangkap masukan name=geom
            'image' => $filename
        ];

        // membuat poin -> apabila point gagal dibuat maka akan dikembalikan pada halaman awal dan menampilkan error dengan pesan Failed to Created Point
        if (!$this->point->create($data)) {
            return redirect()->back()->with('error', 'Failed to add Data');
        };
        // redirect to map -> apabila poin berhasil dibuat maka akan dikembalikan pada halaman awal dan menampilkan success dengan pesan Point created successfully
        return redirect()->back()->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $point = $this->point->point($id);
        
        foreach ($point as $p) {
            $feature[]=[
                'type' => 'Feature',
                'geometry' => json_decode($p->geom),
                'properties' => [
                    'id' => $p->id,
                    'name' => $p->name,
                    'description' => $p->description,
                    'image' => $p->image,
                    'created_at' => $p->created_at,
                    'updated_at' => $p->updated_at
                ]
            ];
        }

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $feature,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $point = $this->point->find($id);
        $data = [
            'title' => 'Edit Data',
            'point' => $point,
            'id' => $id,
        ];
        return view('edit-point', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi request
        $request->validate([
            'name' => 'required',
            'geom' => 'required',
            'image' => 'mimes:jpeg,png,jpg,tiff,gif|max:10000' //10MB
        ],

        [
            'name.required' => 'Name is required',
            'geom.required' => 'Geometry is required',
            'image.mimes' => 'The image must be a file of type: jpeg,png,jpg,tiff,gif',
            'image.max' => 'The image must not exceed 10MB'
        ]
        );

        
        //create folder images
        if (!is_dir('storage/images')) {
            mkdir('storage/images', 0777);
        }

        // upload image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_point.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);

            //delete image
            $image_old =$request->image_old;
            if ($image_old != null) {
                unlink('storage/images/' . $image_old);
            }

        } else {
            $filename = $request->image_old;
        }

        //menyimpan data
        $data = [
            'name' => $request->name, //menangkap masukan name=name
            'description' => $request->description, //menangkap masukan name=description
            'geom' => $request->geom, //menangkap masukan name=geom
            'image' => $filename
        ];

        // update poin -> apabila point gagal dibuat maka akan dikembalikan pada halaman awal dan menampilkan error dengan pesan Failed to Created Point
        if (!$this->point->find($id)->update($data)) {
            return redirect()->back()->with('error', 'Failed to update Data');
        };
        // redirect to map -> apabila poin berhasil dibuat maka akan dikembalikan pada halaman awal dan menampilkan success dengan pesan Point created successfully
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get image
        $image = $this->point->find($id)->image;
        
        //delete point
        if (!$this->point->destroy($id)) {
            return redirect()->back()->with('error', 'Failed to delete Data');
        }

        //delete image
        if ($image != null) {
            unlink('storage/images/' . $image);
        }        

        // Redirect To Map
        // Jika sukses..
        return redirect()->back()->with('success', 'Data deleted successfully');
    }

    public function table()
    {
        $points = $this->point->points();

        //dd($points);
        $data =[
            'title' => 'Disasters Table',
            'points' => $points
        ];

        return view('table-point', $data);
    }
}
