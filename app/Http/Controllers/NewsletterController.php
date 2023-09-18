<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\NewsletterClient;
use App\Models\Product;
use App\Mail\newsletterMail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class NewsletterController extends Controller
{
    public function allNewsletter()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $viewAll = Newsletter::latest()->paginate(10);
            return view('allNewsletter', compact('viewAll'));
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    public function createNewsletter()
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $products = Product::all();
            return view('createNewsletter', compact('products'));
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    public function storeNewsletter(Request $request)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $create = $request->all();
            $create['products_in_mail'] = json_encode($create['products_in_mail']);
            Newsletter::create($create);
            return redirect('/todas-newsletter');
        } else {
            return abort(403, 'Acesso não autorizado.');
        } 
    }

    public function addMailClient(Request $request)
    {
        $email = $request->input('client_mail');
        $existingEmail = NewsletterClient::where('client_mail', $email)->first();
        if ($existingEmail) {
            return response()->json(['success' => false, 'message' => 'Email já cadastrado.']);
        }
        NewsletterClient::create(['client_mail' => $email]);
        return response()->json(['success' => true]);
    }

    public function sendNewsLetter($id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $newsletter = Newsletter::findOrFail($id);
            $title = $newsletter['title_campaign'];
            $title_content = $newsletter['title_content'];
            $facebook = $newsletter['link_facebook'];
            $instagram = $newsletter['link_instagram'];
            $whatsapp = $newsletter['link_whatsapp'];
            $productIds = json_decode($newsletter['products_in_mail']);
            $products = Product::whereIn('id', $productIds)->get();
            $subscribers = NewsletterClient::pluck('client_mail')->toArray();
            \Mail::to($subscribers)->send(new newsletterMail($title, $title_content, $products, $facebook, $instagram, $whatsapp));
            return redirect()->route('todas-newsletter')->with('success', 'Newsletter disparada para todos clientes com sucesso!');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }  
    }

    public function destroy($id)
    {
        if (auth()->user()->can('viewAdminPanel', User::class)) {
            $product = Newsletter::findOrFail($id);
            $product->delete();
        return redirect()->route('todas-newsletter')->with('success', 'Newsletter excluída com sucesso!');
        } else {
            return abort(403, 'Acesso não autorizado.');
        }  
    }
}
