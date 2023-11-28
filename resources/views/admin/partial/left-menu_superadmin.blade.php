<li class="nav-item {{ request()->is('dashboard')?'active':'' }}">
  <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span>
  </a>
</li>

<li class="nav-item {{ request()->is('students*')?'active':'' }}">
  <a class="nav-link" href="{{ route('students.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Student Information</span>
  </a>
</li>

@if (auth()->user()->type=='Admin')
<li class="nav-item {{ request()->is('user*')?'active':'' }}">
  <a class="nav-link" href="{{ route('user.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Manage Users</span>
  </a>
</li>
@endif