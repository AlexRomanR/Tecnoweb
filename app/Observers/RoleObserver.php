<?php

namespace App\Observers;

use Spatie\Permission\Models\Role;
use App\Models\Bitacora;
use Illuminate\Support\Facades\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class RoleObserver
{
    /**
     * Handle the Role "created" event.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function created(Role $role)
    {
        $bitacora_id = session('bitacora_id');

        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);
        
            $horaActual = Carbon::now()->format('H:i:s');
        
            $bitacora->detalleBitacoras()->create([
                'accion' => Crypt::encrypt('Crear Rol'),
                'metodo' => Crypt::encrypt('POST'), 
                'hora' => Crypt::encrypt($horaActual),
                'tabla' => Crypt::encrypt('roles'), 
                'registroId' => Crypt::encrypt($role->id),
                'ruta'=> Crypt::encrypt(Request::url()),
            ]);
        }
    }

    /**
     * Handle the Role "updated" event.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function updated(Role $role)
    {
        
    }

    /**
     * Handle the Role "deleted" event.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function deleted(Role $role)
    {
        $bitacora_id = session('bitacora_id');

        
        if ($bitacora_id) {
            $bitacora = Bitacora::find($bitacora_id);

            $horaActual = Carbon::now()->format('H:i:s');

            $bitacora->detalleBitacoras()->create([
                'accion' => Crypt::encrypt('Eliminar Rol'),
                'metodo' => Crypt::encrypt('DELETE'), 
                'hora' => Crypt::encrypt($horaActual),
                'tabla' => Crypt::encrypt('roles'), 
                'registroId' => Crypt::encrypt($role->id),
                'ruta'=> Crypt::encrypt(Request::url()),
            ]);
        }
    }

    /**
     * Handle the Role "restored" event.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function restored(Role $role)
    {
        //
    }

    /**
     * Handle the Role "force deleted" event.
     *
     * @param  \Spatie\Permission\Models\Role  $role
     * @return void
     */
    public function forceDeleted(Role $role)
    {
        //
    }
}
