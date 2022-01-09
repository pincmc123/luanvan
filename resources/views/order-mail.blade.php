<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
</head>
<body>
<p>Hi {{$order->user_name}} </p>
<p>Bạn đã đặt hành thành công</p>
<br>
<table style="width: 600px;text-align: right">
    <thead>
    <tr>
        <th>Image</th>
        <th>Product</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>total</th>
    </tr>
    </thead>
    <tbody>

    @foreach(\App\Models\orderdetail::where('id_order','=',$order->id)->get() as $value)
        <tr>
            <td></td>
            <td>{{\App\Models\product::find($value->id_product)->name}}</td>
            <td>{{$value->quantity}}</td>
            <td>{{$value->price}}</td>
            <td>{{$value->amount}}</td>

        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
