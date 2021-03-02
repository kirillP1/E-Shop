<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">Новинка</span>
            @endif
            @if($product->isRecommend())
                <span class="badge badge-warning">Рекомендуемые</span>
            @endif
            @if($product->isHit())
                <span class="badge badge-danger">Хит продаж</span>
            @endif
        </div>
        <img src="@isset($product->image)
        {{\Illuminate\Support\Facades\Storage::url($product->image)}}
        @else
            http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg
                         @endisset" alt="{{$product->name}}">
        <div class="caption">
            <h3>{{$product->__('name')}}</h3>
            <p>{{$product->price}} ₽</p>
            <p>{{$product->category->__('name')}}
            </p>
            <form action="{{route('basket-add', $product->id)}}" method="POST">
                @csrf
                @if($product->isAvailable())
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                @else
                    <span>Товар не доступен</span>
                @endif
                <a href="{{route('category_product', [isset($category) ? $category->code : $product->category->code, $product->id])}}"
                   class="btn btn-default" role="button">Подробнее</a>
            </form>
            <p></p>
        </div>
    </div>
</div>
