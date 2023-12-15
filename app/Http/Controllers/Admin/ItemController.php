<?php

namespace App\Http\Controllers\Admin;


use App\Models\Item;
use App\Models\Type;
use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ItemRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\ItemUpdateRequest;
use Yajra\DataTables\Facades\DataTables;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function index()
    {
        {
            if (request()->ajax()) {
                $query = Item::with(['Brand', 'Type']);
        
                return DataTables::of($query)
                    ->editColumn('thumbnail', function ($item) {
                        return '<img src="'. $item->thumbnail . '" alt="ini thumbnail" class="w-20 mx-auto rounded-md">';
                    })
                    ->addColumn('action', function ($item) {
                        return '
                            <a class="block w-full px-2 py-1 mb-1 text-xs text-center text-white transition duration-500 bg-gray-700 border border-gray-700 rounded-md select-none ease hover:bg-gray-800 focus:outline-none focus:shadow-outline" 
                                href="' . route('admin.items.edit', $item->id) . '">
                                Edit 
                            </a>
    
                            <form class="block w-full" onsubmit="return confirm(\'Apakah anda yakin?\');" -block" action="' . route('admin.items.destroy', $item->id) . '" method="POST">
                                <button class="w-full px-2 py-1 text-xs text-white transition duration-500 bg-red-500 border border-red-500 rounded-md select-none ease hover:bg-red-600 focus:outline-none focus:shadow-outline" >
                                    Hapus
                                </button>
                                    ' . method_field('delete') . csrf_field() . '
                            </form>';
                    })
                    ->rawColumns(['action', 'thumbnail'])
                    ->make();
            }
        
            return view('admin.items.index');
        }
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $types = Type::all();

        return view('admin.items.create', compact('brands', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        $data = $request->all();

        // return dd($request->all());

        $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(6));

        //upload 1+ gambar
        if ($request->hasFile('photos')) {
        $photos = [];

        foreach ($request->file('photos') as $photo) {
            $photoPath = $photo->store('assets/item', 'public');

            //push ke array

            array_push($photos, $photoPath);
        }

        $data['photos'] = json_encode($photos);
        }

        item::create($data);

        return redirect()->route('admin.items.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(item $item)
    {
        $item->load('brand', 'type');

        $brands = Brand::all();
        $types = Type::all();

        return view ('admin.items.edit', compact('item','brands', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ItemUpdateRequest $request, item $item)
    {
        $data = $request->all();

        // return dd($request->all());

        $data['slug'] = Str::slug($data['name']) . '-' . Str::lower(Str::random(6));

        //upload 1+ gambar
        if ($request->hasFile('photos')) {
        $photos = [];

        foreach ($request->file('photos') as $photo) {
            $photoPath = $photo->store('assets/item', 'public');

            //push ke array

            array_push($photos, $photoPath);
        }

        $data['photos'] = json_encode($photos);
        } else {
            $data['photos'] = $item->photos;
        }

        $item->update($data);

        return redirect()->route('admin.items.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(item $item)
    {
        $item->delete();

        return redirect()->route('admin.items.index');
    }
}
