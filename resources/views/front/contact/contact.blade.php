@extends('front.layout.default')
@section('content')
<link rel="preload" href="{{ URL::asset('public/front/css/contact.css') }}" as="style" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="{{ URL::asset('public/front/css/contact.css') }}"></noscript>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<section id="page" class="header-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <span class="page-title-line">Contact Us</span>
                <h1 class="page-title-heading">Get in Touch.
                </h1>
            </div>
        </div>
    </div>
</section>



<section class="contact-us-page  pt-120 pb-60">
    <div class="container">
     <div class="row">
        <div class="col-12">
            <div class="contact-us-meta">
                <div class="row">
                    <div class="col-lg-8 mb-50">                            
                        <div class="section-title-left">
                            <h4 class="title-inner-page">Contact Form </h4>
                            <p>We believe in hassle-free communication.</p>
                            <p>
        To know our services in detail or to have our representatives contact you, please fill the contact form below:</p>
                        </div>
                        @if (count($errors) > 0)
                            <div class="alert alert-danger vosjs">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="flash-message vosjs">
                            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                @if (Session::has('alert-' . $msg))
                                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                        <form action="{{url('contactSave')}}" method="post" name="contact_form" id="contact_form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
    
                                                <input type="text" placeholder="Name *" name="name" id="name" required>
                                                <div id="name_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
    
                                                <input type="email" placeholder="Email *" name="email" id="email" required>
                                                <div id="email_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
    
                                                <input type="text" placeholder="Job Title *" name="job_title" id="job_title" required>
                                                <div id="job_title_error"></div>
    
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
    
                                                <input type="text" placeholder="Company *" name="company" id="company" required>
                                                <div id="company_error"></div>
    
                                            </div>
                                        </div>
    
                                        <div class="col-sm-6">
                                            <div class="form-group">
    
                                                <select name="country" id="country" required>
                                                    <option value="" disabled selected hidden>Select country * </option>
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
                                                <div id="country_error"></div>
                                            </div>
                                        </div>
    
                                        <div class="col-sm-6">
                                            <div class="form-group">
    
                                                <input type="text" placeholder="Contact *" name="phone" id="phone" required>
                                                <div id="phone_error"></div>
    
                                            </div>
                                        </div>
    
                                        <div class="col-sm-12">
                                            <div class="form-group">
    
                                                <textarea class="form-control rounded-0" name="message" id="message" placeholder="Message *"></textarea>
                                                <div id="message_error"></div>
    
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                            <div class="form-group">
                                    <div class="g-recaptcha" data-callback="verifyCaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                                    <div id="g-recaptcha-error"></div>
                                    </div>
                                        </div>
                                        <button id="button1" type="submit" class="main-btn-two" style="border:0">
                                            <div class="text-btn">
                                                <span class="text-btn-one">Submit Request</span>
                                                <span class="text-btn-two">Submit Request</span>
                                            </div>
                                            <div class="arrow-btn">
                                                <span class="arrow-one"><i class="fa fa-long-arrow-alt-right"></i></span>
                                                <span class="arrow-two"><i class="fa fa-long-arrow-alt-right"></i></span>
                                            </div>
                                        </button>
    
                                    
                                </form>
                    </div>

                    <div class="col-lg-4 right-side-contact">
                        @foreach($site as $data)
                            <h4>Corporate oﬃce</h4>
                            <p class="contact-sub-heading">{{$data->address}}</p>

                            <h4>Japan oﬃce</h4>
                            <p class="contact-sub-heading">3F, Hatchobori 4-4-4, Chuo-ku, Tokyo,104-0032, Japan</p>
                            <div class="row">
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="contact-item">
                                            <div class="inner-contact">
                                                <span><i class="fa fa-phone"></i></span>
                                                <h4>Phone</h4>
                                            </div>
                                            <p>Japan: +81-5050505761</p>
                                            <p>{{$data->contact}}</p>
                                            <p>{{$data->contact_one}}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-sm-12">
                                        <div class="contact-item">
                                            <div class="inner-contact">
                                                <span><i class="fa fa-envelope"></i></span>
                                                <h4>Email</h4>
                                            </div>

                                            <p>{{$data->email}}</p>
                                        </div>
                                    </div>


                                    <div class="col-lg-12 col-sm-12">
                                        <div class="contact-item">
                                            <div class="inner-contact">
                                                <span><i class="fas fa-clock"></i></span>
                                                <h4>Online work </h4>
                                            </div>

                                            <p>Monday - Friday, 9am - 5pm,</p>
                                            <p>Saturday & Sunday - CLOSED</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-item">
                                            <div class="inner-contact">
                                                <span><i class="fas fa-globe"></i></span>
                                                <h4>Connect with us </h4>
                                            </div>

                                            <ul class="social-media">
                                               @foreach($site as $siteData)
                                                <li><a href="{{$siteData->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="{{$siteData->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
                                                <!--<li><a href="{{$siteData->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a></li>-->
                                                <li><a href="{{$siteData->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                                                @endforeach
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>  
</section>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3501.9826536031173!2d77.37677831549475!3d28.630281982418705!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ceff8864e0cf1%3A0xa20290bf75099ebd!2sBSI%20Business%20Park%20H15!5e0!3m2!1sen!2sin!4v1609240573481!5m2!1sen!2sin" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>


















        

<div id="clients" class="clients ptb-120">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <!--Testimonials Item -->
            <div class="col-12 owl-carousel sponsor owl-theme ">

                @foreach($ourClientData as $ourClient)
                <!-- New Item -->
                <div class="item">
                    <div class="sponsor-item">
                        <img class="lazyload" data-src="{{URL::asset('public/upload/ourClient/'.$ourClient->image)}}" alt="sponsor">
                    </div>
                </div>
                @endforeach

                <!-- New Item -->



            </div>


        </div>
    </div>

</div>
                    <script>
var recaptcha_response = '';
var error_msg = '';
 
function verifyCaptcha(token) {
    recaptcha_response = token;
    document.getElementById('g-recaptcha-error').innerHTML = '';
}
</script>

<script>

$(document).ready(function () {

    $("#button1").click(function(e){
        e.preventDefault();

        if($("#name").val() == ''){
            error_msg='true';  
            document.getElementById('name_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{
            document.getElementById('name_error').innerHTML = '';     
        }

        if($("#email").val() == ''){

        error_msg='true';  
        document.getElementById('email_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{     
            document.getElementById('email_error').innerHTML = '';
        }

        if($("#phone").val() == ''){
        error_msg='true';  
        document.getElementById('phone_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{    
            document.getElementById('phone_error').innerHTML = '';
        }
        if($("#job_title").val() == ''){
        error_msg='true';  
        document.getElementById('job_title_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{
            document.getElementById('job_title_error').innerHTML = '';      
        }
        if($("#company").val() == ''){
        error_msg='true';  
        document.getElementById('company_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{
            document.getElementById('company_error').innerHTML = '';      
        }

        if($("#country").val() == ''){
        error_msg='true';  
        document.getElementById('country_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{
            document.getElementById('country_error').innerHTML = '';      
        }

        if($("#message").val() == ''){
        error_msg='true';  
        document.getElementById('message_error').innerHTML = '<span style="color:red;">This field is required.</span>';
        }else{
            document.getElementById('message_error').innerHTML = '';      
        }

        if($("#email").val() != '' && $("#job_title").val() !='' && $("#phone").val() !='' && $("#name").val() !='' && $("#country").val() !='' && $("#company").val() !='' && $("#message").val() !=''){
            error_msg=''; 
        }
        if(recaptcha_response.length == 0) {
        document.getElementById('g-recaptcha-error').innerHTML = '<span style="color:red;">This field is required.</span>';
        return false;
    }else{
        if(error_msg==''){
        $('#contact_form').submit();
        }
    }

     
    });    
});
</script>
@stop
