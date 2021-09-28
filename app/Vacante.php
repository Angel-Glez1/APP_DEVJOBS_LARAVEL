<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacante extends Model
{

    protected $fillable = [
        'titulo',
        'imagen',
        'descripcion',
        'skills',
        'categoria_id',
        'experiencia_id',
        'ubicacion_id',
        'salario_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**  Relacion 1:1 inversa con categoria **/
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    /**  Relacion 1:1 inversa con experiencia **/
    public function experiencia(){
        return $this->belongsTo(Experiencia::class, 'experiencia_id');
    }

    /**  Relacion 1:1 inversa con ubicacion **/
    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class, 'ubicacion_id');
    }

    /**  Relacion 1:1 inversa con salario **/
    public function salario(){
        return $this->belongsTo(Salario::class, 'salario_id');
    }

    /**  Relacion 1:n con canditos **/
    public function candidatos(){
        return $this->hasMany(Candidato::class);
    }
   


}
