    @php
        $isAdmin = Auth::check() && Auth::user()->role('admin');

    @endphp

    <ul class="metismenu left-sidenav-menu" id="side-nav">
        <li class="menu-title">Main</li>
        <li>

        <li>
            <a href="{{ route('admin.dashboard') }}"><i class="mdi mdi-monitor"></i>Dashboard</a>
        </li>
        @if ($isAdmin)
            <li>
                <a href="{{ route('admin.provider.index') }}"><i class="mdi mdi-monitor"></i>Providers</a>
            </li>
        @else
            @can('provider-view')
                <li>
                    <a href="{{ route('admin.provider.index') }}"><i class="mdi mdi-monitor"></i>Providers</a>
                </li>
            @endcan
        @endif
        @if ($isAdmin)
            <li>
                <a href="{{ route('admin.roles.index') }}"><i class="mdi mdi-monitor"></i>Roles</a>
            </li>
        @endif

        @if ($isAdmin)
            <li>
                <a href="{{ route('admin.service.index') }}"><i class="mdi mdi-monitor"></i>Services</a>
            </li>
        @else
            @can('service-view')
                <li>
                    <a href="{{ route('admin.service.index') }}"><i class="mdi mdi-monitor"></i>Services</a>
                </li>
            @endcan
        @endif



        </li>


    </ul>
