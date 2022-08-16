<?php

namespace App\Repositories;

use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class EnderecoRepository
{
    /**
     * Retorna todos os endereços
     */
    public function index()
    {
        return Endereco::paginate(20);
    }

    /**
     * Salva os dados no banco de dados
     */
    public function store($data)
    {
        try {
            DB::beginTransaction();

            $res = Endereco::create($data);

            DB::commit();

            return $res;
        } catch (\Exception $error) {
            DB::rollBack();
            return response()->json(['Error' => $error->getMessage()], 404);
        }
    }
}
