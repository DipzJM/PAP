<?php

namespace App\Http\Controllers;

use App\Models\UserDetails;
use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\User;
use Exception;

class GameController extends Controller
{

    public function createGame(Request $request)
    {
        try {
            $game = new Game;
            $game->id_mapa = $request->id_mapa;
            $game->id_utilizador_veiculo = $request->id_utilizador_veiculo;
            $game->descricao = $request->descricao;
            $game->num_voltas = $request->num_voltas;
            $game->experiencia = $request->experiencia;
            $game->num_moedas = $request->num_moedas;
            $game->inicio = $request->inicio;
            $game->fim = $request->fim;
            $game->volta_mais_rapida = $request->volta_mais_rapida;
            $game->save();

            $tempo_jogado = $request->fim - $request->inicio;

            $user = UserDetails::find($request->id_utilizador_veiculo);
            $user->voltas_realizadas += $request->num_voltas;
            $user->corridas_realizadas += 1;
            $user->tempo_jogado += $tempo_jogado;
            $user->num_moedas += $request->num_moedas;
            $user->save();

            return response()->json([
                'status' => 'Sucesso',
                'message' => 'Jogo criado com sucesso',
                'data' => $game
            ]);
        } catch (Exception $e) {

            return response()->json([
                'status' => 'Fracasso',
                'message' => $e->getMessage(),
            ]);

        }


    }

}