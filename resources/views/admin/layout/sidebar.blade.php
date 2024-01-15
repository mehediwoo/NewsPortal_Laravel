@php
    $title = App\Models\footer::first();
@endphp
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link text-center">
      
      <span class="brand-text font-weight-light">{{ $title->website_title }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3">
        <!-- <div class="image">
          <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div> -->
        <div class="info ">
          <a href="#" class=" text-center ml-5">{{ session()->get('name') }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->Is('admin/dashboard*') ? 'active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!-- Category -->
          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('sub-category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Category</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Distric -->
          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Distric & Sub Distric
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('districs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Distric</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('sub-districs.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Sub Distric</p>
                </a>
              </li>
            </ul>
          </li>

          <!-- Distric -->
          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Post
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Post</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('post.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Post</p>
                </a>
              </li>
            </ul>
          </li>
          <!-- Gallery -->
        <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Gallery
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('photo.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Photo Gallery</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('video.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Gallery</p>
                </a>
              </li>
            </ul>
        </li>
          <!-- Page -->
          <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Page
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('page.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Page</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('video.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create Page</p>
                </a>
              </li>
            </ul>
        </li>
        <!-- Setting -->
        <li class="nav-item has-treeview">

            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('social') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Social</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('seo') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>SEO</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('namaz') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Namaz Time</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('tv') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Live TV</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('notice') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Notice Setting</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('google.ads') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Google Ads</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('fb.page') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Facebook Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('footer') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Website Footer
                  </p>
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
