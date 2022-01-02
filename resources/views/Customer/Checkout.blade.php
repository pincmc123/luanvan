@extends('Customer.master')
@section('content')


<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="{{asset('Ogranic/img/breadcrumb.jpg')}}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Checkout</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Checkout</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div>
        </div>
        <div class="checkout__form">
            <h4>Billing Details</h4>
            <form action="checkout" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Name<span>*</span></p>
                                    <input type="text" name="namecustomer"  @if(Auth::user()&&Auth::user()->role=='user')
                                        value="{{Auth::user()->name}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                       {{-- <div class="checkout__input">
                            <p>Country<span>*</span></p>
                            <input type="text" name="country">
                        </div>--}}
                        <div class="checkout__input">
                            <p>Address<span>*</span></p>
                            <input type="text" id="address" placeholder="Street Address" class="checkout__input__add" name="address" placeholder="Choose Location"
                                   @if(Auth::user()&&Auth::user()->role=='user')
                                   value="{{Auth::user()->address}}"
                                @endif
                            >
                            {{--<input type="text" placeholder="Apartment, suite, unite ect (optinal)" name="apt">--}}
                        </div>
                        {{--<div class="checkout__input">
                            <p>Town/City<span>*</span></p>
                            <input type="text" name="city">
                        </div>
                        <div class="checkout__input">
                            <p>Country/State<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input">
                            <p>Postcode / ZIP<span>*</span></p>
                            <input type="text">
                        </div>--}}
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Phone<span>*</span></p>
                                    <input type="text" name="phonecustomer"
                                           @if(Auth::user()&&Auth::user()->role=='user')
                                           value="{{Auth::user()->phone}}"
                                        @endif
                                    >
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <p>Email<span>*</span></p>
                                    <input type="text" name="emailcustomer"
                                           @if(Auth::user()&&Auth::user()->role=='user')
                                           value="{{Auth::user()->email}}"
                                        @endif
                                    >
                                </div>
                            </div>
                        </div>
                            @if(!Auth::user())
                        <div class="checkout__input__checkbox">
                            <label for="acc">
                                Create an account?
                                <input type="checkbox" id="acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                        <div class="checkout__input">
                            <p>Account Password<span>*</span></p>
                            <input type="text">
                        </div>
                        <div class="checkout__input__checkbox">
                            <label for="diff-acc">
                                Ship to a different address?
                                <input type="checkbox" id="diff-acc">
                                <span class="checkmark"></span>
                            </label>
                        </div>@endif
                        <div class="checkout__input">
                            <p>Order notes<span>*</span></p>
                            <input type="text" name="message"
                                   placeholder="Notes about your order, e.g. special notes for delivery.">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                @if(session()->has('cart'))
                                    @foreach($datas as $key => $data)
                                        <li>{{$data->name}}<span>{{$data->sum}}</span></li>
                                    @endforeach
                                @endif
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>{{number_format($total)}}</span></div>
                            <div class="checkout__order__total">Total <span>{{number_format($total)}}</span></div>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment" value="1">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="vnpay" value="2">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- Checkout Section End -->
@endsection



