<?php

namespace App\Http\Controllers;

use App\Models\Family;
use Illuminate\Http\Request;

class FamilyController extends Controller
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

        return view('family.index', [
            'families' => $families,
            'allAnak' => $anak,
            'allcucu'   => $cucu,
            'cucupr'    => $cucupr,
            'bibifarah' => $bibifarah,
            'sepupulkhani'  => $sepupulkhani
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tingkatAtas = Family::whereIn('tingkat', ['1', '2'])->get();

        return view('family.create', [
            'ortu'  => $tingkatAtas
        ]);
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

        return redirect('/family');
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
    public function edit($id)
    {
        $family = Family::find($id);


        $tingkatAtas = Family::whereIn('tingkat', ['1', '2'])->get();

        return view('family.edit', [
            'family' => $family,
            'ortu'  => $tingkatAtas
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request = [
            'nama'  => $request->nama,
            'jk'  => $request->jk,
            'tingkat'  => $request->tingkat,
            'ortu'  => $request->ortu,
        ];

        Family::where('id', $id)->update($request);


        return redirect('/family');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Family::destroy($id);

        return redirect('/family');
    }


    public function diagram()
    {
        $ayah = Family::where('tingkat', '1')->first();
        $anak = Family::where('ortu', $ayah->nama)->get();

        foreach ($anak as $a) {

            $anaklagi = [];

            $anaklagi = Family::where('ortu', $a->nama)->get();

            $a['anak'] = $anaklagi;

            $newAnak[] = $a;
        }

        $family = $ayah;
        $family['anak'] = $newAnak;

        $families = $family;

        return view('family.diagram', [
            'families' => $families
        ]);
    }
}
