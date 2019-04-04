<div class="sidebar-header">
    <a class="header-brand" href="{{ route('admin.dashboards.index') }}">
        <div class="logo-img">
            <img src="{{ backendAsset('images/brand-white.png') }}" class="header-brand-img" alt="{{ crafted() }}">
        </div>
        <span class="text">{{ crafted() }}</span>
    </a>
    <button type="button" class="nav-toggle">
        <i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i>
    </button>
    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
</div>

<div class="sidebar-content">
    <vue-sidebar></vue-sidebar>
</div>