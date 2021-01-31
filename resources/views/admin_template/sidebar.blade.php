<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="index.html">Farghani</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">Fg</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header active">Dashboard</li>
          <li class="nav-item dropdown">
            <li class="active"><a href="{{ route('admin') }}" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
            {{-- <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a> --}}
            {{-- <ul class="dropdown-menu">
              <li><a class="nav-link" href="index-0.html">Dashboard</a></li>
              <li><a class="nav-link" href="index.html">Ecommerce Dashboard</a></li>
            </ul> --}}
          </li>
          {{-- <li class="menu-header">Starter</li> --}}
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-scroll"></i> <span>Post</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('post.index') }}"><i class="fas fa-list-ul" style="margin: 0"></i>List Post</a></li>
              <li><a class="nav-link" href="{{ route('post.create') }}"><i class="far fa-plus-square" style="margin: 0"></i>Add Post</a></li>
              <li><a class="nav-link" href="{{ route('post.trash_bin') }}"><i class="far fa-trash-alt" style="margin: 0"></i>Trash Bin</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-stream"></i> <span>Kategory</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('category.index') }}"><i class="fas fa-list-ul" style="margin: 0"></i>List Kategory</a></li>
              <li><a class="nav-link" href="{{ route('category.create') }}"><i class="far fa-plus-square" style="margin: 0"></i>Add Kategory</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fab fa-slack-hash"></i> <span>Tag</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{ route('tag.index') }}"><i class="fas fa-list-ul" style="margin: 0"></i>List Tags</a></li>
              <li><a class="nav-link" href="{{ route('tag.create') }}"><i class="far fa-plus-square" style="margin: 0"></i>Add Tags</a></li>
            </ul>
          </li>
    </aside>
</div>