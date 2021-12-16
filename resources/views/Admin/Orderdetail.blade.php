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
                      <div class="table-responsive table-responsive-data2">
                          <!-- HEADER DESKTOP-->
                          <header class="header-desktop">
                              <div class="section__content section__content--p30">
                                  <div class="container-fluid">
                                      <div class="header-wrap">
                                          <form class="form-header" action="" method="POST">
                                              <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                              <button class="au-btn--submit" type="submit">
                                                  <i class="zmdi zmdi-search"></i>
                                              </button>
                                          </form>
                                          <div class="header-button">
                                              <div class="noti-wrap">
                                                  <div class="noti__item js-item-menu">
                                                      <i class="zmdi zmdi-comment-more"></i>
                                                      <span class="quantity">1</span>
                                                      <div class="mess-dropdown js-dropdown">
                                                          <div class="mess__title">
                                                              <p>You have 2 news message</p>
                                                          </div>
                                                          <div class="mess__item">
                                                              <div class="image img-cir img-40">
                                                                  <img src="images/icon/avatar-06.jpg" alt="Michelle Moreno" />
                                                              </div>
                                                              <div class="content">
                                                                  <h6>Michelle Moreno</h6>
                                                                  <p>Have sent a photo</p>
                                                                  <span class="time">3 min ago</span>
                                                              </div>
                                                          </div>
                                                          <div class="mess__item">
                                                              <div class="image img-cir img-40">
                                                                  <img src="images/icon/avatar-04.jpg" alt="Diane Myers" />
                                                              </div>
                                                              <div class="content">
                                                                  <h6>Diane Myers</h6>
                                                                  <p>You are now connected on message</p>
                                                                  <span class="time">Yesterday</span>
                                                              </div>
                                                          </div>
                                                          <div class="mess__footer">
                                                              <a href="#">View all messages</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="noti__item js-item-menu">
                                                      <i class="zmdi zmdi-email"></i>
                                                      <span class="quantity">1</span>
                                                      <div class="email-dropdown js-dropdown">
                                                          <div class="email__title">
                                                              <p>You have 3 New Emails</p>
                                                          </div>
                                                          <div class="email__item">
                                                              <div class="image img-cir img-40">
                                                                  <img src="images/icon/avatar-06.jpg" alt="Cynthia Harvey" />
                                                              </div>
                                                              <div class="content">
                                                                  <p>Meeting about new dashboard...</p>
                                                                  <span>Cynthia Harvey, 3 min ago</span>
                                                              </div>
                                                          </div>
                                                          <div class="email__item">
                                                              <div class="image img-cir img-40">
                                                                  <img src="images/icon/avatar-05.jpg" alt="Cynthia Harvey" />
                                                              </div>
                                                              <div class="content">
                                                                  <p>Meeting about new dashboard...</p>
                                                                  <span>Cynthia Harvey, Yesterday</span>
                                                              </div>
                                                          </div>
                                                          <div class="email__item">
                                                              <div class="image img-cir img-40">
                                                                  <img src="images/icon/avatar-04.jpg" alt="Cynthia Harvey" />
                                                              </div>
                                                              <div class="content">
                                                                  <p>Meeting about new dashboard...</p>
                                                                  <span>Cynthia Harvey, April 12,,2018</span>
                                                              </div>
                                                          </div>
                                                          <div class="email__footer">
                                                              <a href="#">See all emails</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                                  <div class="noti__item js-item-menu">
                                                      <i class="zmdi zmdi-notifications"></i>
                                                      <span class="quantity">3</span>
                                                      <div class="notifi-dropdown js-dropdown">
                                                          <div class="notifi__title">
                                                              <p>You have 3 Notifications</p>
                                                          </div>
                                                          <div class="notifi__item">
                                                              <div class="bg-c1 img-cir img-40">
                                                                  <i class="zmdi zmdi-email-open"></i>
                                                              </div>
                                                              <div class="content">
                                                                  <p>You got a email notification</p>
                                                                  <span class="date">April 12, 2018 06:50</span>
                                                              </div>
                                                          </div>
                                                          <div class="notifi__item">
                                                              <div class="bg-c2 img-cir img-40">
                                                                  <i class="zmdi zmdi-account-box"></i>
                                                              </div>
                                                              <div class="content">
                                                                  <p>Your account has been blocked</p>
                                                                  <span class="date">April 12, 2018 06:50</span>
                                                              </div>
                                                          </div>
                                                          <div class="notifi__item">
                                                              <div class="bg-c3 img-cir img-40">
                                                                  <i class="zmdi zmdi-file-text"></i>
                                                              </div>
                                                              <div class="content">
                                                                  <p>You got a new file</p>
                                                                  <span class="date">April 12, 2018 06:50</span>
                                                              </div>
                                                          </div>
                                                          <div class="notifi__footer">
                                                              <a href="#">All notifications</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="account-wrap">
                                                  <div class="account-item clearfix js-item-menu">
                                                      <div class="image">
                                                          <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                      </div>
                                                      <div class="content">
                                                          <a class="js-acc-btn" href="#">john doe</a>
                                                      </div>
                                                      <div class="account-dropdown js-dropdown">
                                                          <div class="info clearfix">
                                                              <div class="image">
                                                                  <a href="#">
                                                                      <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                                  </a>
                                                              </div>
                                                              <div class="content">
                                                                  <h5 class="name">
                                                                      <a href="#">john doe</a>
                                                                  </h5>
                                                                  <span class="email">johndoe@example.com</span>
                                                              </div>
                                                          </div>
                                                          <div class="account-dropdown__body">
                                                              <div class="account-dropdown__item">
                                                                  <a href="#">
                                                                      <i class="zmdi zmdi-account"></i>Account</a>
                                                              </div>
                                                              <div class="account-dropdown__item">
                                                                  <a href="#">
                                                                      <i class="zmdi zmdi-settings"></i>Setting</a>
                                                              </div>
                                                              <div class="account-dropdown__item">
                                                                  <a href="#">
                                                                      <i class="zmdi zmdi-money-box"></i>Billing</a>
                                                              </div>
                                                          </div>
                                                          <div class="account-dropdown__footer">
                                                              <a href="#">
                                                                  <i class="zmdi zmdi-power"></i>Logout</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </header>
                          <!-- END HEADER DESKTOP-->

                          <!-- MAIN CONTENT-->
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
                                                          <th class="text-right">price</th>
                                                          <th class="text-right">quantity</th>
                                                          <th class="text-right">total</th>
                                                      </tr>
                                                      </thead>
                                                      <tbody>
                                                      <tr>
                                                          <td>2018-09-29 05:57</td>
                                                          <td>100398</td>
                                                          <td>iPhone X 64Gb Grey</td>
                                                          <td class="text-right">$999.00</td>
                                                          <td class="text-right">1</td>
                                                          <td class="text-right">$999.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-28 01:22</td>
                                                          <td>100397</td>
                                                          <td>Samsung S8 Black</td>
                                                          <td class="text-right">$756.00</td>
                                                          <td class="text-right">1</td>
                                                          <td class="text-right">$756.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-27 02:12</td>
                                                          <td>100396</td>
                                                          <td>Game Console Controller</td>
                                                          <td class="text-right">$22.00</td>
                                                          <td class="text-right">2</td>
                                                          <td class="text-right">$44.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-26 23:06</td>
                                                          <td>100395</td>
                                                          <td>iPhone X 256Gb Black</td>
                                                          <td class="text-right">$1199.00</td>
                                                          <td class="text-right">1</td>
                                                          <td class="text-right">$1199.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-25 19:03</td>
                                                          <td>100393</td>
                                                          <td>USB 3.0 Cable</td>
                                                          <td class="text-right">$10.00</td>
                                                          <td class="text-right">3</td>
                                                          <td class="text-right">$30.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-29 05:57</td>
                                                          <td>100392</td>
                                                          <td>Smartwatch 4.0 LTE Wifi</td>
                                                          <td class="text-right">$199.00</td>
                                                          <td class="text-right">6</td>
                                                          <td class="text-right">$1494.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-24 19:10</td>
                                                          <td>100391</td>
                                                          <td>Camera C430W 4k</td>
                                                          <td class="text-right">$699.00</td>
                                                          <td class="text-right">1</td>
                                                          <td class="text-right">$699.00</td>
                                                      </tr>
                                                      <tr>
                                                          <td>2018-09-22 00:43</td>
                                                          <td>100393</td>
                                                          <td>USB 3.0 Cable</td>
                                                          <td class="text-right">$10.00</td>
                                                          <td class="text-right">3</td>
                                                          <td class="text-right">$30.00</td>
                                                      </tr>
                                                      </tbody>
                                                  </table>
                                              </div>
                                          </div>
                                      </div>
          <!-- END DATA TABLE-->
      </div>
  </div>
  <div class="row">
  <div class="col-md-12">
      <div class="copyright">
          <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
      </div>
  </div>
  </div>
            <!-- END MAIN CONTENT-->
@endsection
