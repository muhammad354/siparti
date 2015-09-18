<?php

namespace App\Transformers;

use App\Entities\Profile;
use League\Fractal\TransformerAbstract;
use App\Entities\User;

/**
 * Class UserTransformer
 * @package namespace App\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    protected $defaultIncludes = ['profile'];
    /**
     * Transform the \User entity
     * @param User $model
     * @return array
     */
    public function transform(User $model)
    {
        return [
            'id'            => (int)$model->id,
            'name'          => $model->name,
            'email'         => $model->email,
            'status'        => $model->status,
            'registered_at' => $model->created_at->timezone(new \DateTimeZone(auth()->user()->getTimezoneAttribute())),
            'created_at'    => $model->created_at,
            'updated_at'    => $model->updated_at
        ];
    }

    public function includeProfile(User $user)
    {
        return $this->item($user->profile, new ProfileTransformer);
    }
}
