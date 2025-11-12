@extends('layouts.app')

@section('title', 'Nueva Autorización de Inscripción')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Nueva Autorización de Inscripción</h4>
                </div>
                <div class="card-body">
                    
                    <!-- Mostrar errores de validación -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <strong>¡Error!</strong> Por favor corrija los siguientes errores:
                            <ul class="mb-0 mt-2">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif


                    <!-- Formulario -->
                    <form action="{{ route('autorizaciones_inscripcion_h.store') }}" method="POST">
                        @csrf
                        
                        <!-- Periodo -->
                        <div class="mb-3">
                            <label for="periodo" class="form-label">
                                Periodo <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('periodo') is-invalid @enderror" 
                                id="periodo" 
                                name="periodo" 
                                value="{{ old('periodo') }}"
                                placeholder="Ej: 2025A"
                                required>
                            @error('periodo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Número de Control -->
                        <div class="mb-3">
                            <label for="no_de_control" class="form-label">
                                Número de Control <span class="text-danger">*</span>
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('no_de_control') is-invalid @enderror" 
                                id="no_de_control" 
                                name="no_de_control" 
                                value="{{ old('no_de_control') }}"
                                placeholder="Ej: 21304567"
                                required>
                            @error('no_de_control')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Tipo de Autorización -->
                        <div class="mb-3">
                            <label for="tipo_de_autorizacion" class="form-label">
                                Tipo de Autorización
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('tipo_de_autorizacion') is-invalid @enderror" 
                                id="tipo_de_autorizacion" 
                                name="tipo_de_autorizacion" 
                                value="{{ old('tipo_de_autorizacion') }}"
                                placeholder="Ej: Reinscripción">
                            @error('tipo_de_autorizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         <!--  Motivo Autorizacion -->
                        <div class="mb-3">
                            <label for="motivo_autorizacion" class="form-label">
                                Motivo de Autorización
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('motivo_autorizacion') is-invalid @enderror" 
                                id="motivo_autorizacion" 
                                name="motivo_autorizacion" 
                                value="{{ old('motivo_autorizacion') }}"
                                placeholder="Ej: Reinscripción">
                            @error('motivo_autorizacion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Quien Autoriza -->
                        <div class="mb-3">
                            <label for="quien_autoriza" class="form-label">
                                Quién Autoriza
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('quien_autoriza') is-invalid @enderror" 
                                id="quien_autoriza" 
                                name="quien_autoriza" 
                                value="{{ old('quien_autoriza') }}"
                                placeholder="Ej: Coordinador Académico">
                            @error('quien_autoriza')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Fecha y Hora de Autorización -->
                        <div class="mb-3">
                            <label for="fecha_hora_autoriza" class="form-label">
                                Fecha y Hora de Autorización
                            </label>
                            <input 
                                type="datetime-local" 
                                class="form-control @error('fecha_hora_autoriza') is-invalid @enderror" 
                                id="fecha_hora_autoriza" 
                                name="fecha_hora_autoriza" 
                                value="{{ old('fecha_hora_autoriza') }}">
                            @error('fecha_hora_autoriza')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Materia Afectada -->
                        <div class="mb-3">
                            <label for="materia_afectada" class="form-label">
                                Materia Afectada
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('materia_afectada') is-invalid @enderror" 
                                id="materia_afectada" 
                                name="materia_afectada" 
                                value="{{ old('materia_afectada') }}"
                                placeholder="Ej: Matemáticas Discretas">
                            @error('materia_afectada')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">
                                Cantidad
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('cantidad') is-invalid @enderror" 
                                id="cantidad" 
                                name="cantidad" 
                                value="{{ old('cantidad') }}"
                                placeholder="Ej: 1">
                            @error('cantidad')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Botones -->
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="{{ route('autorizaciones_inscripcion_h.index') }}" class="btn btn-secondary">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Guardar Autorización
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
