<div class="main-nav">
    <!-- Sidebar Logo -->
    <div class="logo-box">
        <a href="{{ route("admin.dashboard") }}" class="logo-dark">
            <img
                src="{{ asset("assets/admin/images/logo-sm.png") }}"
                class="logo-sm"
                alt="logo sm"
            />
            <img
                src="{{ asset("assets/admin/images/logo-dark.png") }}"
                class="logo-lg"
                alt="logo dark"
            />
        </a>

        <a href="{{ route("admin.dashboard") }}" class="logo-light">
            <img
                src="{{ asset("assets/admin/images/logo-sm.png") }}"
                class="logo-sm"
                alt="logo sm"
            />
            <img
                src="{{ asset("assets/admin/images/logo-light.png") }}"
                class="logo-lg"
                alt="logo light"
            />
        </a>
    </div>

    <!-- Menu Toggle Button (sm-hover) -->
    <button
        type="button"
        class="button-sm-hover"
        aria-label="Show Full Sidebar"
    >
        <iconify-icon
            icon="iconamoon:arrow-left-4-square-duotone"
            class="button-sm-hover-icon"
        ></iconify-icon>
    </button>

    <div class="scrollbar" data-simplebar>
        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title">General</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.dashboard") }}">
                                <span class="nav-icon">
                                    <iconify-icon
                                        icon="iconamoon:home-duotone"
                                    ></iconify-icon>
                                </span>
                    <span class="nav-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-title">Apps</li>

            <li class="nav-item">
                <a
                    class="nav-link menu-arrow"
                    href="#jobCategories"
                    data-bs-toggle="collapse"
                    role="button"
                    aria-expanded="false"
                    aria-controls="jobCategories"
                >
                                <span class="nav-icon">
                                    <iconify-icon
                                        icon="iconamoon:category-duotone"
                                    ></iconify-icon>
                                </span>
                    <span class="nav-text"> İş Kateqoriyalar </span>
                </a>
                <div class="collapse" id="jobCategories">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route("admin.job-categories.list") }}"
                            >List</a
                            >
                        </li>
                        <li class="sub-nav-item">
                            <a
                                class="sub-nav-link"
                                href="{{ route("admin.job-categories.create") }}"
                            >Əlavə Et</a
                            >
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-title">Manage</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route("admin.users.list") }}">
                                <span class="nav-icon">
                                    <iconify-icon
                                        icon="mdi:users"
                                    ></iconify-icon>
                                </span>
                    <span class="nav-text"> İstifadəçilər </span>
                </a>
            </li>

            <li class="nav-item">
                <a
                    class="nav-link menu-arrow"
                    href="#RolePermission"
                    data-bs-toggle="collapse"
                    role="button"
                    aria-expanded="false"
                    aria-controls="RolePermission"
                >
                                <span class="nav-icon">
                                    <iconify-icon
                                        icon="tabler:lock-access"
                                    ></iconify-icon>
                                </span>
                    <span class="nav-text">Rol & İcazələr</span>
                </a>
                <div class="collapse" id="RolePermission">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route("admin.roles.list") }}"
                            >Rollar</a
                            >
                        </li>
                        <li class="sub-nav-item">
                            <a
                                class="sub-nav-link"
                                href="{{ route("admin.permissions.list") }}"
                            >İcazələr</a
                            >
                        </li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a
                    class="nav-link menu-arrow"
                    href="#Languages"
                    data-bs-toggle="collapse"
                    role="button"
                    aria-expanded="false"
                    aria-controls="Languages"
                >
                                <span class="nav-icon">
                                    <iconify-icon
                                        icon="tabler:language"
                                    ></iconify-icon>
                                </span>
                    <span class="nav-text">Dil & Tərcümə</span>
                </a>
                <div class="collapse" id="Languages">
                    <ul class="nav sub-navbar-nav">
                        <li class="sub-nav-item">
                            <a class="sub-nav-link" href="{{ route("admin.languages.list") }}"
                            >Dillər</a
                            >
                        </li>
                        <li class="sub-nav-item">
                            <a
                                class="sub-nav-link"
                                href="#"
                            >
                                Tərcümələr
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="menu-title">Main</li>

            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                                <span class="nav-icon">
                                    <iconify-icon
                                        icon="iconamoon:settings-duotone"
                                    ></iconify-icon>
                                </span>
                    <span class="nav-text"> Parametrlər </span>
                    <span class="badge badge-pill text-end bg-danger">Hot</span>
                </a>
            </li>
        </ul>
    </div>
</div>
