<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">

        <h4 class="brand-text font-weight-light"><i>WebArtsFactory</i></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">

            <div class="info mx-auto">
                <span  class="text-capitalize text-white">Admin</span>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->




                <li class="nav-header">Order Section</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Orders
                        </p>
                    </a>

                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Cupons
                        </p>
                    </a>

                </li>
                <li class="nav-header">Utils</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-sliders"></i>
                        <p>
                           Carousel
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('carousel.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Carousel List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('slider_item.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Slider Item List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Why Choose Us</p>
                            </a>
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Contact Info</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-laptop"></i>
                        <p>
                            Services
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('services') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service.feature.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service Feature List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('service.project.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Service Project List</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa-solid fa-blog"></i>
                        <p>
                            Blog
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('post.category.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Post Categories</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('blog.list') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Blog Posts</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('brand.list') }}" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Brands
                        </p>
                    </a>
                </li>

                <li class="nav-header">Settings</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Subscribers
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Contacts
                        </p>
                    </a>

                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>

                    </ul>
                </li>








            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
