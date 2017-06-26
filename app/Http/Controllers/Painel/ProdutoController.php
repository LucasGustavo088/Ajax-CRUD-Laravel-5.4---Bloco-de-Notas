<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Product;

class ProdutoController extends Controller
{
    private $product;

    public function __construct(Product $product){
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $products = $this->product->all();

        return view('Painel.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = ['eletronicos', 'moveis', 'limpeza', 'banho'];
        $title = 'Cadastrar Novo Produto';
        return view('Painel.Products.create', compact('title', 'categories'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, \App\User $user)
    {
        // //dd($request->all());
        // dd($request->input('name'));

        //pega todos os dados que vem do formulário
        $dataForm = $request->all();
        //preenchendo active com algo
        $dataForm['active'] = ( !isset($dataForm['active']) ) ? 0 : 1;
        //validação
        $this->validate($request, $this->product->rules);
        //faz o cadastro
        $insert = $this->product->create($dataForm);
        if($insert){
            return redirect()->route('produtos.index');
        } else {
            return redirect()->back();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tests(){
        //como inserir
        // $prod = $this->product;
        // $prod->name = 'TV Samsung';
        // $prod->number = 123123;
        // $prod->active = true;
        // $prod->category = 'eletronicos';
        // $prod->description = 'descricao do produto aqui...';
        // $insert = $prod->save();

        // $insert = $this->product->create([
        //     'name'          => 'produto 2',
        //     'number'        => 123,
        //     'active'        => false,
        //     'category'      => 'eletronicos',
        //     'description'   => 'descricao do produto aqui...'
        // ]);

        // if($insert){
        //     return "inserido com sucesso! ID: {$insert->id}";
        // } else {
        //     return 'falha ao inserir!';
        // }

        $prod = $this->product->find(5);
        $update = $prod->update([
            'name' => 'Update',
            'number' => 1,
            'active' => true,
            'category' => 'eletronicos',
            'description' => 'update'
        ]);

        if($prod){
            return "alterado com sucesso";
        } else 
            return 'nao deu certo';

    }
}
