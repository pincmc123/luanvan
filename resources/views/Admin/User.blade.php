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
                                        <option value="">ADMIN</option>
                                        <option value="">CUSTOMER</option>
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
                                    <i class="zmdi zmdi-filter-list"></i>filters
                                </button>
                            </div>
                            <div class="table-data__tool-right">
                                <a class="au-btn au-btn-icon au-btn--green au-btn--small"
                                   href="{{route('user.create')}}">
                                    <i class="zmdi zmdi-plus"></i>add item</a>
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
                        <div class="row">
                            <div class="table-responsive table-responsive-data2">
                                <!-- USER DATA-->
                                <div class="user-data m-b-30">
                                    <h3 class="title-3 m-b-30">
                                        <i class="zmdi zmdi-account-calendar"></i>user data</h3>
                                    <div class="filters m-b-45">
                                        <div class="rs-select2--dark rs-select2--md m-r-10 rs-select2--border">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Properties</option>
                                                <option value="">Products</option>
                                                <option value="">Services</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--dark rs-select2--sm rs-select2--border">
                                            <select class="js-select2 au-select-dark" name="time">
                                                <option selected="selected">All Time</option>
                                                <option value="">By Month</option>
                                                <option value="">By Day</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table-data">
                                        <table class="table">
                                            <thead>
                                            <tr>

                                                <td>name</td>
                                                <td>role</td>
                                                <td>status</td>
                                                <td>Gender</td>
                                                <td></td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($data as $user)
                                                <tr>

                                                    <td>
                                                        <div class="table-data__info">
                                                            <h6>{{$user->name}}</h6>
                                                            <span>
                                                                <a href="#">{{$user->email}}</a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                    <td>
                                                            <span class="
                                                                   @if($user->role=='admin')
                                                                role admin
                                                               @else
                                                                role user
                                                                @endif
                                                                ">{{$user->role}}</span>
                                                    </td>

                                                    <td>
                                                        <span class="status--process">{{$user->status}}</span>
                                                    </td>

                                                    <td>
                                                       <div class="table-data__info">
                                                           {{$user->gender}}
                                                       </div>

                                                    </td>
                                                    <td>
                                                        <div class="table-data-feature">

                                                            <a type="button"
                                                               href="{{url('admin/user/'.$user->id.'/edit')}}"
                                                               class="item" data-toggle="tooltip" data-placement="top"
                                                               title="Edit">
                                                                <i class="zmdi zmdi-edit"></i>
                                                            </a>
                                                            <a type="button" href="{{url('admin/user/'.$user->id.'/delete')}}" class="item" data-toggle="tooltip"
                                                                    data-placement="top" title="Delete">
                                                                <i class="zmdi zmdi-delete"></i>
                                                            </a>

                                                        </div>

                                                    </td>
                                                </tr>@endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="user-data__footer">
                                        <button class="au-btn au-btn-load">load more</button>
                                    </div>
                                </div>
                                <!-- END USER DATA-->
                            </div>
                            <!-- END DATA TABLE -->
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright">
                                <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                                        href="https://colorlib.com">Colorlib</a>.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
