@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--menu section start-->
  <div class="menu_main client_detail_main">
    <div class="menu_auto">
      <div class="menu_inner">
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a></li>
              </ul>
            </div>
          </div>
        </div>
        @include('frontend.common.header_logo')
        <div class="menu_detail">
          <div class="menu_list">
            <ul>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Creer un Client</strong>
                        <i><img src="{{asset('frontend_assets/images/person_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('client.create')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Editer un Client</strong>
                        <i><img src="{{asset('frontend_assets/images/towArrow_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('client.list')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Afficher un Client</strong>
                        <i><img src="{{asset('frontend_assets/images/lcd_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('client.show')}}"></a>
                </div>
              </li>
              <li>
                <div class="menu_box">
                  <div class="menu_box_table">
                    <div class="menu_box_tableCell">
                      <div class="menu_box_text">
                        <strong>Supprimer un Client</strong>
                        <i><img src="{{asset('frontend_assets/images/del_icon.png')}}" alt="#"></i>
                      </div>
                    </div>
                  </div>
                  <a href="{{route('client.delete')}}"></a>
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
