<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutosController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('admin.produtos.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.produtos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_produto' => 'required',
            'descricao_produto' => 'required',
            'preco' => 'required',
            'qtd_estoque' => 'required',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $data = $request->all();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $imagePath = ImageHelper::saveImage($request->file('image'));
            if ($imagePath) {
                $data['image_path'] = $imagePath;
            }
        }

        Produto::create($data);
        return redirect()->route('admin.produtos.index')
            ->with('success', 'Produto criado com sucesso');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return view('admin.produtos.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        $categorias = Categoria::all();
        return view('admin.produtos.edit', compact('produto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nome_produto' => 'required',
            'descricao_produto' => 'required',
            'preco' => 'required',
            'qtd_estoque' => 'required',
        ]);

        $data = $request->all();

        // Se uma nova imagem foi enviada
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Deleta a imagem antiga se existir
            if ($produto->image_path) {
                ImageHelper::deleteImage($produto->image_path);
            }

            // Salva a nova imagem
            $imagePath = ImageHelper::saveImage($request->file('image'));
            if ($imagePath) {
                $data['image_path'] = $imagePath;
            }
        }

        $produto->update($data);

        return redirect()->route('admin.produtos.index')
            ->with('success', 'Produto atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);

        // Deletar a imagem se ela existir
        if ($produto->image_path) {
            Storage::delete('public/' . $produto->image_path);
        }

        $produto->delete();

        return redirect()->route('produtos.index')
            ->with('success', 'Produto excluído com sucesso!');
    }
}
