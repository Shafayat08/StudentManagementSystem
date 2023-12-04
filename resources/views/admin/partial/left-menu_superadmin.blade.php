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
<li class="nav-item {{ request()->is('fee*')?'active':'' }}">
  <a class="nav-link" href="{{ route('fee.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Manage Fee</span>
  </a>
</li>
<li class="nav-item {{ request()->is('purchase*')?'active':'' }}">
  <a class="nav-link" href="{{ route('purchase.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Manage Purchase</span>
  </a>
</li>

<li class="nav-item {{ request()->is('Manage Exam*')?'active':'' }}">
  <a class="nav-link" href="{{ route('exam.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Manage Exam</span>
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