<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PolicyPost
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determinar si la usuario puede crear modelos
     */
    public function create(User $user): bool
    {
        //
    }

    /**
     * Determinar si la usuario puede actualizar el modelo.
     */
    public function update(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determinar si la usuario puede eliminar el modelo.
     */
    public function delete(User $user, Post $post): bool
    {
        //
        // dd($user->id);
        return $user->id===$post->user_id;
    }

    /**
     * Determinar si la usuario puede restaurar el modelo.
     */
    public function restore(User $user, Post $post): bool
    {
        //
    }

    /**
     * Determine si el usuario puede eliminar permanentemente el modelo.
     */
    public function forceDelete(User $user, Post $post): bool
    {
        //
    }
}
