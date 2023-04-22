<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Exception;
use App\Models\UtilizadorVeiculo;
use App\Models\UserDetails;

class UserController extends Controller
{
    protected function updateUserVehicles(Request $request)
    {
        try {
            $utilizadorVeiculo = new UtilizadorVeiculo;
            $utilizadorVeiculo->id_utilizador = $request->id_utilizador;
            $utilizadorVeiculo->id_veiculo = $request->id_veiculo;
            $preco_veiculo = Veiculo::find($request->id_veiculo)->preco;
        
            $user = UserDetails::find($request->id_utilizador);
            $saldoUser = $user->num_moedas;
        
            $utilizadorVeiculoExistente = UtilizadorVeiculo::where('id_utilizador', $request->id_utilizador)
                ->where('id_veiculo', $request->id_veiculo)
                ->first();

            if ($utilizadorVeiculoExistente) {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'O utilizador já possui o veiculo requesitado.',
                ]);
            }
        
            if ($saldoUser < $preco_veiculo) {
                return response()->json([
                    'status' => 'Erro',
                    'message' => 'Saldo insuficiente para comprar o veiculo requesitado.',
                ]);
            }
        
            $utilizadorVeiculo->save();
        

            $user->num_moedas -= $preco_veiculo;
            $user->save();
        
            return response()->json([
                'status' => 'Sucesso',
                'message' => 'Veiculo adquirido com sucesso.',
            ]);
        
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Fracasso',
                'message' => $e->getMessage(),
            ]);
        }
        
    }

}