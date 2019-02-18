<div class="sidebar-header">
    <a class="header-brand" href="{{ route('admin.dashboards.index') }}">
        <div class="logo-img">
            <img src="{{ backendAsset('images/brand-white.svg') }}" class="header-brand-img" alt="{{ crafted() }}">
        </div>
        <span class="text">{{ crafted() }}</span>
    </a>
    <button type="button" class="nav-toggle">
        <i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i>
    </button>
    <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
</div>

<div class="sidebar-content">
    <div class="nav-container">
        <nav id="main-menu-navigation" class="navigation-main">
            <div class="nav-lavel">{{ lang('site.sidebars.home', false) }}</div>
            <div class="nav-item active">
                <a href="{{ route('admin.dashboards.index') }}">
                    <i class="ik ik-bar-chart-2"></i>
                    <span>{{ lang('site.sidebars.dashboard', false) }}</span>
                </a>
            </div>

            <div class="nav-lavel">Content</div>
            <div class="nav-item has-sub">
                <a href="#"><i class="ik ik-box"></i><span>Blog</span></a>
                <div class="submenu-content">
                    <a href="#" class="menu-item">Pages</a>
                    <a href="#" class="menu-item">Posts</a>
                    <a href="#" class="menu-item">Products</a>
                </div>
            </div>
            <div class="nav-item has-sub">
                <a href="#"><i class="ik ik-gitlab"></i><span>Menu</span></a>
                <div class="submenu-content">
                    <a href="#" class="menu-item">Categories</a>
                    <a href="#" class="menu-item">Tags</a>
                </div>
            </div>

            <div class="nav-item has-sub">
                <a href="#"><i class="ik ik-gitlab"></i><span>Media</span></a>
                <div class="submenu-content">
                    <a href="#" class="menu-item">Library</a>
                    <a href="#" class="menu-item">Galleries</a>
                </div>
            </div>

            <div class="nav-lavel">Appearance</div>
            <div class="nav-item">
                <a href="#"><i class="ik ik-edit"></i><span>Themes</span></a>
            </div>
            <div class="nav-item">
                <a href="#"><i class="ik ik-edit"></i><span>Customize</span></a>
            </div>
            <div class="nav-item">
                <a href="#"><i class="ik ik-menu"></i><span>Navigation</span></a>
            </div>
            <div class="nav-item">
                <a href="javascript:void(0)">
                    <i class="ik ik-layers"></i>
                    <span>Widgets</span>
                    <span class="badge badge-success">3</span>
                </a>
            </div>

            <div class="nav-item has-sub">
                <a href="#">
                    <i class="ik ik-terminal"></i>
                    <span>Plugins</span> <span class="badge badge-danger">5</span>
                </a>
                <div class="submenu-content">
                    <a href="#" class="menu-item">Installed plugins</a>
                    <a href="#" class="menu-item">Add new</a>
                </div>
            </div>

            <div class="nav-lavel">{{ lang('site.sidebars.systems.systems', false) }}</div>
            <div class="nav-item has-sub">
                <a href="#">
                    <i class="ik ik-settings"></i>
                    <span>{{ lang('site.sidebars.systems.settings', false) }}</span>
                </a>
                <div class="submenu-content">
                    <a href="{{ route('admin.settings.general') }}" class="menu-item">
                        {{ lang('site.sidebars.systems.general', false) }}
                    </a>
                    <a href="{{ route('admin.settings.email') }}" class="menu-item">
                        {{ lang('site.sidebars.systems.email', false) }}
                    </a>
                    <a href="{{ route('admin.settings.media') }}" class="menu-item">
                        {{ lang('site.sidebars.systems.media', false) }}
                    </a>
                    <a href="{{ route('admin.settings.language') }}" class="menu-item">
                        {{ lang('site.sidebars.systems.language', false) }}
                    </a>
                </div>
            </div>

            <div class="nav-item has-sub">
                <a href="#">
                    <i class="ik ik-file-text"></i>
                    <span>Accounts</span>
                    <span class="badge badge-success">3</span>
                </a>
                <div class="submenu-content">
                    <a href="#" class="menu-item">Profile</a>
                    <a href="#" class="menu-item">User</a>
                    <a href="#" class="menu-item">Permission</a>
                    <a href="#" class="menu-item">Role</a>
                    <a href="#" class="menu-item">API keys</a>
                </div>
            </div>

            <div class="nav-item has-sub">
                <a href="#">
                    <i class="ik ik-file-text"></i>
                    <span>Tools</span>
                    <span class="badge badge-success">3</span>
                </a>
                <div class="submenu-content">
                    <a href="#" class="menu-item">Import</a>
                    <a href="#" class="menu-item">Export</a>
                </div>
            </div>

            <div class="nav-lavel">Support</div>
            <div class="nav-item">
                <a href="#"><i class="ik ik-monitor"></i><span>Documentation</span></a>
            </div>
            <div class="nav-item">
                <a href="#"><i class="ik ik-help-circle"></i><span>Donate</span></a>
            </div>
        </nav>
    </div>
</div>