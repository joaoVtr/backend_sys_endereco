<?php

namespace App\Repositories;

use App\Models\Endereco;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

use function PHPUnit\Framework\isEmpty;
use function PHPUnit\Framework\isNull;

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

    /**
     * Retorna um endereço filtrado pelo CEP
     */
    public function seachByCep($cep)
    {
        $data = Endereco::where('CEP', $cep)->first();

        if (isset($data)) {
            return $data;
        } else {
            return Http::get("viacep.com.br/ws/{$cep}/json/");
        }
    }

    /**
     * Retorn um endereço filtrado pelo logradouro
     */
    public function searchByLogradouro($logradouro)
    {
        $data = Endereco::where('logradouro', 'like', "%{$logradouro}%")->first();

        if (isset($data))
            return $data;

        return response()->json(['msg' => 'Não existe logradouro com esse nome'], 404);
    }
}
