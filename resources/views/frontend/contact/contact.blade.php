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
    <!--contact section start-->
    <div class="contact_main">
      <div class="contact_auto">
        <div class="contact_inner">
          <div class="home_header clearfix">
            <div class="home_header_left">
              
            </div>
            <div class="home_header_right">
              <div class="home_header_menu">
                <ul>
                  <li><a class="all_buttons active" href="javascript:void(0);">Contact</a></li>
                  <li><a class="all_buttons" href="{{route('menu')}}">Menu</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="contact_form">
            <ul>
              <li>
                <div class="contact_formFeild_out">
                  <div class="contact_form_feild">
                    <input type="email" name="" placeholder="Email Address">
                  </div>
                </div>
              </li>
              <li>
                <div class="contact_formFeild_out">
                  <div class="contact_form_feild">
                    <input type="text" name="" placeholder="Subjet">
                  </div>
                </div>
              </li>
              <li>
                <div class="contact_formFeild_out">
                  <div class="contact_form_feild">
                    <textarea placeholder="Votre Message"></textarea>
                  </div>
                </div>
              </li>
              <li>
                <div class="contact_form_submit clearfix">
                  <input type="submit" name="" value="Envoyer">
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  <!--contact section start-->
</div>

</body>
</html>
