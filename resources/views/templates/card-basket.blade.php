<tr>
    <td>
        <a href="{{route('product_category', ['category' => $product->category->code, 'product' => $product->id])}}">
            <img height="56px" src="http://internet-shop.tmweb.ru/storage/products/{{$product->code}}.jpg">
            {{$product->name}}
        </a>
    </td>
    <td><span class="badge">1</span>
        <div class="btn-group form-inline">
            <form action="http://internet-shop.tmweb.ru/basket/remove/2" method="POST">
                <button type="submit" class="btn btn-danger" href=""><span
                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                <input type="hidden" name="_token" value="Z8YJU35gtTYpQcpFFK8bwL0RQBBmWmewd9rJTrlw">                            </form>
            <form action="{{route('basket-add', $product->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success"
                        href=""><span
                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            </form>
        </div>
    </td>
    <td>{{$product->price}} ₽</td>
    <td>{{$product->price}} ₽</td>
</tr>
