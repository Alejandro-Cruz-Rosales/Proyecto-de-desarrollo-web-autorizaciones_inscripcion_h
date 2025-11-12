<?php

namespace App\Http\Controllers;

use App\Models\AutorizacionesInscripcionH;
use Illuminate\Http\Request;

class AutorizacionesInscripcionHController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener todas las autorizaciones ordenadas por ID
        $autorizaciones_inscripcion_h = AutorizacionesInscripcionH::orderBy('id')->get();

        // Retornar la vista con los datos
        return view('autorizaciones_inscripcion_h.index', compact('autorizaciones_inscripcion_h'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autorizaciones_inscripcion_h.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formularios
        
        $validatedData = $request->validate([
            'id' => 'string|max:255|unique:autorizaciones_inscripcion_h,id',
            'periodo' => 'string|max:5',
            'no_de_control' => 'string|max:10',
            'tipo_de_autorizacion' => 'string|max:2',
            'motivo_autorizacion' => 'string|max:100',
            'quien_autoriza' => 'string|max:35',
            'fecha_hora_autoriza' => 'date',
            'materia_afectada' => 'string|max:100',
            'cantidad' => 'integer',
        ], [
            'id.' => 'El campo ID es obligatorio.',
            'id.unique' => 'Este ID ya existe en el sistema.',
            'periodo.required' => 'El periodo es obligatorio.',
            'no_de_control.required' => 'El número de control es obligatorio.',
            'tipo_de_autorizacion.required' => 'El tipo de autorización es obligatorio.',
        ]);
        
        try {
            AutorizacionesInscripcionH::create($validatedData);

            return redirect()
                ->route('autorizaciones_inscripcion_h.index')
                ->with('success', 'Autorización registrada exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Error al registrar la autorización: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $autorizaciones_inscripcion_h = AutorizacionesInscripcionH::findOrFail($id);
        return view('autorizaciones_inscripcion_h.show', compact('autorizaciones_inscripcion_h'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $autorizaciones_inscripcion_h = AutorizacionesInscripcionH::findOrFail($id);
        return view('autorizaciones_inscripcion_h.edit', compact('autorizaciones_inscripcion_h'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $autorizaciones_inscripcion_h = AutorizacionesInscripcionH::findOrFail($id);

    // Validar datos (sin modificar el ID)
    $validatedData = $request->validate([
        // CORREGIDO: eliminé la validación del ID ya que no se debe actualizar
        'periodo' => 'required|string|max:5',
        'no_de_control' => 'required|string|max:20',
        'tipo_de_autorizacion' => 'required|string|max:2',
        'motivo_autorizacion' => 'nullable|string|max:100',
        'quien_autoriza' => 'nullable|string|max:35',
        'fecha_hora_autoriza' => 'nullable|date',
        'materia_afectada' => 'nullable|string|max:100',
        'cantidad' => 'nullable|integer|min:1',
    ], [
        'periodo.required' => 'El periodo es obligatorio.',
        'no_de_control.required' => 'El número de control es obligatorio.',
        'tipo_de_autorizacion.required' => 'El tipo de autorización es obligatorio.',
    ]);

    try {
        $autorizaciones_inscripcion_h->update($validatedData);

        return redirect()
            ->route('autorizaciones_inscripcion_h.index')
            ->with('success', 'Autorización actualizada exitosamente.');
    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->withInput()
            ->with('error', 'Error al actualizar la autorización: ' . $e->getMessage());
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $autorizaciones_inscripcion_h = AutorizacionesInscripcionH::findOrFail($id);
            $autorizaciones_inscripcion_h->delete();

            return redirect()
                ->route('autorizaciones_inscripcion_h.index')
                ->with('success', "La autorización con ID #$id fue eliminada exitosamente.");
        } catch (\Exception $e) {
            return redirect()
                ->route('autorizaciones_inscripcion_h.index')
                ->with('error', 'Error al eliminar la autorización: ' . $e->getMessage());
        }
    }
}

