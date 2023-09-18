@component('mail::message')
<a ><img src="https://i.ibb.co/cbhjFyD/LOGO-BAIXA-RESOLU-O.png" alt="logo-zarpo-320x132-transparente" style="max-width: 100%;height: 60px;display: block; margin-left:auto;margin-right:auto;" border="0"></a>
<h2 style="text-align:center;">{{$title_content}}</h2>
<br>
@foreach ($products as $product)
    <div style="margin-bottom: 20px;text-align: center;">
        <img src="{{ $product->image_product_1 }}" class="img-thumbnail" alt="...">
        <h1 style="text-align:center; margin-top: 10px;">{{ $product->name }}</h1>
        <p style="text-align:center;">{{ $product->type_product }}</p>
        <a href="{{ route('showProductClient', ['id' => $product->id]) }}" style="
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 20px;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;">
            Ver produto no site!
        </a>
    </div>
@endforeach
<br>
<ul style="list-style-type: none; text-align: center; padding: 0;">
    <li style="display: inline; margin-right: 20px;">
        <a href="{{$facebook}}" style="text-decoration: none; color: #007bff;">Facebook</a>
    </li>
    <li style="display: inline; margin-right: 20px;">
        <a href="{{$instagram}}" style="text-decoration: none; color: #007bff;">Instagram</a>
    </li>
    <li style="display: inline;">
        <a href="{{$whatsapp}}" style="text-decoration: none; color: #007bff;">WhatsApp</a>
    </li>
</ul>
@endcomponent