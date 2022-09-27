<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\regisevent;
use App\event;
use App\pasien;

class RegiseventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event      = \App\Event::all();

        $pasien     = \App\Pasien::all();

        $regisevent = Regisevent::all();
        
        return view('regisevent.index',compact('regisevent','event','pasien'));
    }

    public function fetchName(Request $request)
    {
        $pasien = Pasien::where('id_pasien', $request->id)
                    ->get(["nama_pasien", "nik", "id_pasien"]);
        
        return response()->json($pasien);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regisevent = \App\Regisevent::all();
        
        $event      = \App\Event::all();

        $pasien     = \App\Pasien::all();
        
        return view('regisevent.create',compact('regisevent','event','pasien'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'id_event' => 'required',
            'id_pasien' => 'required',
            'no_antrian' => 'required'
        ]);

        $regisevent = Regisevent::where([
            'id_event' =>$request->id_event,
            'id_pasien' =>$request->id_pasien
        ])->first();

            if ($regisevent) {

            return redirect()->back()->withErrors(['id_event' => 'sudah terdaftar']);

        }   else {

            Regisevent::create($request->all()); 

            return redirect()->route('regisevent.index')->with('Data ditambah','Data berhasil ditambah');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $regisevent = Regisevent::where('id_regisevent',$id)->first();  
        
        $event = event::where('id_event',$id)->first(); 

        $pasien = pasien::where('id_pasien',$id)->first(); 
        return view('regisevent.show',compact('regisevent','event','pasien'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $regisevent = Regisevent::where('id_regisevent',$id)->first(); 
        
        $event     = \App\Event::all();

        $pasien     = \App\Pasien::all();
        
        return view('regisevent.edit',compact('regisevent','event','pasien'));
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
        $this->validate($request,[
            'id_event' => 'required',
            'id_pasien' => 'required',
            'no_antrian' => 'required',
        ]);

        Regisevent::where('id_regisevent',$id)->update([
            'id_event' => $request->id_event,
            'id_pasien' => $request->id_pasien,
            'no_antrian' => $request->no_antrian,
        ]);
        
        return redirect()->route('regisevent.index')->with('Data diedit','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Regisevent::where('id_regisevent',$id)->delete(); 
        return redirect()->route('regisevent.index')->with('Data dihapus','Data berhasil dihapus');
    }
    
    public function cetakRegisevent()
    {
        $cetakregisevent = Regisevent::all();
        return view('regisevent.cetakregisevent',compact('cetakregisevent'));
    }
}
