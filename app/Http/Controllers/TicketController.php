<?php

namespace App\Http\Controllers;

use App\Http\Requests\TicketFormRequest;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TicketController extends Controller{
    public function getData(Request $request){
        $ticket = Ticket::select(
            'id',
            'usuario',
            'fecha_registra',
            'fecha_modifica',
            'estado'
        );
        return response()->json([
            'response' => 200,
            'mesagge' => 'Datos listados con éxito',
            'data' => [
                'ticket' => $request, $ticket
            ]
            ], 200);
    }

    public function saveOrUpdateData(TicketFormRequest $ticketFormRequest){
        $message = '';
        DB::beginTransaction();
        if($ticketFormRequest->ticket){
            Ticket::updateData([
                'usuario' => $ticketFormRequest->usuario,
                'estado' => $ticketFormRequest->estado
            ]);
            $message = 'Ticket actualizado correctamente';
        }else{
            Ticket::saveData([
                'usuario' => $ticketFormRequest->usuario,
                'estado' => $ticketFormRequest->estado
            ]);
            $message = 'Ticket creado correctamente';
        }
        DB::commit();
        return response()->json([
            'response' => 200,
            'message' => $message
        ], 200);
    }
}
