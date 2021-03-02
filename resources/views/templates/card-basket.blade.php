<tr>
    <td>
        <a href="{{route('category_product', ['category' => $product->category->code, 'product' => $product->id])}}">
            <img height="56px" src="@isset($product->image)
            {{\Illuminate\Support\Facades\Storage::url($product->image)}}
            @else
                http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg
                         @endisset">
            {{$product->__('name')}}
        </a>
    </td>
    <td><span class="badge">{{$product->pivot->count}}</span>
        <div class="btn-group form-inline">
            <form action="{{route('basket-remove', $product->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" href=""><span
                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
            </form>
            <form action="{{route('basket-add', $product->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success"
                        href=""><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </form>
        </div>
    </td>
    <td>{{$product->price}} ₽</td>
    <td>{{$product->getPriceForCount()}} ₽</td>
</tr>
