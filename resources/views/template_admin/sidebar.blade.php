<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="index.html">Stisla</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="index.html">St</a>
    </div>
    <ul class="sidebar-menu">
      <li class="menu-header">Dahsboard</li>
       <li class=active><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Dashboard</span></a></li>   
      <li class="menu-header">Starter</li>
      <li class="dropdown">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book-open"></i> <span>Post</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{route('post.index')}}">Daftar Post</a></li>
        <li><a class="nav-link" href="{{route('post.trashed_post')}}">Trashed Post</a></li>
      </ul>
      </li>
      <li class="dropdown">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="far fa-clipboard"></i> <span>Kategori</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{route('category.index')}}">Daftar Kategori</a></li>
      </ul>
      </li>
      <li class="dropdown">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-tags"></i> <span>Tags</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{route('tag.index')}}">Daftar Tags</a></li>
      </ul>
      </li>
      <li class="dropdown">
      <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Users</span></a>
      <ul class="dropdown-menu">
        <li><a class="nav-link" href="{{route('user.index')}}">Daftar User</a></li>
      </ul>
      </li>

              
    </ul>

  </aside>
</div>