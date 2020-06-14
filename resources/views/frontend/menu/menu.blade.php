<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<title>Phase 1</title>

  @include('frontend.common.head')
</head>
<body>
<div class="wrapper" role="main">
    <!--menu section start-->
    <div class="menu_main">
      <div class="menu_auto">
        <div class="menu_inner">
          <div class="home_header clearfix">
            <div class="home_header_left">
              
            </div>
            <div class="home_header_right">
              <div class="home_header_menu">
                <ul>
                  <li><a class="all_buttons" href="{{route('profile')}}">Profile</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="main_logo">
           <a href="{{url('/')}}"><img src="{{asset('frontend_assets/images/logo.png')}}" alt="#"></a>
          </div>
          <div class="menu_detail">
            <div class="menu_list">
              <ul>
                <li>
                  <div class="menu_box">
                    <div class="menu_box_table">
                      <div class="menu_box_tableCell">
                        <div class="menu_box_text">
                          <strong>Espace Client <span>(Facture et Devis)</span></strong>
                          <i><img src="{{asset('frontend_assets/images/facture_icon.png')}}" alt="#"></i>
                        </div>
                      </div>
                    </div>
                    <a href="javascript:void(0);"></a>
                  </div>
                </li>
                <li>
                  <div class="menu_box">
                    <div class="menu_box_table">
                      <div class="menu_box_tableCell">
                        <div class="menu_box_text">
                          <strong>Espace Technique <span>(Analyse)</span></strong>
                          <i><img src="{{asset('frontend_assets/images/analyse_icon.png')}}" alt="#"></i>
                        </div>
                      </div>
                    </div>
                    <a href="javascript:void(0);"></a>
                  </div>
                </li>
                <li>
                  <div class="menu_box">
                    <div class="menu_box_table">
                      <div class="menu_box_tableCell">
                        <div class="menu_box_text">
                          <strong>Espace Historique <span>(Dossier)</span></strong>
                          <i><img src="{{asset('frontend_assets/images/folder_icon.png')}}" alt="#"></i>
                        </div>
                      </div>
                    </div>
                    <a href="javascript:void(0);"></a>
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
