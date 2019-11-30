<!-- sidebar menu: : style can be found in sidebar.less -->
<ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="{{ \App\Utils::checkRoute(['dashboard::index', 'admin::index']) ? 'active': '' }}">
        <a href="{{ route('dashboard::index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    @if (Auth::user()->can('viewList', \App\User::class))
        <li class="{{ \App\Utils::checkRoute(['admin::users.index', 'admin::users.create']) ? 'active': '' }}">
            <a href="{{ route('admin::users.index') }}">
                <i class="fa fa-user-secret"></i> <span>Users</span>
            </a>
        </li>
    @endif
    @if (Auth::user()->can('manage', \App\Models\Movies::class))
       <li class="{{ \App\Utils::checkRoute(['admin::movies.index', 'admin::movies.create']) ? 'active': '' }}">
           <a href="{{ route('admin::movies.index') }}">
               <i class="fa fa-tags"></i> <span>Movies</span>
           </a>
       </li>
   @endif
   @if (Auth::user()->can('manage', \App\Models\Genre::class))
      <li class="{{ \App\Utils::checkRoute(['admin::genre.index', 'admin::genre.create']) ? 'active': '' }}">
          <a href="{{ route('admin::genre.index') }}">
              <i class="fa fa-tags"></i> <span>Genre</span>
          </a>
      </li>
  @endif
</ul>
