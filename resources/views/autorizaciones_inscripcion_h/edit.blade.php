@extends('layouts.app')

@section('title', 'Editar Autorización de Inscripción')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Editar Autorización de Inscripción</h4>
                </div>
                <div class="card-body">

                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrige los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Formulario -->
                    <form action="{{ route('autorizaciones_inscripcion_h.update', $autorizaciones_inscripcion_h->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- ID (solo lectura) -->
                        <div class="mb-3">
                            <label for="id" class="form-label">ID</label>
                            <input 
                                type="text" 
                                class="form-control bg-light" 
                                id="id" 
                                value="{{ $autorizaciones_inscripcion_h->id }}" 
                                readonly 
                                disabled>
                            <small class="text-muted">El ID no se puede modificar</small>
                        </div>

                        <!-- Periodo -->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">Periodo <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="periodo" 
                                id="periodo" 
                                class="form-control @error('periodo') is-invalid @enderror"
                                value="{{ old('periodo', $autorizaciones_inscripcion_h->periodo) }}" 
                                maxlength="5" 
                                required>
                            @error('periodo') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Número de Control -->
                        <div class="mb-3">
                            <label for="no_de_control" class="form-label">Número de Control <span class="text-danger">*</span></label>
                            <input 
                                type="text" 
                                name="no_de_control" 
                                id="no_de_control" 
                                class="form-control @error('no_de_control') is-invalid @enderror"
                                value="{{ old('no_de_control', $autorizaciones_inscripcion_h->no_de_control) }}" 
                                maxlength="10" 
                                required>
                            @error('no_de_control') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Tipo de Autorización -->
                        <div class="mb-3">
                            <label for="tipo_de_autorizacion" class="form-label">Tipo de Autorización</label>
                            <input 
                                type="text" 
                                name="tipo_de_autorizacion" 
                                id="tipo_de_autorizacion" 
                                class="form-control @error('tipo_de_autorizacion') is-invalid @enderror"
                                value="{{ old('tipo_de_autorizacion', $autorizaciones_inscripcion_h->tipo_de_autorizacion) }}" 
                                maxlength="2">
                            @error('tipo_de_autorizacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Motivo de Autorización -->
                        <div class="mb-3">
                            <label for="motivo_autorizacion" class="form-label">Motivo de Autorización</label>
                            <input 
                                type="text" 
                                name="motivo_autorizacion" 
                                id="motivo_autorizacion" 
                                class="form-control @error('motivo_autorizacion') is-invalid @enderror"
                                value="{{ old('motivo_autorizacion', $autorizaciones_inscripcion_h->motivo_autorizacion) }}" 
                                maxlength="100">
                            @error('motivo_autorizacion') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Quién Autoriza -->
                        <div class="mb-3">
                            <label for="quien_autoriza" class="form-label">Quién Autoriza</label>
                            <input 
                                type="text" 
                                name="quien_autoriza" 
                                id="quien_autoriza" 
                                class="form-control @error('quien_autoriza') is-invalid @enderror"
                                value="{{ old('quien_autoriza', $autorizaciones_inscripcion_h->quien_autoriza) }}" 
                                maxlength="35">
                            @error('quien_autoriza') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Fecha y Hora de Autorización -->
                        <div class="mb-3">
                            <label for="fecha_hora_autoriza" class="form-label">Fecha y Hora de Autorización</label>
                            <input 
                                type="datetime-local" 
                                name="fecha_hora_autoriza" 
                                id="fecha_hora_autoriza" 
                                class="form-control @error('fecha_hora_autoriza') is-invalid @enderror"
                                value="{{ old('fecha_hora_autoriza', $autorizaciones_inscripcion_h->fecha_hora_autoriza ? \Carbon\Carbon::parse($autorizaciones_inscripcion_h->fecha_hora_autoriza)->format('Y-m-d\TH:i') : '') }}">
                            @error('fecha_hora_autoriza') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Materia Afectada -->
                        <div class="mb-3">
                            <label for="materia_afectada" class="form-label">Materia Afectada</label>
                            <input 
                                type="text" 
                                name="materia_afectada" 
                                id="materia_afectada" 
                                class="form-control @error('materia_afectada') is-invalid @enderror"
                                value="{{ old('materia_afectada', $autorizaciones_inscripcion_h->materia_afectada) }}">
                            @error('materia_afectada') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad</label>
                            <input 
                                type="number" 
                                name="cantidad" 
                                id="cantidad" 
                                class="form-control @error('cantidad') is-invalid @enderror"
                                value="{{ old('cantidad', $autorizaciones_inscripcion_h->cantidad) }}">
                            @error('cantidad') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <!-- Información adicional -->
                        <div class="alert alert-info">
                            <small>
                                <strong>Fecha de creación:</strong> {{ $autorizaciones_inscripcion_h->created_at }}<br>
                                <strong>Última actualización:</strong> {{ $autorizaciones_inscripcion_h->updated_at }}
                            </small>
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('autorizaciones_inscripcion_h.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-warning">
                                <i class="bi bi-save"></i> Actualizar Autorización
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
