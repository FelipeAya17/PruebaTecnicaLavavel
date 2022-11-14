<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $table = 'ticket';
    public static function saveData($data){
        $data['fecha_registro'] = Carbon::now();
        return Ticket::create($data);
    }

    public static function updateData($data){
        $ticket = Ticket::find($data['id']);
        $ticket->usuario = $data['usuario'];
        $ticket->fecha_modifica = Carbon::now();
        $ticket->estado = $data['estado'];
        $ticket->save();
        return $ticket;
    }
}
