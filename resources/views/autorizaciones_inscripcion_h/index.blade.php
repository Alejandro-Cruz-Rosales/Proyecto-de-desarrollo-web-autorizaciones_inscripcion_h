@extends('layouts.app')

@section('title','Autorizacion de Inscripcion H ')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h2>Lista de Autorizacion de Inscripcion</h2>
        </div>
        <div class="col text-end">
            <a href="{{ route('autorizaciones_inscripcion_h.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Nuevo Autorizacion de Inscripcion
            </a>
        </div>
    </div>

    <!-- Mensajes de éxito/error -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Tabla de autorizaciones_inscripcion_h -->
    <div class="card">
        <div class="card-body">
            @if($autorizaciones_inscripcion_h->count() > 0)
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Periodo</th>
                                <th>No. Control</th>
                                <th>Tipo Autorización</th>
                                <th>Motivo Autorización</th>
                                <th>Quien Autoriza</th>
                                <th>Fecha/Hora Autorización</th>
                                <th>Materia Afectada</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($autorizaciones_inscripcion_h as $autorizaciones_inscripcion_h)
                                <tr>
                                    <td>{{ $autorizaciones_inscripcion_h->id }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->periodo }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->no_de_control }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->tipo_de_autorizacion }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->motivo_autorizacion }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->quien_autoriza }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->fecha_hora_autoriza }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->materia_afectada }}</td>
                                    <td>{{ $autorizaciones_inscripcion_h->cantidad }}</td>

                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('autorizaciones_inscripcion_h.show', $autorizaciones_inscripcion_h->id) }}" 
                                                class="btn btn-sm btn-info" 
                                                title="Ver detalle">
                                                <i class="bi bi-eye"></i> Ver
                                            </a>

                                            <a href="{{ route('autorizaciones_inscripcion_h.edit', $autorizaciones_inscripcion_h->id) }}" 
                                                class="btn btn-sm btn-warning"
                                                title="Editar">
                                                <i class="bi bi-pencil"></i> Editar
                                            </a>

                                            <form action="{{ route('autorizaciones_inscripcion_h.destroy', $autorizaciones_inscripcion_h->id) }}" 
                                                method="POST" 
                                                class="d-inline">
                                             @csrf
                                             @method('DELETE')
                                            <button type="submit" 
                                                    class="btn btn-sm btn-danger" 
                                                    title="Eliminar"
                                                    onclick="return confirm('¿Está seguro de eliminar este registro?')">
                                                <i class="bi bi-trash"></i> Eliminar
                                            </button>
                                         </form>
                                    </div>
                                </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">
                    <i class="bi bi-info-circle"></i> No hay registros de autorizaciones.
                    <a href="{{ route('autorizaciones_inscripcion_h.create') }}">Crear el primero</a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

