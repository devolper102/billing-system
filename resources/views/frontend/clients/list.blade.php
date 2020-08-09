@include('frontend.common.head')

@php
      $addQuoteCls = '';
      $showAddButton = 'block';

      if(request()->segment(count(request()->segments())) === 'bill'){
              $addQuoteCls = 'newquote_main';
      }elseif (request()->segment(count(request()->segments())) == 'delete' &&  $type == 'delete'){
               $showAddButton = 'none';
      }
      elseif(request()->segment(count(request()->segments())) === 'folder'){
              $addQuoteCls = 'newquote_main';
              $showAddButton = 'none';
      }
@endphp
<div class="wrapper" role="main">
  <!--client list section start-->
  <div class="menu_main profile_main client_list_main textSet_main {{$addQuoteCls}}">
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
        <div class="main_logo_outer">
          @include('frontend.common.header_logo')
        </div>
        <div class="menu_detail">
          <div class="client_search">
            <input type="search" data-type="{{request()->segment(count(request()->segments()))}}" placeholder="Recherche Client" class="client_srch_field">
            <input type="submit" class="search_client_btn">
          </div>
          <div class="listing_popuop delete_confirm_popup_box" style="display: none" >
            <div class="listing_pop_table">
              <div class="listing_pop_tableCell">
                <div class="listing_pop_inner">
                  <div class="menu_box_table">
                    <div class="profile_box_tableCell width55">
                      <div class="listing_pop_text">
                        <p>Etes vous sur de vouloir supprimer <b id="del_client_name">Choupay Pierrot?</b></p>
                      </div>
                    </div>
                    <div class="profile_box_tableCell">
                      <div class="listing_pop_btns">
                        <ul>
                          <li><a href="javascript:void(0)" class="cancel_del_button">Annuler</a></li>
                          <li><a href="javascript:void(0)" class="confirm_del_btn">Oui</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="profile_list " id="client_list_section">
            @include('frontend.clients.client_listing')
          </div>

              <ul style="display: {{$showAddButton}}">
                <li>
                  <div class="add_client_btn add_new_client_button">
                    <a href="{{route('client.create')}}">Ajouter Nouveau Client</a>
                  </div>
                </li>
              </ul>


        </div>
      </div>
    </div>
  </div>
  <!--client list section end-->
</div>

</body>
</html>
