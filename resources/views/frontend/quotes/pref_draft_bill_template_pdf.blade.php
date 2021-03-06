@include('frontend.common.head')
@php


    $currentDate = strtotime('+2 weeks');
    $nextTwoWeeksDate =  date('d/m/Y', $currentDate);

 @endphp
<div class="wrapper" role="main">
    <div class="pdf_main">
        <table width="700" border="0" cellpadding="0" cellspacing="0" style="margin: auto;">
            <tbody>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <a style="max-width: 150px; margin: auto; display: block;" href="javascript:void(0);"><img style="display: block; margin: auto;" src="{{getSettingImage('logo')}}" alt="#"></a>
                            </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom: 1px solid #000;border-top: 1px solid #000;">
                        <tr><td height="20"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style=" table-layout: fixed;">
                                    <tr>
                                        <td style="padding: 0px 20px 0px 0px; margin: 0px;">

                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">{{$client['last_name']}}  {{$client['first_name']}} </p>
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;"> {{$client['street_number']}} {{$client['street']}}  </p>
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;"> {{$client['municipality']}} </p>
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;" >{{$client['tva_number']}} </p>
                                        </td>
                                        <td style="padding: 0px 20px 0px 0px; margin: 0px;"> </td>
                                        <td style="padding: 0px 0px 0px 0px; margin: 0px;"> </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                    Facture No. <b style="font-weight: bold;">{{$quote_number}}</b>
                                </p>
                            </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                    {{$user->postal_code}}  {{$user->municipality}} , le {{date('d/m/Y')}}
                                </p>
                            </td>
                        </tr>
                        <tr><td height="10"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000;">
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                    <tr>
                                        <td width="15%" style="padding: 10px;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Quantite
                                            </strong>
                                        </td>
                                        <td width="50%" style="padding: 10px; border-left: 1px solid #000;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Description
                                            </strong>
                                        </td>
                                        <td width="20%" style="padding: 10px; border-left: 1px solid #000;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Prix Unitaire
                                            </strong>
                                        </td>
                                        <td width="15%" style="padding: 10px; border-left: 1px solid #000;">
                                            <strong style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;display: block; font-weight: bold;">
                                                Total
                                            </strong>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>

                        @if(count($quotes) > 0)
                            @foreach($quotes as $qoute)

                            <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                    <tr>
                                        <td width="15%" style="padding: 10px;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{$qoute['quantity']}}
                                            </p>
                                        </td>
                                        <td width="50%" style="padding: 10px; border-left: 1px solid #000;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{$qoute['description']}}
                                            </p>
                                        </td>
                                        <td width="20%" style="padding: 10px; border-left: 1px solid #000;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{$qoute['unit_price']}}
                                            </p>
                                        </td>
                                        <td width="15%" style="padding: 10px; border-left: 1px solid #000;">
                                            <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: center;">
                                                {{number_format((float)$qoute['total'], 2)}}
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>


                            @endforeach
                        @endif

                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom: 1px solid #000;">
                        <tr><td height="40"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border:1px solid #000;max-width: 300px; margin: auto;">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                                <tr>
                                                    <td width="70%" style="padding: 5px 10px;border-right:1px solid #000;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            Total
                                                        </p>
                                                    </td>
                                                    <td width="30%" style="padding: 5px 10px;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$total}} €
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px solid #000;">
                                                <tr>
                                                    <td width="70%" style="padding: 5px 10px;border-right:1px solid #000;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            TVA - 6 %
                                                        </p>
                                                    </td>
                                                    <td width="30%" style="padding: 5px 10px;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$tva_val}} €
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" style="">
                                                <tr>
                                                    <td width="70%" style="padding: 5px 10px;border-right:1px solid #000;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            Montant Total
                                                        </p>
                                                    </td>
                                                    <td width="30%" style="padding: 5px 10px;">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$amount}} €
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="40"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td width="50%" valign="top">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                        </p>
                                                    </td>
                                                    <td width="50%" valign="top">
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$user->name}}
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$user->steet_number}}  {{$user->street}}
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$user->municipality}}
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial; text-align: right;">
                                                            {{$user->tva_number}}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr><td height="10"></td></tr>
                        <tr>
                            <td>
                                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td>
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                <tr>
                                                    <td>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            Merci de verser le montant de {{$amount}} euros avant le {{$nextTwoWeeksDate}} sur le compte suivant :
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            IBAN : {{$user->bank_account}}
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            BIC : {{$user->bic}}
                                                        </p>
                                                        <p style="padding: 0px; margin: 0px; font-size: 16px; line-height: 1.5em; color: #000;font-family: arial;">
                                                            Merci de bien vouloir mentionnez la reference : <b style="font-weight: bold;">{{$quote_number}}</b>
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr><td height="20"></td></tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
