@inject('translateService', 'App\Services\TranslateService')
<?php
 if (Session::has('kullanici'))
    {
        $kullanici = json_decode(Session::get('kullanici'));
     
    }
else
   {
    header('Location: http://127.0.0.1:8000/login');
exit();
   }
?>
<!DOCTYPE html>
<!-- saved from url=(0068)https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html -->
<html lang="en" dir="ltr"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="your-csrf-token">
    <title>Rent a car</title>

    <link href="{{ asset('form_files/css2') }}" rel="stylesheet">

    <!-- inject:css-->

    <link rel="stylesheet" href="{{ asset('form_files/plugin.min.css') }}">

    <link rel="stylesheet"  href="{{ asset('form_files/style.css') }}">

    <!-- endinject -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
   
    <link rel="icon" type="image/png" sizes="16x16"  href="{{ asset('form_files/favicon.png') }}">
<style>.osSwitch{position:relative;display:inline-block;width:34px;height:15.3px}.osSwitch input{opacity:0;width:0;height:0}.osSlider{position:absolute;top:0;left:0;right:0;bottom:0;border-radius:34px;background-color:#93a0b5;transition:0.4s}.osSlider:before{position:absolute;content:'';height:13px;width:13px;left:2px;bottom:1px;border-radius:50%;background-color:white;transition:0.4s}input:checked+.sliderGreen{background-color:#04d289}input:checked+.sliderRed{background-color:#ff3b30}input:not(:checked)+.defaultGreen{background-color:#04d289}input:checked+.osSlider:before{transform:translateX(17px)}
</style><style>
    @font-face {
      font-family: 'SegoeUI_online_security'; 
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui.woff);
    }

    @font-face {
      font-family: 'SegoeUI_bold_online_security'; 
      src: url(chrome-extension://llbcnfanfmjhpedaedhbcnpgeepdnnok/segoe-ui-bold.woff);
    }
</style></head>

<body class="layout-light side-menu loaded">
    <div class="mobile-search">
        <form class="search-form">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
        </form>
    </div>

    <div class="mobile-author-actions"></div>
    <header class="header-top">
        <nav class="navbar navbar-light">
            <div class="navbar-left">
                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="sidebar-toggle">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="13.46" viewBox="0 0 18 13.46" class="svg replaced-svg">
  <g id="collapse_icon" data-name="collapse icon" transform="translate(0 -73)">
    <g id="Group_3" data-name="Group 3" transform="translate(2.474 84.956)">
      <g id="Group_2" data-name="Group 2">
        <path id="Path_1" data-name="Path 1" d="M85.352,403.7H99.375a.752.752,0,1,0,0-1.5H85.352a.752.752,0,1,0,0,1.5Z" transform="translate(-84.6 -402.2)" fill="#adb4d2"></path>
      </g>
    </g>
    <g id="Group_5" data-name="Group 5" transform="translate(0 78.978)">
      <g id="Group_4" data-name="Group 4">
        <path id="Path_2" data-name="Path 2" d="M.728,239.1H17.269a.752.752,0,0,0,0-1.5H.728a.752.752,0,0,0,0,1.5Z" transform="translate(0 -237.6)" fill="#adb4d2"></path>
      </g>
    </g>
    <g id="Group_7" data-name="Group 7" transform="translate(5.742 73)">
      <g id="Group_6" data-name="Group 6">
        <path id="Path_3" data-name="Path 3" d="M175.352,74.5h10.754a.752.752,0,1,0,0-1.5h-10.75a.752.752,0,1,0,0,1.5Z" transform="translate(-174.6 -73)" fill="#adb4d2"></path>
      </g>
    </g>
  </g>
</svg></a>
                <a class="navbar-brand" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#">
                     <img class="dark" src="{{ asset('form_files/logo.jpg') }}" alt="svg">
                    <!-- <img class="light" src="./form_files/logo_white.png" alt="img">  -->
                    <!-- <h3>RENT A CAR</h3> -->
                </a>
                <!-- <form action="https://demo.jsnorm.com/" class="search-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                    <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                </form> -->
                <!-- <div class="top-menu">

                    <div class="strikingDash-top-menu position-relative">
                        <ul>
                            <li class="has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">Dashboard</a>
                                <ul class="subMenu">
                                    <li>
                                        <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/index.html">Social Media</a>
                                    </li>
                                    <li>
                                        <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/business.html">FineTech /
                                            Business</a>
                                    </li>
                                    <li>
                                        <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/performance.html">Site
                                            Performance</a>
                                    </li>
                                    <li>
                                        <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/ecommerce.html">Ecommerce</a>
                                    </li>
                                    <li>
                                        <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/crm.html">
                                            CRM</a>
                                    </li>
                                    <li>
                                        <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/sales.html">
                                            Sales Performance</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">Layouts</a>
                                <ul class="subMenu">
                                    <li class="l_sidebar">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" data-layout="light">Light Mode</a>
                                    </li>
                                    <li class="l_sidebar">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" data-layout="dark">Dark Mode</a>
                                    </li>
                                    <li class="l_navbar">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" data-layout="top">Top Menu</a>
                                    </li>
                                    <li class="l_navbar">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" data-layout="side">Side Menu</a>
                                    </li>
                                    <li class="layout">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/rtl">RTL</a>
                                    </li>
                                    <li class="layout">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr">LTR</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">Apps</a>
                                <ul class="subMenu">
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/chat.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square nav-icon"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                                            <span class="menu-text">Chat</span>
                                        </a>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart nav-icon"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                            <span class="menu-text">eCommerce</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/products.html" class="">Products</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/product-details.html" class="">Product Details</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/add-product.html" class="">Product
                                                    Add</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="">Product Edit</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/cart.html" class="">Cart</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/order.html" class="">Orders</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/sellers.html" class="">Sellers</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/invoice.html" class="">Invoices</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail nav-icon"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                            <span class="menu-text">Email</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/inbox.html" class="">Inbox</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/read-email.html" class="">Read
                                                    Email</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/chat.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bookmark nav-icon"><path d="M19 21l-7-5-7 5V5a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2z"></path></svg>
                                            <span class="menu-text">Note</span>
                                        </a>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user nav-icon"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                            <span class="menu-text">Profile</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/profile.html" class="">Profile</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/profile-setting.html" class="">Profile Settings</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-check nav-icon"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><polyline points="17 11 19 13 23 9"></polyline></svg>
                                            <span class="menu-text">Contact</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/contact-1.html">Contact 1</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/contact-2.html">Contact 2</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/chat.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity nav-icon"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>
                                            <span class="menu-text">To-Do</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/kanban.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-columns nav-icon"><path d="M12 3h7a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-7m0-18H5a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h7m0-18v18"></path></svg>
                                            <span class="menu-text">Kanban Board</span>
                                        </a>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-repeat nav-icon"><polyline points="17 1 21 5 17 9"></polyline><path d="M3 11V9a4 4 0 0 1 4-4h14"></path><polyline points="7 23 3 19 7 15"></polyline><path d="M21 13v2a4 4 0 0 1-4 4H3"></path></svg>
                                            <span class="menu-text">Import &amp; Export</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/import.html">Import</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/export.html">Export</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/export-selected.html">Export Selected
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/file-manager.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file nav-icon"><path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path><polyline points="13 2 13 9 20 9"></polyline></svg>
                                            <span class="menu-text">File Manager</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/task-app.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clipboard nav-icon"><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path><rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect></svg>
                                            <span class="menu-text">Task App</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>



                            <li class="has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">Crud</a>
                                <ul class="subMenu">
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart nav-icon"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                                            <span class="menu-text">Firestore Crud</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/firestore.html">View All</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/firestore-add.html">Add
                                                    New</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li class="mega-item has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">Pages</a>
                                <ul class="megaMenu-wrapper megaMenu-small">
                                    <li>
                                        <ul>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/projects.html" class="">Project</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/application-ui.html" class="">Project Details</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/create.html" class="">Create
                                                    Project</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/users-card.html" class="">Team</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/users-card2.html" class="">Users</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/user-info.html" class="">Users
                                                    Info</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/users-list.html" class="">Users
                                                    List</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/users-group.html" class="">Users
                                                    Group</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/banner.html" class="">
                                                    <span class="menu-text">Banners</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/testimonial.html" class="">
                                                    <span class="menu-text">Testimonial</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/support.html" class="">
                                                    <span class="menu-text">Support Center</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/dynamic-table.html" class="">
                                                    <span class="menu-text">Dynamic Table</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/users-datatable.html" class="">Users
                                                    Table</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/gallery.html" class="">Gallery 1</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/gallery2.html" class="">Gallery 2</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/pricing.html" class="">Pricing</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/faq.html" class="">FAQ's</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/search.html" class="">Search
                                                    Results</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/maintenance.html" class="">Coming
                                                    Soon</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/404.html" class="">404</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/maintenance.html" class="">
                                                    <span class="menu-text">Maintenance</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/login.html" class="">
                                                    <span class="menu-text">Log In</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/sign-up.html" class="">
                                                    <span class="menu-text">Sign Up</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/blank.html" class="">
                                                    <span class="menu-text">Blank</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="mega-item has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">Components</a>
                                <ul class="megaMenu-wrapper megaMenu-wide">
                                    <li>
                                        <span class="mega-title">Components</span>
                                        <ul>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/alert.html">Alert</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/avatar.html">Avatar</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/badge.html">Badge</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/breadcrumbs.html">Breadcrumb</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/buttons.html">Button</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/cards.html">Cards</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/carousel.html">Carousel</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/checkbox.html">Checkbox</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/collapse.html">Collapse</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/comments.html">Comments</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="mega-title">Components</span>
                                        <ul>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/dashboard-base.html">Dashboard
                                                    Base</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/date-picker.html">DatePicker</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/drawer.html">Drawer</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/drag-drop.html">Drag &amp;
                                                    Drop</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/dropdown.html">Dropdown</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/empty.html">Empty</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/input.html">Input</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/list.html">List</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/menu.html">Menu</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/message.html">Message</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="mega-title">Components</span>
                                        <ul>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/modal.html">Modals</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/notifications.html">Notification</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/page-header.html">Page
                                                    Headers</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/pagination.html">Paginations</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/progressbar.html">Progress</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/radio.html">Radio</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/rate.html">Rate</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/result.html">Result</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/select.html">Select</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/skeleton.html">Skeleton</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/time-picker.html">Timepicker</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <span class="mega-title">Components</span>
                                        <ul>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/slider.html">Slider</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/spin.html">Spinner</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/statistics.html">Statistic</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/steps.html">Steps</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/switch.html">Switch</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/tab.html">Tabs</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/tag.html">Tags</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/timeline.html">Timeline</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/timeline-2.html">Timeline
                                                    2</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/timeline-3.html">Timeline
                                                    3</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/uploads.html">Upload</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="has-subMenu">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="active">Features</a>
                                <ul class="subMenu">
                                    <li>
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/editors.html" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit nav-icon"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                                            <span class="menu-text">Editors</span>
                                        </a>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid nav-icon"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>
                                            <span class="menu-text">Icons</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/feather.html" class="">Feather icons
                                                    (svg)</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/fontawesome.html" class="">Font
                                                    Awesome</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/lineawesome.html" class="">Line
                                                    Awesome</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2 nav-icon"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
                                            <span class="menu-text">Charts</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/charts.html">Chart JS</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/google-chart.html">Google
                                                    Charts</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/peity-chart.html">Peity
                                                    Charts</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class=" active">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-disc nav-icon"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="3"></circle></svg>
                                            <span class="menu-text">Froms</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="active" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">Basics</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form-layouts.html">Layouts</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form-elements.html">Elements</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form-components.html">Components</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form-validations.html">Validations</a>
                                            </li>
                                        </ul>
                                    </li>



                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map nav-icon"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg>
                                            <span class="menu-text">Maps</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/google-map.html" class="">Google
                                                    Maps</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/leaflet-map.html" class="">Leaflet
                                                    Maps</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/vector-map.html" class="">Vector
                                                    Maps</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-server nav-icon"><rect x="2" y="2" width="20" height="8" rx="2" ry="2"></rect><rect x="2" y="14" width="20" height="8" rx="2" ry="2"></rect><line x1="6" y1="6" x2="6.01" y2="6"></line><line x1="6" y1="18" x2="6.01" y2="18"></line></svg>
                                            <span class="menu-text">Widget</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/widget-charts.html">Chart</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/widget-mixed.html">Mixed</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/widget-card.html">Card</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-square nav-icon"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect></svg>
                                            <span class="menu-text">Wizards</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/checkout-wizard6.html" class="">Wizard
                                                    1</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/checkout-wizard7.html" class="">Wizard
                                                    2</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/checkout-wizard8.html" class="">Wizard
                                                    3</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/checkout-wizard9.html" class="">Wizard
                                                    4</a>
                                            </li>
                                            <li>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/checkout-wizard10.html" class="">Wizard
                                                    5</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="has-subMenu-left">
                                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book nav-icon"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>
                                            <span class="menu-text">Knowledge Base</span>
                                        </a>
                                        <ul class="subMenu">
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/knowledgebase.html">Knowledge
                                                    Base</a>
                                            </li>
                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/knowledgebase-2.html">All
                                                    Article</a>
                                            </li>

                                            <li>
                                                <a class="" href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/knowledgebase-3.html">Single Article</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>

                </div> -->
            </div>
            <!-- ends: navbar-left -->

            <div class="navbar-right">
                
                <!-- <div class="navbar-right__mobileAction d-md-none">
                      <a href="#" class="btn-author-action">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg></a>
                </div> -->

                <a href="/user-update" class="nav-item-toggle" style="
                                padding: 7px;
                                border-radius: 4px;
                                color: #4d4d4d;
                                font-size: 13px;
                            "><i class="fa fa-user-circle" style='font-size: 18px;'></i>
                    {{$kullanici->ad_soyad}}
                    
                                <!-- <img src="{{ asset('form_files/author-nav.jpg') }}" alt="" class="rounded-circle"> -->
                            </a>
                            <a href="/logout" style="
                                border: 1px solid #c7c2c2;
                                padding: 7px;
                                border-radius: 4px;
                                background: #f1eeee;
                                color: #4d4d4d;
                                font-size: 13px;
                            " class="nav-author__signout">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>  {{$translateService->t("Çıkış")}}</a>
                              
            <!-- <ul class="navbar-right__menu">
                
                    <li class="nav-search d-none">
                        <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html#" class="search-toggle">
                            <i class="la la-search"></i>
                            <i class="la la-times"></i>
                        </a>
                        <form action="https://demo.jsnorm.com/" class="search-form-topMenu">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search search-icon"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                            <input class="form-control mr-sm-2 box-shadow-none" type="text" placeholder="Search...">
                        </form>
                    </li> -->
                    <!-- <li class="nav-message">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></a>
                            <div class="dropdown-wrapper">
                                <h2 class="dropdown-wrapper__title">Messages <span class="badge-circle badge-success ml-1">2</span></h2>
                                <ul>
                                    <li class="author-online has-new-message">
                                        <div class="user-avater">
                                            <img src="./form_files/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                                <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-offline has-new-message">
                                        <div class="user-avater">
                                            <img src="./form_files/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                                <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-online has-new-message">
                                        <div class="user-avater">
                                            <img src="./form_files/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                                <span class="msg-count badge-circle badge-success badge-sm">1</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-offline">
                                        <div class="user-avater">
                                            <img src="./form_files/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="author-offline">
                                        <div class="user-avater">
                                            <img src="./form_files/team-1.png" alt="">
                                        </div>
                                        <div class="user-message">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">Web Design</a>
                                                <span class="time-posted">3 hrs ago</span>
                                            </p>
                                            <p>
                                                <span class="desc text-truncate" style="max-width: 215px;">Lorem ipsum
                                                    dolor amet cosec Lorem ipsum</span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="dropdown-wrapper__more">See All Message</a>
                            </div>
                        </div>
                    </li> -->
                   <!-- <li class="nav-notification">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
                            <div class="dropdown-wrapper">
                                <h2 class="dropdown-wrapper__title">Notifications <span class="badge-circle badge-warning ml-1">4</span></h2>
                                <ul> -->
                              <!--        <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--primary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline><path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path></svg>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-upload"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path><polyline points="17 8 12 3 7 8"></polyline><line x1="12" y1="3" x2="12" y2="15"></line></svg>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single--unread d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in"><path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path><polyline points="10 17 15 12 10 7"></polyline><line x1="15" y1="12" x2="3" y2="12"></line></svg>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign"><circle cx="12" cy="12" r="4"></circle><path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path></svg>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                    <li class="nav-notification__single nav-notification__single d-flex flex-wrap">
                                        <div class="nav-notification__type nav-notification__type--danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                        </div>
                                        <div class="nav-notification__details">
                                            <p>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="subject stretched-link text-truncate" style="max-width: 180px;">James</a>
                                                <span>sent you a message</span>
                                            </p>
                                            <p>
                                                <span class="time-posted">5 hours ago</span>
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="dropdown-wrapper__more">See all incoming activity</a>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="nav-settings">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg></a>
                            <div class="dropdown-wrapper dropdown-wrapper--large">
                                <ul class="list-settings">
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="./form_files/mail.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="stretched-link">All Features</a>
                                            </h6>
                                            <p>Introducing Increment subscriptions </p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="./form_files/color-palette.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="stretched-link">Themes</a>
                                            </h6>
                                            <p>Third party themes that are compatible</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="./form_files/home.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="stretched-link">Payments</a>
                                            </h6>
                                            <p>We handle billions of dollars</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="./form_files/video-camera.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="stretched-link">Design Mockups</a>
                                            </h6>
                                            <p>Share planning visuals with clients</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="./form_files/document.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="stretched-link">Content Planner</a>
                                            </h6>
                                            <p>Centralize content gethering and editing</p>
                                        </div>
                                    </li>
                                    <li class="d-flex">
                                        <div class="mr-3"><img src="./form_files/microphone.png" alt=""></div>
                                        <div class="flex-grow-1">
                                            <h6>
                                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="stretched-link">Diagram Maker</a>
                                            </h6>
                                            <p>Plan user flows &amp; test scenarios</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="nav-support">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-help-circle"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg></a>
                            <div class="dropdown-wrapper">
                                <div class="list-group">
                                    <span>Documentation</span>
                                    <ul>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">How to customize admin</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">How to use</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">The relation of vertical spacing</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-group">
                                    <span>Payments</span>
                                    <ul>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">How to customize admin</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">How to use</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="list-group">
                                    <span>Content Planner</span>
                                    <ul>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">How to customize admin</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">How to use</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!-- <li class="nav-flag-select">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><img src="{{ asset('form_files/flag.png') }}" alt="" class="rounded-circle"></a>
                            <div class="dropdown-wrapper dropdown-wrapper--small">
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html"><img src="{{ asset('form_files/eng.png') }}" alt=""> English</a>
                                 <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html"><img src="{{ asset('form_files/ger.png') }}" alt=""> German</a>
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html"><img src="{{ asset('form_files/spa.png') }}" alt=""> Spanish</a> 
                                <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html"><img src="{{ asset('form_files/tur.png') }}" alt=""> Turkish</a>
                            </div>
                        </div>
                    </li> 
                    <li class="nav-author">
                        <div class="dropdown-custom">
                            <a href="javascript:;" class="nav-item-toggle"><i class="fa fa-user-circle" style="
                        font-size: 27px;
                    "></i>
                                <img src="{{ asset('form_files/author-nav.jpg') }}" alt="" class="rounded-circle">
                            </a>
                            <div class="dropdown-wrapper">
                                <div class="nav-author__info">
                                    <div class="author-img">
                                        <img src="{{ asset('form_files/author-nav.jpg') }}" alt="" class="rounded-circle">
                                    </div>
                                    <div>
                                        <h6>Sinan Bedir</h6>
                                        <span>{{$translateService->t("Computer Programmer")}}</span>
                                    </div>
                                </div>
                                <div class="nav-author__options">
                                    <ul>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg> {{$translateService->t("Profil")}}</a>
                                        </li>
                                         <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg> Settings</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg> Billing</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg> Activity</a>
                                        </li>
                                        <li>
                                            <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg> Help</a>
                                        </li>
                                    </ul>
                                    <a href="https://demo.jsnorm.com/html/strikingdash/strikingdash/ltr/form.html" class="nav-author__signout">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>  {{$translateService->t("Çıkış")}}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                -->
            </div>
        </nav>
    </header>