<nav id="column-left" class="active"><div id="profile">
  <div><a class="dropdown-toggle" data-toggle="dropdown"><img src="http://localhost/opencart/image/cache/no_image-45x45.png" alt="John Doe" title="admin" class="img-circle"></a></div>
  <div>
    <h4>Dashboard</h4>
    <small>Administrator</small></div>
</div>
<ul id="menu">
  <li id="dashboard"><a href="{{URL::route('index')}}"></i> <span>Dashboard</span></a></li>
  <li id="catalog"><a class="parent"><i class="fa fa-tags fa-fw"></i> <span>Catalog</span></a>
    <ul class="collapse">
      <li><a href="{{URL::route('admin.category.index')}}">Categories</a></li>
      <li><a href="{{URL::route('admin.hotel.index')}}">Hotel</a></li>
      <li><a href="{{URL::route('admin.tour.index')}}">Tour</a></li>
      <li><a class="parent">Attribute's Hotel</a>
        <ul class="collapse">
          <li><a href="{{URL::route('admin.attribute.hotel.index')}}">Attribute's</a></li>
          <li><a href="{{URL::route('admin.attributegroup.hotel.index')}}">Attribute Groups</a></li>
        </ul>
      </li>
      <li><a class="parent">Attribute's Room</a>
        <ul class="collapse">
          <li><a href="{{URL::route('admin.attribute.room.index')}}">Attribute's</a></li>
          <li><a href="{{URL::route('admin.attributegroup.room.index')}}">Attribute Groups</a></li>
        </ul>
      </li>
    </ul>
  </li>
  <li id="system"><a class="parent"><i class="fa fa-cog fa-fw"></i> <span>System</span></a>
    <ul class="collapse">
      <li><a href="{{URL::route('admin.setting.index')}}">Settings</a></li>
      <li><a class="parent">Users</a>
        <ul class="collapse">
          <li><a href="{{URL::route('admin.user.index')}}">Users</a></li>
          <li><a href="{{URL::route('admin.usergroup.index')}}">User Groups</a></li>
          <li><a href="http://localhost/opencart/admin/index.php?route=user/api&amp;token=e5a6e2694ad0f502984880d4e0e5e400">API</a></li>
        </ul>
      </li>
      <li><a class="parent">Localisation</a>
        <ul class="collapse">
          <li><a href="{{URL::route('admin.language.index')}}">Languages</a></li>
          <li><a href="{{URL::route('admin.currency.index')}}">Currenies</a></li>
        </ul>
      </li>
    </ul>
  </li>
</ul>
<div id="stats">
  <ul>
    <li>
      <div>Orders Completed <span class="pull-right">35%</span></div>
      <div class="progress">
        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100" style="width: 35%"> <span class="sr-only">35%</span> </div>
      </div>
    </li>
    <li>
      <div>Orders Processing <span class="pull-right">0%</span></div>
      <div class="progress">
        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%"> <span class="sr-only">0%</span> </div>
      </div>
    </li>
    <li>
      <div>Other Statuses <span class="pull-right">65%</span></div>
      <div class="progress">
        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100" style="width: 65%"> <span class="sr-only">65%</span> </div>
      </div>
    </li>
  </ul>
</div>
</nav>