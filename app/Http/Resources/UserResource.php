<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'email'=> $this->email,
            'phone'=> $this->phone,
            'cpf' => $this->cpf,
            'cep' => $this->cep,
            'city' => $this->city,
            'uf' => $this->uf,
            'address' => $this->address,
            'number' => $this->number,
            'district' => $this->district,
            'complement' => $this->complement,
            'reference' => $this->reference
        ];
    }
}
