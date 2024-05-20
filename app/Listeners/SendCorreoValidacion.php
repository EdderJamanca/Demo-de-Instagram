<?php

namespace App\Listeners;

use App\Models\User;
use App\Mail\RegistroUsuarioEmail;
use Illuminate\Support\Facades\Mail;
use App\Events\ValidarRegistoUsuario;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendCorreoValidacion
{
    public User $user;
    /**
     * Create the event listener.
     */
    public function __construct(User $user)
    {
        //
        $this->user=$user;
    }

    /**
     * Handle the event.
     */
    public function handle(ValidarRegistoUsuario $event): void
    {
        //
        $user=$event->user;
        // dd($user->email);

        Mail::to([$user->email])->send(new RegistroUsuarioEmail($user));
    }
}
