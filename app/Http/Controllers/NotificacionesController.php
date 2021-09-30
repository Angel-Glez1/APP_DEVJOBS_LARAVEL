<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificacionesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

        // Mandar las notificaiones que no ha leido
        $notificaciones = auth()->user()->unreadNotifications;
        $notificacionesAnteriores = auth()->user()->notifications;

        auth()->user()->unreadNotifications->markAsRead();

        return view('notificaciones.index', compact('notificaciones', 'notificacionesAnteriores'));
    }
}
