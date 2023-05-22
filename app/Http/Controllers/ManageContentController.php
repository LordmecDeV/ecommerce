<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManageContent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ManageContentController extends Controller
{
    
    public function index()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('manageContent');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    public function imagesCarousel()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('updateImagesCarousel');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }

    public function updateImagesCarousel(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $imageCarousel = $request->input('image_carousel');
            $linkImageCarousel = $request->input('link_image_carousel');
            // dd($linkImageCarousel);
            // Procura um registro existente com base no valor selecionado em "image_carousel"
            // e atualiza o campo "link_image_carousel" com o valor fornecido ou cria um novo registro
            ManageContent::updateOrCreate(
                ['image_carousel' => $imageCarousel],
                ['link_image_carousel' => $linkImageCarousel]
            );
            // Redireciona de volta para a página anterior ou para uma página de sucesso, por exemplo
            return redirect()->back()->with('success', 'Imagem do carousel atualizada com sucesso!');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }
    }
}
