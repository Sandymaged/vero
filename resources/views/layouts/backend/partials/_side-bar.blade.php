<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">

@include('layouts.backend.partials.sidebar_menu.logo')

<!--begin::Aside menu-->
    <div class="aside-menu flex-column-fluid">
        <!--begin::Aside Menu-->
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div
                class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true">

                @include('layouts.backend.partials.sidebar_menu.home')

                

                @include('layouts.backend.partials.sidebar_menu.merchants')

                @include('layouts.backend.partials.sidebar_menu.offers')

                @include('layouts.backend.partials.sidebar_menu.settings')

                @include('layouts.backend.partials.sidebar_menu.reports')

                @include('layouts.backend.partials.sidebar_menu.reservations')

                @include('layouts.backend.partials.sidebar_menu.sales')

                @include('layouts.backend.partials.sidebar_menu.clients') 


            </div>
            <!--end::Menu-->
        </div>
        <!--end::Aside Menu-->
    </div>
    <!--end::Aside menu-->
</div>


                <!-- 

                @include('layouts.backend.partials.sidebar_menu.reports')

                @include('layouts.backend.partials.sidebar_menu.reservations')

                @include('layouts.backend.partials.sidebar_menu.sales')

                @include('layouts.backend.partials.sidebar_menu.clients') 
                
                -->