<?php

namespace App\Http\Controllers;

use App\Models\Nft;
use Illuminate\Http\Request;
use App\Http\Resources\NftResource;
use App\Http\Requests\NftRequest;
use Illuminate\Support\Facades\Auth;



class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $nft = Nft::where('user_id' ,  Auth::user()->id)->orderBy('created_at' , 'DESC')->get();
        return NftResource::collection($nft);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param NftRequest $request
     * @return NftResource
     */
    public function store(NftRequest $request , Nft $nft)
    {
        $request->validated();

        $files = $request->file('image');

        $nft = Nft::create([
            'name' => $request->input("name"),
            'description' => $request->input("description"),
            'price' => $request->input("price"),
            'user_id' => auth()->id(),
        ]);


        if ($request->hasFile('image')) {
            $nft->addMedia($files)->toMediaCollection('images');
        }
        return new NftResource($nft);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nft  $nft
     * @return NftResource
     */
    public function show(Nft $nft , $id)
    {
        $nft = Nft::findorFail($id);
        return new NftResource($nft);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nft  $nft
     * @return \Illuminate\Http\Response
     */
    public function edit(Nft $nft)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param NftRequest $request
     * @param \App\Models\Nft $nft
     * @return NftResource
     */
    public function update(Request $request, Nft $nft ,$id)
    {

        $nft = Nft::findorFail($id)
            ->update([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
//            'image' => $request->file('image'),
                'price' => $request->input('price')
            ]);

//        $request->validated();

        return new NftResource($nft);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nft  $nft
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Nft $nft , $id)
    {
        Nft::findorFail($id)->delete();
        return response()->json(["message" => "Nft deleted"], 204);
    }

}
