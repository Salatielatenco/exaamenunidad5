<?php

namespace App\Http\Controllers;

use App\Models\Nventa;
use Illuminate\Http\Request;

/**
 * Class NventaController
 * @package App\Http\Controllers
 */
class NventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nventas = Nventa::paginate();

        return view('nventa.index', compact('nventas'))
            ->with('i', (request()->input('page', 1) - 1) * $nventas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nventa = new Nventa();
        return view('nventa.create', compact('nventa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Nventa::$rules);

        $nventa = Nventa::create($request->all());

        return redirect()->route('nventas.index')
            ->with('success', 'Nueva venta creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nventa = Nventa::find($id);

        return view('nventa.show', compact('nventa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nventa = Nventa::find($id);

        return view('nventa.edit', compact('nventa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Nventa $nventa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nventa $nventa)
    {
        request()->validate(Nventa::$rules);

        $nventa->update($request->all());

        return redirect()->route('nventas.index')
            ->with('success', 'actualizada correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $nventa = Nventa::find($id)->delete();

        return redirect()->route('nventas.index')
            ->with('success', 'eliminada correctamente');
    }
}
