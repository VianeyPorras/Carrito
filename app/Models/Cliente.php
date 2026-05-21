<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cliente extends Authenticatable
{
    use Notifiable;

    protected $table = "clientes";

    protected $primaryKey = "id_cliente";

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'correo_electronico',
        'password',
        'fecha_registro',
        'telefono'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Indica que el login se hará con correo_electronico
     */
    public function getAuthIdentifierName()
    {
        return 'correo_electronico';
    }
}
