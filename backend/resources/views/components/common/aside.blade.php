<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>
                <x-menu.item text="{{ __('Dashboard') }}" link="{{ route('dashboard') }}" icon="home" class="{{ (request()->is('dashboard*')) ? 'active' : '' }} "/>
                <x-menu.item text="{{ __('Manage Users') }}" link="{{ route('user.manage') }}" icon="users" class="{{ (request()->is('users')) ? 'active' : '' }}"/>

                <x-menu.list text="Test Menu" icon="share-2" class="{{ (request()->is('url*')) ? 'mm-active' : '' }}">
                    <x-menu.item text="Special Contact" link="#" class="{{ (request()->is('url/special-contact')) ? 'active' : '' }}"/>
                    <x-menu.item text="Contact" link="#" class="{{ (request()->is('url/contact')) ? 'active' : '' }}"/>
                </x-menu.list>
            </ul>
        </div>
    </div>
</div>
