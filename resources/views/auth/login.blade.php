<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Phase 1</title>
  @include('frontend.common.head');
</head>
<body>
<div class="wrapper" role="main">
    <!--login section start-->
    <div class="login_main">
        <div class="login_auto">
            <div class="contact_inner">
                <div class="main_logo">
                    <a href="{{url('/')}}"><img src="{{asset('frontend_assets/images/logo.png')}}" alt="#"></a>
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
                                    <input type="password" name="" placeholder="Password">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact_formFeild_out">
                                <div class="contact_form_forgot">
                                    <a href="javascript:void(0);">Forgot Password?</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="contact_form_submit clearfix">
                                <input type="submit" name="" value="Login">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--login section start-->
</div>

</body>
</html>
