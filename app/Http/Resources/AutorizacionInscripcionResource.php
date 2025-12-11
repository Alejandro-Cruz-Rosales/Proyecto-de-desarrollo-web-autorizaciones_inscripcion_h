<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AutorizacionInscripcionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'periodo' => $this->periodo,
            'no_de_control' => $this->no_de_control,
            'tipo_de_autorizacion' => $this->tipo_de_autorizacion,
            'motivo_autorizacion' => $this->motivo_autorizacion,
            'quien_autoriza' => $this->quien_autoriza,
            'fecha_hora_autoriza' => $this->fecha_hora_autoriza?->format('Y-m-d H:i:s'),
            'materia_afectada' => $this->materia_afectada,
            'cantidad' => $this->cantidad,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
        ];
    }
}
