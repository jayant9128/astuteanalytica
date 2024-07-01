<div class="loading-screen">
   <div class="display-table">
      <div class="table-cell">
         <div class="lds-ring">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
         </div>
      </div>
   </div>
</div>
<div class="upper-bar upper-bar-dark  d-n-mobile d-n-tab">
   <div class="container">
      <div class="row">
         <div class="col-md-8">
            <div class="contact-us-bar">
               <p> 24/7 Customer Support</p>
            </div>
         </div>
         <div class="col-md-4 d-n-sm">
            <ul class="social-media-bar">
               @foreach($site as $siteData)
               <li><a href="{{$siteData->facebook}}" target="_blank" class="facebook"><i class="fab fa-facebook-f"></i></a></li>
               <li><a href="{{$siteData->twitter}}" target="_blank" class="twitter"><i class="fab  fa-twitter"></i></a></li>
               <!-- <li><a href="{{$siteData->instagram}}" target="_blank" class="instagram"><i class="fab fa-instagram"></i></a></li>-->
               <li><a href="{{$siteData->linkedin}}" target="_blank" class="linkedin"><i class="fab  fa-linkedin-in"></i></a></li>
               <li><a href="https://www.astuteanalytica.com/" ><img src="{{ URL::asset('public/front/images/en-flag.png') }}"></a></li>
               <li><a href="https://astuteanalytica.jp/"><img src="{{ URL::asset('public/front/images/jp-flag.png') }}"></a></li>
               
               @endforeach
            </ul>
         </div>
      </div>
   </div>
</div>
<nav class="nav-bar main-nav-bar">
   <div class="nav-output">
      <div class="nav-menu-bar">
         <div class="sticky-navbar">
            <div class="container">
               <div class="logo-box">
                  <a href="{{url('/')}}" class="my-logo">
                     <img width="100"
                     height="95" class="logo-two" src="https://www.astuteanalytica.com/public/front/images/logo/logo-2.png" srcset=" https://www.astuteanalytica.com/public/front/images/logo/logo-2.png" alt="Astute Analytica Logo">
                  </a>
               </div>
               <div class="nav-menu-main ">
                  <div class="position-inherit">
                     <a href="#" class="navbar-toggle">
                     <span></span>
                     <span></span>
                     <span></span>
                     </a>
                     <ul id="main-menu" class="nav-menu mx-auto">
                        <li class="active">
                           <a href="{{url('/')}}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item has-dropdown">
                           <a href="{{url('industries')}}" class="nav-link">Industries
                           <span class="icon-down icon-down-one">
                           <i class="fas fa-angle-down"></i>
                           </span>
                           </a>
                           <ul class="sub-menu">
                              @foreach($categories as $catData)
                              <li><a href="{{url('industry',$catData->slug)}}">{{$catData->title}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        <li class="nav-item">
                           <a href="{{url('services')}}" class="nav-link">Services</a>
                        </li>
                        <li class="nav-item">
                           <a href="{{url('press-release')}}" class="nav-link">Press Release</a>
                        </li>
                        <li class="nav-item has-dropdown">
                           <a href="{{url('insights')}}" class="nav-link">Insights
                              <span class="icon-down icon-down-one">
                              <i class="fas fa-angle-down"></i>
                              </span>
                           </a>
                            <ul class="sub-menu">
                              @foreach($inside_cate as $ins_cate)
                              <li><a href="{{url('insights',$ins_cate->slug)}}">{{$ins_cate->title}}</a></li>
                              @endforeach
                           </ul> 
                        </li>
                        <li class="nav-item">
                           <a href="{{url('about-us')}}" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item">
                           <a href="{{url('contact-us')}}" class="nav-link">Contact Us</a>
                        </li>
                     </ul>
                     <div class="icon-links">
                        <!-- <a href="#" class="btn-three d-n-mobile" data-toggle="modal" data-target="#getintouch">Get in Touch </a> -->
                        <!-- <a href="#" class="search-btn" data-toggle="modal" data-target="#search-popup">
                        <i class="fa fa-search"></i>
                        </a> -->

                        <div class="search-container">
                          <form action="{{url('searchReport')}}" method="post" >
                           @csrf
                            <input class="search expandright" id="searchright" name="searchData" type="search" onkeyup="checkSearchSystem(this.value)" placeholder="Search Reports">
                            <label class="button searchbutton" for="searchright"><span class="mglass">&#9906;</span></label>
                          </form>
                        </div>
                        <div class="headerSearch">
                           <ul id="searchLayout">
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>  
</nav>


<!-- Overlay Close Sidebar -->

<div class="modal" id="search-popup">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="search-screen">
                <a href="#" class="close-search" class="close" data-dismiss="modal"><i class="fas fa-times"></i></a>

                <form class="input-search" action="{{url('searchReport')}}" method="post">
                    @csrf
                    <input type="search" name="searchData" placeholder="Search Reports " required id="searchTextBox" onkeyup="checkSearchSystem(this.value)">
                    <button type="submit" class="search-btn2"> <i class="fas fa-search"></i> </button>
                </form>
                <div class="row headerSearch justify-content-center">
                    
                    <div class="col-sm-12  ">
                        <ul id="searchLayout">
                            
                        </ul>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>


