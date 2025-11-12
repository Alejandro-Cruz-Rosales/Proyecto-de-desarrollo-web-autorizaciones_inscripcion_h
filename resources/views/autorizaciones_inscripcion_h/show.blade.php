@extends('layouts.app')

@section('title', 'Detalle de Autorización de Inscripción')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Detalle de Autorización</h4>
                    <div>
                        <a href="{{ route('autorizaciones_inscripcion_h.edit', $autorizaciones_inscripcion_h->id) }}" 
                           class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil"></i> Editar
                        </a>
                        <a href="{{ route('autorizaciones_inscripcion_h.index') }}" 
                           class="btn btn-sm btn-secondary">
                            <i class="bi bi-arrow-left"></i> Volver
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th width="30%" class="bg-light">ID</th>
                                <td>{{ $autorizaciones_inscripcion_h->id }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Periodo</th>
                                <td>{{ $autorizaciones_inscripcion_h->periodo }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Número de Control</th>
                                <td>{{ $autorizaciones_inscripcion_h->no_de_control }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Tipo de Autorización</th>
                                <td>{{ $autorizaciones_inscripcion_h->tipo_de_autorizacion }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Motivo de Autorización</th>
                                <td>{{ $autorizaciones_inscripcion_h->motivo_autorizacion }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Quién Autoriza</th>
                                <td>{{ $autorizaciones_inscripcion_h->quien_autoriza }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Fecha y Hora de Autorización</th>
                                <td>
                                    @if($autorizaciones_inscripcion_h->fecha_hora_autoriza)
                                        {{ \Carbon\Carbon::parse($autorizaciones_inscripcion_h->fecha_hora_autoriza)->format('d/m/Y H:i') }}
                                        <small class="text-muted">
                                            ({{ \Carbon\Carbon::parse($autorizaciones_inscripcion_h->fecha_hora_autoriza)->diffForHumans() }})
                                        </small>
                                    @else
                                        <em>No especificada</em>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th class="bg-light">Materia Afectada</th>
                                <td>{{ $autorizaciones_inscripcion_h->materia_afectada ?? 'No especificada' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Cantidad</th>
                                <td>{{ $autorizaciones_inscripcion_h->cantidad ?? 'No especificada' }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Creado</th>
                                <td>{{ $autorizaciones_inscripcion_h->created_at->format('d/m/Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th class="bg-light">Última Actualización</th>
                                <td>{{ $autorizaciones_inscripcion_h->updated_at->format('d/m/Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Botón Eliminar -->
                    <div class="mt-3">
                        <form action="{{ route('autorizaciones_inscripcion_h.destroy', $autorizaciones_inscripcion_h->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Está seguro de eliminar esta autorización?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash"></i> Eliminar Autorización
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
