@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--menu section start-->
  <div class="menu_main create_quote_main">
    <div class="menu_auto">
      <div class="menu_inner">
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{url('menu')}}">Menu</a></li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="menu_detail">
          <div class="create_quote_list">
            <ul>
              <li>
                <div class="create_quote_btn">
                  <a href="{{route('without_quote.client_bill')}}">Client Existant</a>
                </div>
              </li>
              <li>
                <div class="create_quote_btn">
                  <a href="{{route('without_quote.add_bill')}}">Client Non-Existant</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--menu section start-->
</div>

</body>
</html>
