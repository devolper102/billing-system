<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>Phase 1</title>

  @include('frontend.common.head')

</head>
<body>
<script>
  var app_url = '{{url('/')}}'
</script>
<div class="wrapper" role="main">
    <!--profile section start-->
    <div class="menu_main profile_main">
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
          <div class="main_logo">
           <a href="{{url('/')}}"><img src="{{asset('frontend_assets/images/logo.png')}}" alt="#"></a>
          </div>
          <div class="menu_detail">
            <div class="profile_list">
              <input type="hidden" name="user_id" value="{{$user->id}}">
              <ul>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Nom:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->name}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->name}}" name="name">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn"  data-id="{{$user->id}}" data-name="{{$user->name}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="name" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Address:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->address}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <textarea name="address">{{$user->address}}</textarea>
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->name}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="address" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Numero de Telephone:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->phone_number}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->phone_number}}" name="phone_number">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->name}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn"  data-type="phone_number" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Compte Bancaire:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->bank_account}}</p>
                          {{--<p>BIC: BBEUBECB</p>--}}
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->bank_account}}" name="bank_account">
                                </div>
                              </div>
                            </li>
                           {{-- <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text">
                                </div>
                              </div>
                            </li>--}}
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->bank_account}}" href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="bank_account" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="profile_box">
                    <div class="menu_box_table">
                      <div class="profile_box_tableCell width40">
                        <div class="profile_box_text">
                          <strong>Numero de TVA:</strong>
                        </div>
                      </div>
                      <div class="profile_box_tableCell width50">
                        <div class="profile_box_text profile_afterEdit">
                          <p>{{$user->tva_number}}</p>
                        </div>
                        <div class="profile_edit">
                          <ul>
                            <li>
                              <div class="profile_edit_feildOut">
                                <div class="profile_edit_feild">
                                  <input type="text" value="{{$user->tva_number}}" name="tva_number">
                                </div>
                              </div>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="profile_box_tableCell">
                        <div class="profile_box_text">
                          <a class="profile_edit_btn" data-id="{{$user->id}}" data-name="{{$user->bank_account}}"  href="javascript:void(0)">Edit</a>
                          <input class="profile_save_btn" data-type="tva_number" type="submit" value="Save">
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--profile section start-->
</div>

</body>
</html>
