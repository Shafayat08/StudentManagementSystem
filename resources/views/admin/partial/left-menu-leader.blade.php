<li class="nav-item {{ request()->is(['tour_booking*'])?'active':'' }}">
  <a class="nav-link" href="{{ route('tour_booking.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Tour Info</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="#">
      <i class="fas fa-fw fa-user"></i>
      <span>Generate a Brochure</span>
  </a>
</li>

{{-- <li class="nav-item {{ request()->is(['ticket_list*'])?'active':'' }}">
  <a class="nav-link" href="{{ route('ticket_list.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Tour Info</span>
  </a>
</li> --}}

<li class="nav-item {{ request()->is(['passenger*'])?'active':'' }}">
  <a class="nav-link" href="{{ route('passenger.create') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Add a passenger</span>
  </a>
</li>

<li class="nav-item {{ request()->is(['financial_report*'])?'active':'' }}">
  <a class="nav-link" href="{{ route('financial_report.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Passenger's Fin. Rep.</span>
  </a>
</li>

{{-- <li class="nav-item {{ request()->is(['ticket_list*'])?'active':'' }}">
  <a class="nav-link" href="{{ route('ticket_list.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Special request</span>
  </a>
</li> --}}