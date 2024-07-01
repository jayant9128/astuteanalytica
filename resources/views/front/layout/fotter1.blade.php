
<!-- Modal -->
<div class="modal fade" id="getintouch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h6 class="modal-title" id="exampleModalLabel">Get in Touch</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <form action="{{url('contactSave')}}" method="post">
               @csrf
               <div class="row">
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" placeholder="Name *" name="name" required>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="email" placeholder="Email *" name="email" required>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" placeholder="Job Title *" name="job_title" required>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" placeholder="Company *" name="company" required>
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                     </div>
                  </div>
                  <div class="col-sm-6">
                     <div class="form-group">
                        <input type="text" placeholder="Contact *" name="phone" required>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <textarea class="form-control rounded-0" name="message"
                           placeholder="Message *"></textarea>
                     </div>
                  </div>
               </div>
               <button type="submit" class="main-btn-two border-0">
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
      </div>
   </div>
</div>


<footer class="footer footer-default-padding">

    <div class="container">
        <div class="row footer-row">
            <div class="col-lg-4 mb-15">
                    
                <div class="footer-widget">
                    <h4>About Astute Analytica</h4>
                    <!--<div class="footer-logo">-->
                    <!--    <img src="{{URL::asset('public/front/images/logo/logo-1.png')}}" alt="Astute Analytica Logo">-->
                    <!--</div>-->
                    <div class="line-footer"></div>
                    <p class="mb-15">We are a team of experts with scores of years of experience, determined to help you connect with ever-evolving landscape of information, knowledge, and wisdom.</p>
                    <h4 class="mb-15">Follow us on</h4>
                    
                    <ul class="social-media">
                        @foreach($site as $siteData)
                        <li><a href="{{$siteData->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="{{$siteData->twitter}}" target="_blank" class="twitter"><i class="fab fa-twitter"></i></a></li>
                        <!--<li><a href="{{$siteData->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a></li>-->
                        <li><a href="{{$siteData->linkedin}}" target="_blank" class="linkedin"><i class="fab fa-linkedin-in"></i></a></li>
                        @endforeach
                    </ul>
                    <p class="mt-10 mb-0">Trust Online</p>
                    <a href="//www.dmca.com/Protection/Status.aspx?ID=51a3790d-5096-49b7-990d-ebb847113481" title="DMCA.com Protection Status" class="dmca-badge" target="_blank"> 
                    <img class="" src ="https://images.dmca.com/Badges/dmca-badge-w100-2x1-04.png?ID=51a3790d-5096-49b7-990d-ebb847113481"  alt="DMCA.com Protection Status" width="100px" /></a>
                    <!-- Btn Two -->
                    <!--<a href="{{url('about-us')}}" class="main-btn-three">
                        <div class="text-btn">
                            <span class="text-btn-one">More about Us</span>
                            <span class="text-btn-two">More about Us</span>
                        </div>
                        <div class="arrow-btn">
                            <span class="arrow-one"><i class="fa fa-caret-right"></i></span>
                            <span class="arrow-two"><i class="fa fa-caret-right"></i></span>
                        </div>
                    </a> -->
                </div>
            </div>
            <div class="col-sm-6 col-lg-4 mb-30">
                <div class="footer-widget mb-0">
                    <h4>Company Links</h4>
                    <div class="line-footer"></div>
                    <div class="row">
                        <div class="col-6">
                            <ul class="footer-link mb-0">
                                <li>
                                    <a href="{{url('about-us')}}">
                                        <span><i class="fa fa-angle-right"></i></span> About Us
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('press-release')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Press Release
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('insights')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Insights
                                    </a>
                                </li>



                                <li>
                                    <a href="{{url('services')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Service
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('contact-us')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Contact Us
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-6">
                            <ul class="footer-link mb-0">
                                <li>
                                    <a href="{{url('privacy-policy')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Privacy Policy
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('terms-conditions')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Terms & Conditions
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('disclaimer')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Disclaimer
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('return-policy')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Return Policy
                                    </a>
                                </li>

                                <li>
                                    <a href="{{url('sitemap.xml')}}">
                                        <span><i class="fa fa-angle-right"></i></span> Site Map
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-4">
                <div class="footer-widget">
                    <h4>Newsletter</h4>
                    <div class="line-footer"></div>
                    <p class="mb-15">SIGN UP FOR OUR NEWSLETTER</p>
                    <form action="{{url('subscribeSave')}}" method="post">
                        @csrf
                        <div class="newsletter-item">
                            <input type="email" name="email" placeholder="Your Email" required>
                            <button type="submit"><i class="fa fa-paper-plane"></i></button>
                        </div>
                    </form>

                    <!-- List Icons online payments-->
                    <p class="mb-10">We Accept</p>
                    <ul class="payment_icon">
<li id="p_icon"></li>
<li id="mastercard"></li>
<li id="discover"></li>
<li id="wire"></li>
<li id="visa"></li>
<li id="american"></li>
</ul>
                </div>
            </div>
        </div>
        @foreach($site as $siteData)
        <div class="row row-contact">
            <div class="col-lg-4 col-sm-6 no-padding">
                <div class="single-item">
                    <span class="flaticon-call"></span>
                    <p> <a class="mail_css" href="tel:<?php
                    $var = $siteData->contact;
                    echo $whatIWant = substr($var, strpos($var, ":") + 1);
                    ?>">{{$siteData->contact}}</a></p>
                    <p> <a class="mail_css" href="tel:<?php
                    $var = $siteData->contact_one;
                    echo $whatIWant = substr($var, strpos($var, ":") + 1);
                    ?>">{{$siteData->contact_one}}</a></p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 no-padding">
                <div class="single-item">
                    <span class="flaticon-email"></span>
                    <p class="pt-2"><a class="mail_css" href="mailto:{{$siteData->email}}"> {{$siteData->email}}</a> </p>
                    <!--<p> {{$siteData->email}}</p>-->
                    <!-- <p> support@yourwebsite.com</p>-->
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 no-padding">
                <div class="single-item">
                    <span class="flaticon-location"></span>
                    <p>{{$siteData->address}}</p>

                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="footer-bar">
        <div class="container">
            <div class="footer-copy">
                <div class="row">
                    <div class="col-md-12">
                        <div class="copyright text-center">
                            &copy; 2021 Astute Analytica All Rights Reserved By
                           Astute Analytica
                        </div>
                    </div>
                   <!-- <div class="col-md-6">
                        <ul class="links-of-footer">
                            <li><a href="#">View Map</a></li>
                            <li><a href="#">Privacy</a></li>
                            <li><a href="#">Terms of Use</a></li>
                        </ul>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
</footer>

<div class="scroll-up">
    <i class="fa fa-angle-up"></i>
</div>
