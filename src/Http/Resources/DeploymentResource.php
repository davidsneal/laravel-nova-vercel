<?php

namespace Davidsneal\LaravelNovaVercel\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DeploymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'deployment_id' => $this['model']->deployment_id,
            'number' => $this['model']->deployment_number,
            'user' => $this['model']->user->name,
            'notes' => $this['model']->notes,
            'state' => $this['response']['state'] ?? 'loading',
            'createdAt' => $this['model']->created_at,
        ];
    }
}
