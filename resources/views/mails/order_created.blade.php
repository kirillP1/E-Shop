Hello, {{$name}}

Price of your order is {{$sum}}.

<table>
    <tbody>
    @foreach($order->products as $product)
        <tr>
            <td>{{$product->name}}</td>
            <td>Цена за один продукт: {{$product->price}}</td>
            <td>Кол-во: {{$product->pivot->count}}</td>
        </tr>
    @endforeach
    </tbody>
</table>

