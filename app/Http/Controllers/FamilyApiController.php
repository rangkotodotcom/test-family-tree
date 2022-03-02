<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Family::all();

        $anak = Family::where('tingkat', '2')->get();
        $cucu = Family::where('tingkat', '3')->get();
        $cucupr = Family::where('tingkat', '3')->where('jk', 'P')->get();
        $bibifarah = Family::where('tingkat', '2')->where('jk', 'P')->get();
        $sepupulkhani = Family::where('tingkat', '3')->where('jk', 'L')->get();

        $data = [
            'families' => $families,
            'allAnak' => $anak,
            'allcucu'   => $cucu,
            'cucupr'    => $cucupr,
            'bibifarah' => $bibifarah,
            'sepupulkhani'  => $sepupulkhani
        ];

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = [
            'nama'  => $request->nama,
            'jk'  => $request->jk,
            'tingkat'  => $request->tingkat,
            'ortu'  => $request->ortu,
        ];

        Family::create($request);

        return response()->json(['message' => 'Berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        if ($family) {
            return response()->json($family);
        } else {
            return response()->json([], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {
        $request = [
            'nama'  => $request->nama,
            'jk'  => $request->jk,
            'tingkat'  => $request->tingkat,
            'ortu'  => $request->ortu,
        ];

        Family::where('id', $family->id)->update($request);


        return response()->json(['message' => 'Berhasil']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy(Family $family)
    {
        Family::destroy($family->id);


        return response()->json(['message' => 'Berhasil']);
    }
}
