<?php

namespace App\Http\Controllers;

use App\Models\Polygons;
use Illuminate\Http\Request;

class PolygonController extends Controller
{
    public function __construct(){
        $this->polygon = new Polygons();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polygons = $this->polygon->polygons();
        
        foreach ($polygons as $p) {
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
            $filename = time() . '_polygon.' . $image->getClientOriginalExtension();
            $image->move('storage/images', $filename);
        } else {
            $filename = null;
        }

        $data = [
            'name' => $request->name, //menangkap masukan name=name
            'description' => $request->description, //menangkap masukan name=description
            'geom' => $request->geom, //menangkap masukan name=geom
            'image' => $filename
        ];

        // membuat polygon -> apabila polygon gagal dibuat maka akan dikembalikan pada halaman awal dan menampilkan error dengan pesan Failed to Created Polygon
        if (!$this->polygon->create($data)) {
            return redirect()->back()->with('error', 'Failed to create new Data');
        };
        // redirect to map -> apabila poin berhasil dibuat maka akan dikembalikan pada halaman awal dan menampilkan success dengan pesan Polygon created successfully
        return redirect()->back()->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $polygon = $this->polygon->polygon($id);
        
        foreach ($polygon as $p) {
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
        $polygon = $this->polygon->find($id);
        $data = [
            'title' => 'Edit Data',
            'polygon' => $polygon,
            'id' => $id,
        ];
        return view('edit-polygon', $data);
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
            $filename = time() . '_polygon.' . $image->getClientOriginalExtension();
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

        // update poin -> apabila polygon gagal dibuat maka akan dikembalikan pada halaman awal dan menampilkan error dengan pesan Failed to Created Polygon
        if (!$this->polygon->find($id)->update($data)) {
            return redirect()->back()->with('error', 'Failed to update Data');
        };
        // redirect to map -> apabila poin berhasil dibuat maka akan dikembalikan pada halaman awal dan menampilkan success dengan pesan Polygon created successfully
        return redirect()->back()->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //get image
        $image = $this->polygon->find($id)->image;
        
        //delete polygon
        if (!$this->polygon->destroy($id)) {
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
        $polygons = $this->polygon->polygons();

        //dd($points);
        $data =[
            'title' => 'Megathrusts Table',
            'polygons' => $polygons
        ];

        return view('table-polygon', $data);
    }
}
