<ul class="menu-inner py-1">
    <!-- Dashboard -->
    <li class="menu-item active">
        <a href="{{url('/')}}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
        </a>
    </li>

    <!-- Layouts -->
    <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-layout"></i>
            <div data-i18n="Layouts">Projects</div>
        </a>

        <ul class="menu-sub">
            <li class="menu-item">
                <a href="{{route('project.index')}}" class="menu-link">
                    <div data-i18n="Without menu">List Project</div>
                </a>
            </li>
        </ul>
    </li>

</ul>