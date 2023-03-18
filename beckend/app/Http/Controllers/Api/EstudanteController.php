<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudante;
// use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;






class EstudanteController extends Controller
{
    public function index()
    {
        $estudante = Estudante::all();
        if ($estudante->count() > 0) {
            return response()->json([
                'status' => 200,
                'estudante' => $estudante
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                // não pode acento nas palavras se  não buga tudo kk
                'Erro' => 'Algo esta errado'
            ], 404);
        }
    }


    public function store(Request $request)
    {   // o lavavel importou errado
        // import correto use Illuminate\Support\Facades\Validator;




        Validator::make($request->all(), [
            'nome' => 'required|string|max:191',
            'cpf' => 'required|digits:11',
            'email' => 'required|email|max:191',
            // coloquei o endereço aqui sem querer kk 'endereco' => 'required|max:191',
            'rua' => 'required|max:191',
            'bairro' => 'required|max:191',
            'numero' => 'required|max:191',
            'complemento' => 'max:191'
        ]);

        $estudante = new Estudante;
        $estudante->nome = $request->nome;
        $estudante->cpf = $request->cpf;
        $estudante->email = $request->email;
        $estudante->rua = $request->rua;
        $estudante->bairro = $request->bairro;
        $estudante->numero = $request->numero;
        $estudante->complemento = $request->complemento;
        $estudante->save();

        // Estudante::created([
        //     'nome' => $request->nome,
        //     'cpf ' => $request->cpf,
        //     'email ' => $request->email,
        //     // 'endereco ' => $request->endereco,
        //     'rua ' => $request->rua,
        //     'bairro ' => $request->bairro,
        //     'numero ' => $request->numero,
        //     'complemento ' => $request->complemento
        //     //     // php artisan refresh att no banco os campos

        // ]);


        // dd($estudante);

        if ($estudante) {
            # code...
            return response()->json([
                'status' => 200,
                'message' => "Usuario criado"
            ], 200);
        } else {
            return response()->json([
                'status' => 500,
                'message' => "erro detectado"
            ], 500);
        }
    }

    public function show($id)
    {
        $estudante = Estudante::find($id);
        if ($estudante) {
            return response()->json([
                'status' => 200,
                'estudante' => $estudante
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => " nenhum aluno encontrado
                "
            ], 404);
        }
    }


    public function editar($id)
    {
        $estudante = Estudante::find($id);
        if ($estudante) {
            return response()->json([
                'status' => 200,
                'estudante' => $estudante
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => " nenhum aluno encontrado
                "
            ], 404);
        }
    }
    public function update(Estudante $estudante, Request $request, int $id)
    {
        /*
        
        Estudante tabbela 
        $$estudante paramentro dentro da tabela

        */

        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:191',
            'cpf' => 'required|digits:11',
            'email' => 'required|email|max:191',
            // coloquei o endereço aqui sem querer kk 'endereco' => 'required|max:191',
            'rua' => 'required|max:191',
            'bairro' => 'required|max:191',
            'numero' => 'required|max:191',
            'complemento' => 'max:191'
        ]);
        if ($validator->fails()) {
            # code...
            return response()->json([
                'status' => 442,
                'erro' => $validator->messages()
            ], 442);
        } else {
            $estudante = Estudante::find($id);


            if ($estudante) {
                # code...



                $estudante->nome = $request->nome;
                $estudante->cpf = $request->cpf;
                $estudante->email = $request->email;
                $estudante->rua = $request->rua;
                $estudante->bairro = $request->bairro;
                $estudante->numero = $request->numero;
                $estudante->complemento = $request->complemento;
                $estudante->save();

                // $estudante->update([
                //     'nome' => $request->nome,
                //     'cpf ' => $request->cpf,
                //     'email ' => $request->email,
                //     // 'endereco ' => $request->endereco,
                //     'rua ' => $request->rua,
                //     'bairro ' => $request->bairro,
                //     'numero ' => $request->numero,
                //     'complemento ' => $request->complemento
                //     // php artisan refresh att no banco os campos

                // ]);
                return response()->json([
                    'status' => 200,
                    'message' => "Usuário atualizado"
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "nenhum estudante encontrado
                    "
                ], 404);
            }
        }
    }


    public function delete($id)
    {
        $estudante = Estudante::find($id);
        if ($estudante) {
            $estudante->delete();
        } else {
            return response()->json([
                'status' => 404,
                'message' => "nenhum aluno encontrado "
            ], 404);
        }
    }
}