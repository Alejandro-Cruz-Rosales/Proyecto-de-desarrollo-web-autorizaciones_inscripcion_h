<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AutorizacionesInscripcionH;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * Controlador API para la gestión de Autorizaciones de Inscripción.
 *
 * Este controlador maneja todas las operaciones CRUD para el recurso AutorizacionesInscripcionH
 * a través de endpoints RESTful, retornando respuestas en formato JSON.
 *
 * @package App\Http\Controllers\Api
 */
class AutorizacionesInscripcionHApiController extends Controller
{
    /**
     * Obtiene el listado completo de autorizaciones de inscripción.
     *
     * Retorna todas las autorizaciones registradas en el sistema.
     *
     * @return JsonResponse Colección de autorizaciones en formato JSON
     *
     * @example GET /api/autorizaciones-inscripcion
     * @response 200 [{"id": 1, "periodo": "24-25", "no_de_control": "12345678", ...}]
     */
    public function index(): JsonResponse
    {
        $autorizaciones = AutorizacionesInscripcionH::all();
        return response()->json($autorizaciones);
    }

    /**
     * Almacena una nueva autorización de inscripción en la base de datos.
     *
     * Valida los datos recibidos y crea un nuevo registro de autorización.
     *
     * @param Request $request Datos de la petición HTTP
     *
     * @return JsonResponse Autorización creada con código 201
     *
     * @throws \Illuminate\Validation\ValidationException Si la validación falla
     *
     * @example POST /api/autorizaciones-inscripcion
     * @body {
     *     "periodo": "24-25",
     *     "no_de_control": "12345678",
     *     "tipo_de_autorizacion": "01",
     *     "motivo_autorizacion": "Carga especial",
     *     "quien_autoriza": "Dr. Juan Pérez",
     *     "fecha_hora_autoriza": "2024-01-15 10:30:00",
     *     "materia_afectada": "Cálculo Diferencial",
     *     "cantidad": 1
     * }
     * @response 201 {"id": 1, "periodo": "24-25", "no_de_control": "12345678", ...}
     * @response 422 {"message": "The given data was invalid.", "errors": {...}}
     */
    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'periodo' => 'required|string|max:5',
            'no_de_control' => 'required|string|max:10',
            'tipo_de_autorizacion' => 'required|string|max:2',
            'motivo_autorizacion' => 'nullable|string|max:100',
            'quien_autoriza' => 'nullable|string|max:35',
            'fecha_hora_autoriza' => 'nullable|date',
            'materia_afectada' => 'nullable|string|max:100',
            'cantidad' => 'nullable|integer|min:0',
        ]);

        $autorizacion = AutorizacionesInscripcionH::create($request->all());
        return response()->json($autorizacion, 201);
    }

    /**
     * Muestra los detalles de una autorización de inscripción específica.
     *
     * Busca y retorna una autorización por su identificador único.
     *
     * @param string $id Identificador único de la autorización
     *
     * @return JsonResponse Datos de la autorización o mensaje de error
     *
     * @example GET /api/autorizaciones-inscripcion/{id}
     * @response 200 {"id": 1, "periodo": "24-25", "no_de_control": "12345678", ...}
     * @response 404 {"error": "Autorización de inscripción no encontrada"}
     */
    public function show(string $id): JsonResponse
    {
        try {
            $autorizacion = AutorizacionesInscripcionH::findOrFail($id);
            return response()->json($autorizacion);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Autorización de inscripción no encontrada'], 404);
        }
    }

    /**
     * Actualiza los datos de una autorización de inscripción existente.
     *
     * Valida los datos recibidos y actualiza el registro de la autorización.
     *
     * @param Request $request Datos de la petición HTTP con los campos a actualizar
     * @param string $id Identificador único de la autorización
     *
     * @return JsonResponse Autorización actualizada
     *
     * @throws \Illuminate\Validation\ValidationException Si la validación falla
     * @throws ModelNotFoundException Si la autorización no existe
     *
     * @example PUT/PATCH /api/autorizaciones-inscripcion/{id}
     * @body {
     *     "periodo": "24-25",
     *     "no_de_control": "12345678",
     *     "tipo_de_autorizacion": "02",
     *     "motivo_autorizacion": "Carga especial actualizada",
     *     "quien_autoriza": "Dra. María López",
     *     "fecha_hora_autoriza": "2024-01-20 14:30:00",
     *     "materia_afectada": "Álgebra Lineal",
     *     "cantidad": 2
     * }
     * @response 200 {"id": 1, "periodo": "24-25", "no_de_control": "12345678", ...}
     * @response 404 {"message": "No query results for model [App\\Models\\AutorizacionesInscripcionH]"}
     * @response 422 {"message": "The given data was invalid.", "errors": {...}}
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $request->validate([
            'periodo' => 'required|string|max:5',
            'no_de_control' => 'required|string|max:10',
            'tipo_de_autorizacion' => 'required|string|max:2',
            'motivo_autorizacion' => 'nullable|string|max:100',
            'quien_autoriza' => 'nullable|string|max:35',
            'fecha_hora_autoriza' => 'nullable|date',
            'materia_afectada' => 'nullable|string|max:100',
            'cantidad' => 'nullable|integer|min:0',
        ]);

        $autorizacion = AutorizacionesInscripcionH::findOrFail($id);
        $autorizacion->update($request->all());
        return response()->json($autorizacion);
    }

    /**
     * Elimina una autorización de inscripción del sistema.
     *
     * Busca la autorización por su identificador y la elimina permanentemente.
     *
     * @param string $id Identificador único de la autorización
     *
     * @return JsonResponse Respuesta vacía con código 204 (No Content)
     *
     * @throws ModelNotFoundException Si la autorización no existe
     *
     * @example DELETE /api/autorizaciones-inscripcion/{id}
     * @response 204 (Sin contenido)
     * @response 404 {"message": "No query results for model [App\\Models\\AutorizacionesInscripcionH]"}
     */
    public function destroy(string $id): JsonResponse
    {
        AutorizacionesInscripcionH::findOrFail($id)->delete();
        return response()->json(null, 204);
    }
}