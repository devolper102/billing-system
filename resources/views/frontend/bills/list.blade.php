@include('frontend.common.head')
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main profile_main client_list_main textSet_main newquote_main ">
    <div class="menu_auto">
      <div class="menu_inner">
        <div class="home_header clearfix">
          <div class="home_header_left">

          </div>
          <div class="home_header_right">
            <div class="home_header_menu">
              <ul>
                <li><a class="all_buttons" href="{{route('menu')}}">Menu</a>
                  <span>Espace Client</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="main_logo_outer stats_sec">
        @include('frontend.common.header_logo')
        <div class="nextPrev_btns">
          <a style="display: block !important;" class="prev_btn" href="{{route('tech.unpaid_bill')}}"></a>
        </div>
        </div>
        <div class="dashboard_inner">
          <div class="client_search">
            <input type="search" class="bill_srch_field" placeholder="Recherche Numero de Facture / Nom de Client / Concerne">
            <input type="submit">
          </div>


          <div id="bill_list_section">
            @include('frontend.bills.bill_listing')
          </div>

        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
