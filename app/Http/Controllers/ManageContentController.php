<?php

namespace App\Http\Controllers;

use App\Models\ManageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ManageContentController extends Controller
{
    public function index()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('manageContent');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function imagesCarousel()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('updateImagesCarousel');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function updateImagesCarousel(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $imageCarousel = $request->input('image_carousel');
            $linkImageCarousel = $request->input('link_image_carousel');
            $linkCollection = $request->input('link_collection');
            ManageContent::updateOrCreate(
                ['image_carousel' => $imageCarousel],
                ['link_image_carousel' => $linkImageCarousel, 'link_collection' => $linkCollection]
            );

            return redirect()->back()->with('success', 'Imagem do carousel de coleções atualizada com sucesso!');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function imagesCarouselCollection()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            return view('updateImagesCarouselCollection');
        }

        return abort(403, 'Acesso não autorizado.');
    }

    public function updateImagesCarouselCollections(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $imageCarousel = $request->input('image_carousel');
            $linkImageCarousel = $request->input('link_image_carousel');
            $linkCollection = $request->input('link_collection');

            ManageContent::updateOrCreate(
                ['image_carousel' => $imageCarousel],
                ['link_image_carousel' => $linkImageCarousel, 'link_collection' => $linkCollection]
            );

            return redirect()->back()->with('success', 'Imagem do carousel de coleções atualizada com sucesso!');
        }

        return abort(403, 'Acesso não autorizado.');
    }
}
