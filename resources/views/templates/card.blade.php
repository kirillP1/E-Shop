<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">


        </div>
        <img src="http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg" alt="{{$product->name}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} ₽</p>
            <p>{{$product->category->name}}
            </p><form action="http://internet-shop.tmweb.ru/basket/add/1" method="POST">
                <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                @if(isset($category))
                    <a href="{{route('product_category', ['product' => $product->id, 'category' => $category->code])}}" class="btn btn-default" role="button">Подробнее</a>
                @else
                    <a href="{{route('product', $product->id)}}" class="btn btn-default" role="button">Подробнее</a>
                @endif

                <input type="hidden" name="_token" value="UmLkczUeWhLgp7mwVr9FnPBKzWfm9evokBe4dn0x">            </form>
            <p></p>
        </div>
    </div>
</div>
