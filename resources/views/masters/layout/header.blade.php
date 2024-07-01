<header class="app-header">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"><a class="app-header__logo" href="{{route('dashboard')}}">Astute</a>
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">

        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <!-- <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>-->
                <li><a class="dropdown-item" href="{{route('logout')}}"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
            </ul>
        </li>
    </ul>
</header>
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <!--<img class="app-sidebar__user-avatar" src="{{URL::asset('public/img/logo.jpg')}}" alt="User Image" width="50%">-->
        <div>
            <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
            <p class="app-sidebar__user-designation">Admin Panel</p>
        </div>
    </div>
    <ul class="app-menu">

        <li><a class="app-menu__item" href="{{route('dashboard')}}"><i class="app-menu__icon fas fa-tachometer-alt"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item" href="{{route('category_list')}}"><i class="app-menu__icon fa fa-sitemap"></i><span class="app-menu__label">Category</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fas fa-file-alt"></i><span class="app-menu__label">All Report</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item" href="{{route('allReport')}}"><i class="icon fa fa-circle-o"></i> All Report</a></li>

                <li><a class="treeview-item" href="{{route('reportPurchase')}}"><i class="icon fa fa-circle-o"></i> Report Purchase </a></li>

                <li><a class="treeview-item" href="{{route('requestSample')}}"><i class="icon fa fa-circle-o"></i> Request Sample </a></li>

                <li><a class="treeview-item" href="{{route('reportRequest')}}"><i class="icon fa fa-circle-o"></i> Report Request </a></li>
                <li><a class="treeview-item" href="{{route('reportDiscount')}}"><i class="icon fa fa-circle-o"></i>Report Discount</a></li>

            </ul>
        </li>


     <!--   <li><a class="app-menu__item" href="{{route('artical')}}"><i class="app-menu__icon fa fa-paper-plane"></i><span class="app-menu__label">Artical</span></a></li>-->

        <li><a class="app-menu__item" href="{{route('pressRelease')}}"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Press Release</span></a></li>
        <li><a class="app-menu__item" href="{{route('pressReleaseEnquiry')}}"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Press Release Enquiry</span></a></li>

        {{-- <li><a class="app-menu__item" href="{{route('astuteInside')}}"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Astute Inside</span></a></li>
         --}}
         <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fas fa-newspaper"></i><span class="app-menu__label">Astute Inside</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item" href="{{route('insideCategory')}}"><i class="icon fa fa-circle-o"></i> Category</a></li>

                <li><a class="treeview-item" href="{{route('astuteInside')}}"><i class="icon fa fa-circle-o"></i> Astute Inside </a></li>

            </ul>
        </li>
        <li><a class="app-menu__item" href="{{route('service')}}"><i class="app-menu__icon fas fa-project-diagram"></i><span class="app-menu__label">Services</span></a></li>

       <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-paper-plane"></i><span class="app-menu__label">Career</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item" href="{{route('career')}}"><i class="icon fa fa-circle-o"></i> Career</a></li>

                <li><a class="treeview-item" href="{{route('jobRequest')}}"><i class="icon fa fa-circle-o"></i> Job Request </a></li>

            </ul>
        </li>
-->
        <li><a class="app-menu__item" href="{{route('cms_page')}}"><i class="app-menu__icon fas fa-file-alt"></i><span class="app-menu__label">CMS Page</span></a></li>

        <li><a class="app-menu__item" href="{{route('slider')}}"><i class="app-menu__icon fas fa-image"></i><span class="app-menu__label">Slider</span></a></li>


        <li><a class="app-menu__item" href="{{route('whyastute')}}"><i class="app-menu__icon fa fa-random"></i><span class="app-menu__label">Why Astute</span></a></li>

        <li><a class="app-menu__item" href="{{route('ourClient')}}"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Our Client</span></a></li>

        <li><a class="app-menu__item" href="{{route('testominal')}}"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Testominal</span></a></li>

        <li><a class="app-menu__item" href="{{route('siteInformation')}}"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Site Information</span></a></li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Contact Information</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

                <li><a class="treeview-item" href="{{route('contact')}}"><i class="icon fa fa-circle-o"></i> Contact</a></li>

                <li><a class="treeview-item" href="{{route('subscribe')}}"><i class="icon fa fa-circle-o"></i> Subscribe </a></li>

              <!--  <li><a class="treeview-item" href="{{route('becomePartner')}}"><i class="icon fa fa-circle-o"></i> Become Partner </a></li>-->

            </ul>
        </li>
<li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">USERS</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">

            <li><a class="app-menu__item" href="{{route('user-list')}}"><i class="app-menu__icon fas fa-bell"></i><span class="app-menu__label">Users List</span></a></li>

                <li><a class="treeview-item" href="{{route('registernewuser')}}"><i class="icon fa fa-circle-o"></i> Add NEW USER </a></li>

             

            </ul>
        </li>
        

        <li><a class="app-menu__item" href="{{route('notification')}}"><i class="app-menu__icon fas fa-bell"></i><span class="app-menu__label">Notification</span></a></li>
        <li><a class="app-menu__item" href="{{route('changePassword')}}"><i class="app-menu__icon fas fa-pencil-alt"></i><span class="app-menu__label">Change Password</span></a></li>

    </ul>
</aside>
