@extends('front.layout.default')
@section('meta_nofollow')
<meta name="robots" content="noindex, nofollow">
<meta name="googlebot" content="noindex, nofollow">
@stop

@section('checkout_script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    <?php $price = round($price);?>
    var options = {
        "key_id": "rzp_live_hWdT6pCr54kTz3",
        "amount": "{{$price}}}",
        "currency": "USD",
        "name": "Astute Analytica",
        "description": "Report purchase by Astutean Alytica",
        "image": "https://www.astuteanalytica.com/public/front/images/logo/logo-2.png",
        "order_id": "{{$order_id}}", 
        "handler": function(response) {
            $('#razorpay_payment_id').val(response.razorpay_payment_id);
            $('#razorpay_signature').val(response.razorpay_signature);
             $('#form_submit_Now').submit();   
        },
        
        "theme": {
            "color": "#C30C17"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function(response) {
        alert(response.error.reason);
        alert('Payment Failed');
       
    });


    function openFormNow() {
        var paymentMethod = $('input[name="payment_type"]:checked').val();
        var name=$('#name').val();
        if(name == "")
        {
            $('#textalert').html('Please fill Name *');
            $('#name').focus();
            return false;
        }
        var email=$('#email').val();
        if(email == "")
        {
            $('#textalert').html('Please fill Coporate Email *');
            $('#email').focus();
            return false;
        }
        var company=$('#company').val();
        if(company == "")
        {
            $('#textalert').html('Please fill Coporate Company *');
            $('#company').focus();
            return false;
        }
        var job_title=$('#job_title').val();
        if(job_title == "")
        {
            $('#textalert').html('Please fill Coporate Job Title *');
            $('#job_title').focus();
            return false;
        }
        var country=$('#country option:selected').val();
        if(country == "")
        {
            $('#textalert').html('Please choose Country *');
            $('#country').focus();
            return false;
        }
        var contact=$('#phone').val();
        if(contact == "")
        {
            $('#textalert').html('Please choose contact *');
            $('#phone').focus();
            return false;
        }
        var billing_address=$('#billing_address').val();
        if(billing_address == "")
        {
            $('#textalert').html('Please choose Billing Address *');
            $('#billing_address').focus();
            return false;
        }

        if(paymentMethod == 'razorpay')
        {
            rzp1.open();
            e.preventDefault();
        }
        else
        {
            $('#form_submit_Now').submit();   
        }
        return false;
    }
</script>
@stop

@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/checkout.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/checkout.css') }}"></noscript>


@foreach($reportData as $data)
<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-title-heading">
                    <?php
                        $title = $data->report_title;
                        echo $title;
                    ?></h1>
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li><i class="fas fa-angle-right"></i></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endforeach
<section id="service" class="services services-page service-inner pt-120 pb-80">
    <form action="{{url('paymentNow')}}" method="post" id="form_submit_Now"> 
        @csrf
        <!--========== My Services Info ==========-->
        <div class="container">


            <div class="row">

                <div class="col-lg-6">
                    <h2 class="main-heading inner-heading">BILLING DETAILS</h2>
                    <div class="form checkout-form">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="" class="text-danger mb-2 font-weight-bold">
                                   <b><h6 id="textalert"></h6></b> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Name* " id="name" required>
                                </div>
                            </div>
                            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                            <input type="hidden" name="razorpay_signature"  id="razorpay_signature" >
                            <input type="hidden" name="order_number" value="{{$order_id}}">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="email" name="email" placeholder="Coporate Email*" required>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="company" name="company" placeholder="Company" required>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="job_title" name="job_title" placeholder="Job Title" required>
                                </div>

                            </div>

                            <div class="col-sm-12">
                                <div class="form-group">
                                    <select id="country" name="country" required>
                                         <option value="" disabled selected hidden>Select country *</option>
                                        <option value="Afghanistan - 93">Afghanistan (<strong>+93)</option>
                                                <option value="Albania - 355">Albania (<strong>+355)</option>
                                                <option value="Algeria - 213">Algeria (<strong>+213)</option>
                                                <option value="Andorra - 376">Andorra (<strong>+376)</option>
                                                <option value="Angola - 244">Angola (<strong>+244)</option>
                                                <option value="Anguilla - 1264">Anguilla (<strong>+1264)</option>
                                                <option value="Antarctica - 0">Antarctica (<strong>+0)</option>
                                                <option value="Antigua and Barbuda - 1268">Antigua and Barbuda (<strong>+1268)</option>
                                                <option value="Argentina - 54">Argentina (<strong>+54)</option>
                                                <option value="Armenia - 374">Armenia (<strong>+374)</option>
                                                <option value="Aruba - 297">Aruba (<strong>+297)</option>
                                                <option value="Australia - 61">Australia (<strong>+61)</option>
                                                <option value="Austria - 43">Austria (<strong>+43)</option>
                                                <option value="Azerbaijan - 994">Azerbaijan (<strong>+994)</option>
                                                <option value="Bahamas, The - 1242">Bahamas, The (<strong>+1242)</option>
                                                <option value="Bahrain - 973">Bahrain (<strong>+973)</option>
                                                <option value="Bangladesh - 880">Bangladesh (<strong>+880)</option>
                                                <option value="Barbados - 1246">Barbados (<strong>+1246)</option>
                                                <option value="Belarus - 375">Belarus (<strong>+375)</option>
                                                <option value="Belgium - 32">Belgium (<strong>+32)</option>
                                                <option value="Belize - 501">Belize (<strong>+501)</option>
                                                <option value="Benin - 229">Benin (<strong>+229)</option>
                                                <option value="Bermuda - 1441">Bermuda (<strong>+1441)</option>
                                                <option value="Bhutan - 975">Bhutan (<strong>+975)</option>
                                                <option value="Bolivia - 591">Bolivia (<strong>+591)</option>
                                                <option value="Bosnia and Herzegovina - 387">Bosnia and Herzegovina (<strong>+387)</option>
                                                <option value="Botswana - 267">Botswana (<strong>+267)</option>
                                                <option value="Brazil - 55">Brazil (<strong>+55)</option>
                                                <option value="British Indian Ocean Territory - 246">British Indian Ocean Territory (<strong>+246)</option>
                                                <option value="Brunei - 673">Brunei (<strong>+673)</option>
                                                <option value="Bulgaria - 359">Bulgaria (<strong>+359)</option>
                                                <option value="Burkina Faso - 226">Burkina Faso (<strong>+226)</option>
                                                <option value="Burundi - 257">Burundi (<strong>+257)</option>
                                                <option value="Cambodia - 855">Cambodia (<strong>+855)</option>
                                                <option value="Cameroon - 237">Cameroon (<strong>+237)</option>
                                                <option value="Canada - 01">Canada (<strong>+01)</option>
                                                <option value="Cape Verde - 238">Cape Verde (<strong>+238)</option>
                                                <option value="Central African Republic - 236">Central African Republic (<strong>+236)</option>
                                                <option value="Chad - 235">Chad (<strong>+235)</option>
                                                <option value="Chile - 56">Chile (<strong>+56)</option>
                                                <option value="China - 86">China (<strong>+86)</option>
                                                <option value="Cocos (Keeling) Islands - 672">Cocos (Keeling) Islands (<strong>+672)</option>
                                                <option value="Colombia - 57">Colombia (<strong>+57)</option>
                                                <option value="Comoros - 269">Comoros (<strong>+269)</option>
                                                <option value="Congo - the Democratic Republic of the - 242">Congo - the Democratic Republic of the (<strong>+242)</option>
                                                <option value="Congo, Republic of the - 242">Congo, Republic of the (<strong>+242)</option>
                                                <option value="Costa Rica - 506">Costa Rica (<strong>+506)</option>
                                                <option value="Cote d'Ivoire - 225">Cote d'Ivoire (<strong>+225)</option>
                                                <option value="Croatia - 385">Croatia (<strong>+385)</option>
                                                <option value="Cuba - 53">Cuba (<strong>+53)</option>
                                                <option value="Curacao - 599">Curacao (<strong>+599)</option>
                                                <option value="Cyprus - 357">Cyprus (<strong>+357)</option>
                                                <option value="Czech Republic - 420">Czech Republic (<strong>+420)</option>
                                                <option value="Denmark - 45">Denmark (<strong>+45)</option>
                                                <option value="Djibouti - 253">Djibouti (<strong>+253)</option>
                                                <option value="Dominica - 1767">Dominica (<strong>+1767)</option>
                                                <option value="Dominican Republic - 1809">Dominican Republic (<strong>+1809)</option>
                                                <option value="Ecuador - 593">Ecuador (<strong>+593)</option>
                                                <option value="Egypt - 20">Egypt (<strong>+20)</option>
                                                <option value="El Salvador - 503">El Salvador (<strong>+503)</option>
                                                <option value="Equatorial Guinea - 240">Equatorial Guinea (<strong>+240)</option>
                                                <option value="Eritrea - 291">Eritrea (<strong>+291)</option>
                                                <option value="Estonia - 372">Estonia (<strong>+372)</option>
                                                <option value="Ethiopia - 251">Ethiopia (<strong>+251)</option>
                                                <option value="Falkland Islands (Malvinas) - 500">Falkland Islands (Malvinas) (<strong>+500)</option>
                                                <option value="Fiji - 679">Fiji (<strong>+679)</option>
                                                <option value="Finland - 358">Finland (<strong>+358)</option>
                                                <option value="France - 33">France (<strong>+33)</option>
                                                <option value="Gabon - 241">Gabon (<strong>+241)</option>
                                                <option value="Gambia - 220">Gambia (<strong>+220)</option>
                                                <option value="Georgia - 995">Georgia (<strong>+995)</option>
                                                <option value="Germany - 49">Germany (<strong>+49)</option>
                                                <option value="Ghana - 233">Ghana (<strong>+233)</option>
                                                <option value="Greece - 30">Greece (<strong>+30)</option>
                                                <option value="Greenland - 299">Greenland (<strong>+299)</option>
                                                <option value="Grenada - 1473">Grenada (<strong>+1473)</option>
                                                <option value="Guatemala - 502">Guatemala (<strong>+502)</option>
                                                <option value="Guinea-Bissau - 245">Guinea-Bissau (<strong>+245)</option>
                                                <option value="Guyana - 592">Guyana (<strong>+592)</option>
                                                <option value="Haiti - 509">Haiti (<strong>+509)</option>
                                                <option value="Heard Island and McDonald Islands - 0">Heard Island and McDonald Islands (<strong>+0)</option>
                                                <option value="Holy See (Vatican City State) - 379">Holy See (Vatican City State) (<strong>+379)</option>
                                                <option value="Honduras - 504">Honduras (<strong>+504)</option>
                                                <option value="Hong Kong - 852">Hong Kong (<strong>+852)</option>
                                                <option value="Hungary - 36">Hungary (<strong>+36)</option>
                                                <option value="Iceland - 354">Iceland (<strong>+354)</option>
                                                <option value="India - 91">India (<strong>+91)</option>
                                                <option value="Indonesia - 62">Indonesia (<strong>+62)</option>
                                                <option value="Iran - Islamic Republic of - 98">Iran - Islamic Republic of (<strong>+98)</option>
                                                <option value="Iraq - 964">Iraq (<strong>+964)</option>
                                                <option value="Ireland - 353">Ireland (<strong>+353)</option>
                                                <option value="Israel - 972">Israel (<strong>+972)</option>
                                                <option value="Italy - 39">Italy (<strong>+39)</option>
                                                <option value="Jamaica - 1876">Jamaica (<strong>+1876)</option>
                                                <option value="Japan - 81">Japan (<strong>+81)</option>
                                                <option value="Jordan - 962">Jordan (<strong>+962)</option>
                                                <option value="Kazakhstan - 7">Kazakhstan (<strong>+7)</option>
                                                <option value="Kenya - 254">Kenya (<strong>+254)</option>
                                                <option value="Kiribati - 686">Kiribati (<strong>+686)</option>
                                                <option value="Korea, North - 850">Korea, North (<strong>+850)</option>
                                                <option value="Korea, South - 82">Korea, South (<strong>+82)</option>
                                                <option value="Kuwait - 965">Kuwait (<strong>+965)</option>
                                                <option value="Kyrgyzstan - 996">Kyrgyzstan (<strong>+996)</option>
                                                <option value="Laos - 856">Laos (<strong>+856)</option>
                                                <option value="Latvia - 371">Latvia (<strong>+371)</option>
                                                <option value="Lebanon - 961">Lebanon (<strong>+961)</option>
                                                <option value="Lesotho - 266">Lesotho (<strong>+266)</option>
                                                <option value="Liberia - 231">Liberia (<strong>+231)</option>
                                                <option value="Libya - 218">Libya (<strong>+218)</option>
                                                <option value="Liechtenstein - 423">Liechtenstein (<strong>+423)</option>
                                                <option value="Lithuania - 370">Lithuania (<strong>+370)</option>
                                                <option value="Luxembourg - 352">Luxembourg (<strong>+352)</option>
                                                <option value="Macau - 853">Macau (<strong>+853)</option>
                                                <option value="Macedonia - 389">Macedonia (<strong>+389)</option>
                                                <option value="Madagascar - 261">Madagascar (<strong>+261)</option>
                                                <option value="Malawi - 265">Malawi (<strong>+265)</option>
                                                <option value="Malaysia - 60">Malaysia (<strong>+60)</option>
                                                <option value="Maldives - 960">Maldives (<strong>+960)</option>
                                                <option value="Mali - 223">Mali (<strong>+223)</option>
                                                <option value="Malta - 356">Malta (<strong>+356)</option>
                                                <option value="Marshall Islands - 692">Marshall Islands (<strong>+692)</option>
                                                <option value="Mauritania - 222">Mauritania (<strong>+222)</option>
                                                <option value="Mauritius - 230">Mauritius (<strong>+230)</option>
                                                <option value="Mexico - 52">Mexico (<strong>+52)</option>
                                                <option value="Moldova - 373">Moldova (<strong>+373)</option>
                                                <option value="Monaco - 377">Monaco (<strong>+377)</option>
                                                <option value="Mongolia - 976">Mongolia (<strong>+976)</option>
                                                <option value="Montenegro - 382">Montenegro (<strong>+382)</option>
                                                <option value="Morocco - 212">Morocco (<strong>+212)</option>
                                                <option value="Mozambique - 258">Mozambique (<strong>+258)</option>
                                                <option value="Myanmar - 95">Myanmar (<strong>+95)</option>
                                                <option value="N Guinea - 224">N Guinea (<strong>+224)</option>
                                                <option value="Namibia - 264">Namibia (<strong>+264)</option>
                                                <option value="Nauru - 674">Nauru (<strong>+674)</option>
                                                <option value="Nepal - 977">Nepal (<strong>+977)</option>
                                                <option value="Netherlands - 31">Netherlands (<strong>+31)</option>
                                                <option value="Netherlands Antilles - 599">Netherlands Antilles (<strong>+599)</option>
                                                <option value="New Zealand - 64">New Zealand (<strong>+64)</option>
                                                <option value="Nicaragua - 505">Nicaragua (<strong>+505)</option>
                                                <option value="Niger - 227">Niger (<strong>+227)</option>
                                                <option value="Nigeria - 234">Nigeria (<strong>+234)</option>
                                                <option value="Northern Mariana Islands - 1670">Northern Mariana Islands (<strong>+1670)</option>
                                                <option value="Norway - 47">Norway (<strong>+47)</option>
                                                <option value="Oman - 968">Oman (<strong>+968)</option>
                                                <option value="Pakistan - 92">Pakistan (<strong>+92)</option>
                                                <option value="Palau - 680">Palau (<strong>+680)</option>
                                                <option value="Palestinian Territories - 970">Palestinian Territories (<strong>+970)</option>
                                                <option value="Panama - 507">Panama (<strong>+507)</option>
                                                <option value="Papua New Guinea  - 675">Papua New Guinea (<strong>+675)</option>
                                                <option value="Paraguay - 595">Paraguay (<strong>+595)</option>
                                                <option value="Peru - 51">Peru (<strong>+51)</option>
                                                <option value="Philippines - 63">Philippines (<strong>+63)</option>
                                                <option value="Poland - 48">Poland (<strong>+48)</option>
                                                <option value="Portugal - 351">Portugal (<strong>+351)</option>
                                                <option value="Qatar - 974">Qatar (<strong>+974)</option>
                                                <option value="Romania - 40">Romania (<strong>+40)</option>
                                                <option value="Russia - 70">Russia (<strong>+70)</option>
                                                <option value="Rwanda - 250">Rwanda (<strong>+250)</option>
                                                <option value="Saint Kitts and Nevis - 1869">Saint Kitts and Nevis (<strong>+1869)</option>
                                                <option value="Saint Lucia - 1758">Saint Lucia (<strong>+1758)</option>
                                                <option value="Saint Vincent and the Grenadines - 1784">Saint Vincent and the Grenadines (<strong>+1784)</option>
                                                <option value="Samoa - 684">Samoa (<strong>+684)</option>
                                                <option value="San Marino - 378">San Marino (<strong>+378)</option>
                                                <option value="Sao Tome and Principe - 239">Sao Tome and Principe (<strong>+239)</option>
                                                <option value="Saudi Arabia - 966">Saudi Arabia (<strong>+966)</option>
                                                <option value="Senegal - 221">Senegal (<strong>+221)</option>
                                                <option value="Serbia - 381">Serbia (<strong>+381)</option>
                                                <option value="Seychelles - 248">Seychelles (<strong>+248)</option>
                                                <option value="Sierra Leone - 232">Sierra Leone (<strong>+232)</option>
                                                <option value="Singapore - 65">Singapore (<strong>+65)</option>
                                                <option value="Slovakia - 421">Slovakia (<strong>+421)</option>
                                                <option value="Slovenia - 386">Slovenia (<strong>+386)</option>
                                                <option value="Solomon Islands - 677">Solomon Islands (<strong>+677)</option>
                                                <option value="Somalia - 252">Somalia (<strong>+252)</option>
                                                <option value="South Africa - 27">South Africa (<strong>+27)</option>
                                                <option value="Spain - 34">Spain (<strong>+34)</option>
                                                <option value="Sri Lanka - 94">Sri Lanka (<strong>+94)</option>
                                                <option value="Sudan - 249">Sudan (<strong>+249)</option>
                                                <option value="Suriname - 597">Suriname (<strong>+597)</option>
                                                <option value="Swaziland - 268">Swaziland (<strong>+268)</option>
                                                <option value="Sweden - 46">Sweden (<strong>+46)</option>
                                                <option value="Switzerland - 41">Switzerland (<strong>+41)</option>
                                                
                                                <option value="Syria - 963">Syria (<strong>+963)</option>
                                                <option value="Taiwan - 886">Taiwan (<strong>+886)</option>
                                                <option value="Tajikistan - 992">Tajikistan (<strong>+992)</option>
                                                <option value="Tanzania - 255">Tanzania (<strong>+255)</option>
                                                <option value="Thailand - 66">Thailand (<strong>+66)</option>
                                                <option value="Timor-Leste - 670">Timor-Leste (<strong>+670)</option>
                                                <option value="Togo - 228">Togo (<strong>+228)</option>
                                                <option value="Tonga -676">Tonga (<strong>+676)</option>
                                                <option value="Trinidad and Tobago - 1868">Trinidad and Tobago (<strong>+1868)</option>
                                                <option value="Tunisia - 216">Tunisia (<strong>+216)</option>
                                                <option value="90">Turkey (<strong>+90)</option>
                                                <option value="Turkey - 7370">Turkmenistan (<strong>+7370)</option>
                                                <option value="Tuvalu - 688">Tuvalu (<strong>+688)</option>
                                                <option value="Uganda - 256">Uganda (<strong>+256)</option>
                                                <option value="Ukraine - 380">Ukraine (<strong>+380)</option>
                                                <option value="United Arab Emirates - 971">United Arab Emirates (<strong>+971)</option>
                                                <option value="United Kingdom - 44">United Kingdom (<strong>+44)</option>
                                                <option value="United States - 1">United States (<strong>+1)</option>
                                                <option value="Uruguay - 598">Uruguay (<strong>+598)</option>
                                                <option value="Uzbekistan - 998">Uzbekistan (<strong>+998)</option>
                                                <option value="Vanuatu - 678">Vanuatu (<strong>+678)</option>
                                                <option value="Venezuela - 58">Venezuela (<strong>+58)</option>
                                                <option value="Vietnam - 84">Vietnam (<strong>+84)</option>
                                                <option value="Virgin Islands - U.S. - 1340">Virgin Islands - U.S. (<strong>+1340)</option>
                                                <option value="Virgin Islands - British - 1284">Virgin Islands - British (<strong>+1284)</option>
                                                <option value="Wallis and Futuna - 681">Wallis and Futuna (<strong>+681)</option>
                                                <option value="Western Sahara  - 212">Western Sahara (<strong>+212)</option>
                                                <option value="Yemen - 967">Yemen (<strong>+967)</option>
                                                <option value="Zambia - 260">Zambia (<strong>+260)</option>
                                                <option value="Zimbabwe - 263">Zimbabwe (<strong>+263)</option>
                                    </select>

                                </div>
                            </div>

                           
                            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="text" id="phone" name="phone" placeholder="Contact" required>
                                </div>

                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <textarea type="text" id="billing_address" name="billing_address" placeholder="Billing address" required></textarea>
                                </div>

                            </div>


                        </div>
                    </div>

                </div>
                <div class="col-lg-6 information-entry">

                    @foreach($reportData as $data)
                    
                    <h2 class="main-heading inner-heading">REPORT SHOPPING CART</h2>
                    
                    <div class="cart-summary-box">
                         <h5>{{$data->report_title}}</h5>
                        <div class="information-blocks mt-4">
                            <div class="">
                                <table class="cart-table">
                                    <tbody>
                                        <tr>
                                            <th class="column-1">Report ID</th>
                                            <th class="column-3">License Type</th>
                                            <th class="column-2">Price</th>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="traditional-cart-entry">
                                                    <div class="content">
                                                        <div class="cell-view">
                                                            {{$data->report_id}}

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                @if($license_type == "single_user_selling")
                                                <?php $amount = round($data->single_user_selling);?>
                                                SINGLE USER LICENSE
                                                @elseif($license_type == "multi_user_selling")
                                                <?php $amount = round($data->multi_user_selling);?>
                                                MULTI USER LICENSE
                                                @else
                                                <?php $amount = round($data->corporate_user_selling);?>
                                                CORPORATE USER LICENSE
                                                @endif
                                            </td>
                                            <td>
                                               {{$amount}}
                                            </td>
                                        <tr>
                                            <th scope="row">Total</th>
                                            <td colspan="2"> $ <span class="lice_price">{{$amount}}</span></td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="report_id" value="{{Crypt::encryptString($data->report_id)}}">
                    <input type="hidden" name="all_report_id" value="{{Crypt::encryptString($data->all_reports_id )}}">
                    <input type="hidden" name="amount" value="{{Crypt::encryptString($amount)}}">
                    <input type="hidden" name="amount_type" value="{{Crypt::encryptString($license_type)}}">

                    <h2 class="main-heading inner-heading">PAYMENT</h2>
                    <div class="cart-summary-box">
                       <div class="d-inline-block  float-left">
                        <div class="custom-control  d-inline-block custom-radio mb-20">
                            <input type="radio" class="custom-control-input" value="paypal" checked name="payment_type" id="customCheck1">
                            <label class="custom-control-label" for="customCheck1"> <img src="{{url('public/front/images/paypal.png')}}" alt="paypal"></label>
                        </div> &nbsp; &nbsp;
                        <div class="custom-control  d-inline-block custom-radio mb-20">
                            <input type="radio" class="custom-control-input" value="razorpay" name="payment_type" id="customCheck2">
                            <label class="custom-control-label" for="customCheck2"> <img src="{{url('public/front/images/razorpay.png')}}" alt="Razor pay" width="120px"></label>                        </div>

                          
                        <br>
                        <!-- Button two -->
                        <button type="button" onclick="openFormNow()" class="main-btn-two mt-4" style="border: 0;">
                            <div class="text-btn">
                                <span class="text-btn-one">Buy Now</span>
                                <span class="text-btn-two">Buy Now</span>
                            </div>
                            <div class="arrow-btn">
                                <span class="arrow-one"><i class="fa fa-shopping-cart"></i></span>
                                <span class="arrow-two"><i class="fa fa-shopping-cart"></i></span>
                            </div>
                        </button>
                    </div>
                    

                          <div class="custom-control d-inline-block custom-radio ">
                            
                            <img src="{{url('public/front/images/payment-mode.png')}}" alt="Payment Mode" width="200px">        
                                           </div>
                    
                    </div>

                             
                    @endforeach
                </div>
            </div>
        </div>
    </form>
</section>


@stop
