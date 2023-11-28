<li class="nav-item {{ request()->is(['passenger*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('passenger.create') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Join a Tour</span>
    </a>
  </li>
  
  <li class="nav-item {{ request()->is(['payment_passenger*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('payment_passenger.create') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Add Payment</span>
    </a>
  </li>
  
  <li class="nav-item {{ request()->is(['special_request*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('special_request.create') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Special request</span>
    </a>
  </li>
  
  <li class="nav-item {{ request()->is(['flight_arrangement*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('flight_arrangement.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Flight Arrangement</span>
    </a>
  </li>

  
  <li class="nav-item {{ request()->is(['hotel_arrangement*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('hotel_arrangement.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Hotel Arrangement</span>
    </a>
  </li>

  <li class="nav-item {{ request()->is(['itinerary*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('itinerary.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Daily Itinerary</span>
    </a>
  </li>

  <li class="nav-item {{ request()->is(['financial_report*'])?'active':'' }}">
    <a class="nav-link" href="{{ route('financial_report.index') }}">
        <i class="fas fa-fw fa-user"></i>
        <span>Financial Report</span>
    </a>
  </li>

