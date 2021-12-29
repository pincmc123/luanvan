    @extends('Customer.master')
    @section('content')
        <!-- Shoping Cart Section Begin -->
        <form action="updatecart" method="post">
        @csrf
        <section class="shoping-cart spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__table">
                            <table>
                                <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($datas as $data)
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="{{asset('images/'.$data->image)}}" alt="">
                                        <h5>{{$data->name}}</h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        {{number_format($data->price)}} VNĐ
                                    </td>

                                    <td class="shoping__cart__quantity">
                                        <div class="quantity">
                                            <div class="pro-qty">
                                                <input type="number" min="0" max="100" name="cart[{{$data->code}}]" value="{{$data->quantity}}">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="shoping__cart__total">
                                        {{number_format($data->price*$data->quantity)}} VNĐ
                                    </td>
                                    <td class="shoping__cart__item__close">
                                        <span class="icon_close"></span>
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="shoping__cart__btns">
                            <a href="{{route('homeuser')}}" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                            <button href="updatecart" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                                Upadate Cart</button>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__continue">
                            <div class="shoping__discount">
                                <h5>Discount Codes</h5>
                                <form action="#">
                                    <input type="text" placeholder="Enter your coupon code">
                                    <button type="submit" class="site-btn">APPLY COUPON</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="shoping__checkout">
                            <h5>Cart Total</h5>
                            <ul>
                                {{--<li>Subtotal <span>$454.98</span></li>--}}
                                <li>Total <span>
                                    {{number_format($total)}} VNĐ

                                    </span></li>
                            </ul>
                            <a href="{{route('checkout')}}" class="primary-btn">PROCEED TO CHECKOUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        </form>

        <!-- Shoping Cart Section End -->
    @endsection
