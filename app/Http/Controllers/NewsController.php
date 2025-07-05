<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class NewsController extends Controller{

    public function index(){
        $news = Article::all();

        return view('news.index', [
            'news' => $news
        ]);
    }

    public function view(int $id){

        return view('news.view', [
            'new' => Article::findOrFail($id)
        ]);
    }

    public function create(){
        return view('news.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|min:3',
            'subtitle' => 'required|min:3',
            'author' => 'required|min:2',
            'release_date' => 'required',
            'description' => 'required|min:5',
            'tag' => 'required|min:2'
        ], [
            'title.required' => 'Debe ingresar un titulo para la noticia',
            'title.min' => 'El titulo ingresado debe tener al menos :min caracteres',
            'subtitle.required' => 'Debe ingresar un subtitulo para la noticia',
            'subtitle.min' => 'El subtitulo ingresado debe tener al menos :min caracteres',
            'author.required' => 'Debe ingresar el autor de la noticia',
            'author.min' => 'El nombre del autor ingresado debe tener al menos :min caracteres',
            'release_date.required' => 'Debe ingresar la fecha de publicacion de la noticia',
            'description.required' => 'El artículo de la noticia no puede estar vacio',
            'description.min' => 'La noticia ingresada debe tener al menos :min caracteres',
            'tag.required' => 'Los tags de la noticia no pueden estar vacios',
            'tag.min' => 'Los tags ingresados debe tener al menos :min caracteres'
        ]);

        Article::create($request->all());

        return redirect()
            ->route('news.index')
            ->with('feedback.message', '¡La noticia <b>' . e($request->title) . '</b> se publicó correctamente!');
    }

    public function delete(int $id){

        return view('news.delete', [
            'new' => Article::findOrFail($id)
        ]);
    }

    public function destroy(int $id){
        $new = Article::findOrFail($id);
        $new->delete();

        return redirect()
            ->route('news.index')
            ->with('feedback.message', '¡La noticia <b>' . e($new->title) . '</b> se eliminó correctamente!');
    }

    public function edit(int $id){

        return view('news.edit', [
            'new' => Article::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id){

        $request->validate([
            'title' => 'required|min:3',
            'subtitle' => 'required|min:3',
            'author' => 'required|min:2',
            'release_date' => 'required',
            'description' => 'required|min:5',
            'tag' => 'required|min:2'
        ], [
            'title.required' => 'Debe ingresar un titulo para la noticia',
            'title.min' => 'El titulo ingresado debe tener al menos :min caracteres',
            'subtitle.required' => 'Debe ingresar un subtitulo para la noticia',
            'subtitle.min' => 'El subtitulo ingresado debe tener al menos :min caracteres',
            'author.required' => 'Debe ingresar el autor de la noticia',
            'author.min' => 'El nombre del autor ingresado debe tener al menos :min caracteres',
            'release_date.required' => 'Debe ingresar la fecha de publicacion de la noticia',
            'description.required' => 'El artículo de la noticia no puede estar vacio',
            'description.min' => 'La noticia ingresada debe tener al menos :min caracteres',
            'tag.required' => 'Los tags de la noticia no pueden estar vacios',
            'tag.min' => 'Los tags ingresados debe tener al menos :min caracteres'
        ]);

        $new = Article::findOrFail($id);

        $new->update($request->all());

        return redirect()
            ->route('news.index')
            ->with('feedback.message', '¡La noticia <b>' . e($request->title) . '</b> se actualizó correctamente!');
    }
    
}
