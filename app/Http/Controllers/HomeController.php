<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bolsa;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
     
    
     public function index()
    {
        $bolsas= Bolsa::paginate(10);
        return view('bags.index', compact('bolsas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('bags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $entrada = $request->all();

        if ($archivo = $request->file('imagen')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $entrada['imagen'] = $nombre;

        }

        Bolsa::create($entrada);

        return redirect('/bags')->with('success', 'Artículo creado exitosamente');
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
        //
        $bolsa = Bolsa::findOrFail($id);
        return view('bags.edit', compact('bolsa'));
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
        //

        $bolsa = Bolsa::findOrFail($id);
        $entrada = $request->all();

        if ($archivo = $request->file('imagen')) {
            $nombre = $archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $entrada['imagen'] = $nombre;

        }
        
        $bolsa->fill($entrada)->save();
        return redirect('/bags')->with('success', 'Artículo editado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $bolsa = Bolsa::findOrFail($id);
        $bolsa->delete();
        return response()->json([
            'success' => 'Artículo eliminado' 
        ]);
    }
}
