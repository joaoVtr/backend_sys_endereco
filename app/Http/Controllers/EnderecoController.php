<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnderecoRequest;
use App\Http\Requests\UpdateEnderecoRequest;
use App\Http\Resources\EnderecoResource;
use App\Models\Endereco;
use App\Repositories\EnderecoRepository;

class EnderecoController extends Controller
{
    public function __construct(private EnderecoRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $endereco = $this->repository->index();

        return EnderecoResource::collection($endereco);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEnderecoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEnderecoRequest $request)
    {
        $endereco = $this->repository->store($request->validated());
        return new EnderecoResource($endereco);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        return new EnderecoResource($endereco);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEnderecoRequest  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEnderecoRequest $request, Endereco $endereco)
    {
        $endereco->fill($request->validated())->save();

        return new EnderecoResource($endereco);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy(Endereco $endereco)
    {
        Endereco::destroy($endereco->id);
        return response()->json([], 204);
    }
}
