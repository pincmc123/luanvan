@extends('admin.master')
@section('content')
  <!-- MAIN CONTENT-->
  <div class="main-content">
      <div class="section__content section__content--p30">
          <div class="container-fluid">

              <div class="row">
                  <div class="col-md-12">
                      <!-- DATA TABLE -->
                      <h3 class="title-5 m-b-35">data table</h3>
                      <div class="table-data__tool">
                          <div class="table-data__tool-left">
                              <div class="rs-select2--light rs-select2--md">
                                  <select class="js-select2" name="property">
                                      <option selected="selected">All Properties</option>
                                      <option value="">Admin</option>
                                      <option value="">User</option>
                                  </select>
                                  <div class="dropDownSelect2"></div>
                              </div>
                              <div class="rs-select2--light rs-select2--sm">
                                  <select class="js-select2" name="time">
                                      <option selected="selected">Today</option>
                                      <option value="">3 Days</option>
                                      <option value="">1 Week</option>
                                  </select>
                                  <div class="dropDownSelect2"></div>
                              </div>
                              <button class="au-btn-filter">
                                  <i class="zmdi zmdi-filter-list"></i>filters</button>
                          </div>
                          <div class="table-data__tool-right">
                              <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                  <i class="zmdi zmdi-plus"></i>add item</button>
                              <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                  <select class="js-select2" name="type">
                                      <option selected="selected">Export</option>
                                      <option value="">Option 1</option>
                                      <option value="">Option 2</option>
                                  </select>
                                  <div class="dropDownSelect2"></div>
                              </div>
                          </div>
                      </div>
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>date</th>
                                                <th>order ID</th>
                                                <th>name</th>
                                                <th>address</th>
                                                <th >total</th>
                                                <th>Phone</th>

                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $order)

                                            <tr>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->id}}</td>
                                                <td>{{$order->user_name}}</td>
                                                <td>{{$order->user_address}}</td>
                                                <td class="text-right">{{number_format($order->amount)}}</td>
                                                <td class="text-right">{{$order->user_phone}}</td>



                                                <td>
                                                     <form action="{{route('order.update',['order'=>$order->id])}}" method="post">
                                                         @method('PUT')
                                                         @csrf
                                                    <div class="table-data-feature">
                                                        <div class="rs-select2--trans rs-select2--sm">
                                                            <select class="js-select2" name="property">
                                                                @switch($order->status)
                                                                    @case('O')
                                                                    <option value="O" selected="selected">Open</option>
                                                                    <option value="P" >Pending</option>
                                                                    <option value="D" >Done</option>
                                                                    <option value="C" >Canceled</option>
                                                                    @break

                                                                    @case('P')
                                                                    <option value="P" selected="selected">Pending</option>
                                                                    <option value="D" >Done</option>
                                                                    <option value="C" >Canceled</option>
                                                                    @break

                                                                    @case('D')
                                                                    <option value="" selected="selected">Done</option>
                                                                    @break

                                                                    @case('C')
                                                                    <option value="" selected="selected">Canceled</option>                                                                    @break
                                                                    @break

                                                                @endswitch

                                                            </select>
                                                            <div class="dropDownSelect2"></div>
                                                        </div>
                                                        <button class="item" type="submit" data-toggle="tooltip" data-placement="top" title="Accept">
                                                            <i class="zmdi zmdi-edit"></i>
                                                        </button>
                                                        <a href="{{url('admin/orderdetail/'.$order->id)}}" class="item" data-toggle="tooltip" data-placement="top" title="Orderdetail">
                                                            <i class="zmdi zmdi-mail-send"></i>
                                                        </a>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                            <i class="zmdi zmdi-delete"></i>
                                                        </button>
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                            <i class="zmdi zmdi-more"></i>
                                                        </button>
                                                        </div>
                                                     </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection
