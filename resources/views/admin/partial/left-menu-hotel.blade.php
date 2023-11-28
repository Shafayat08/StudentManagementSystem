{{-- Airline Ticket  --}}

  
<li class="nav-item {{ request()->is(['hotel_reservation.index'])?'active':'' }}">
  <a class="nav-link" href="{{ route('hotel_reservation.index') }}">
      <i class="fas fa-fw fa-user"></i>
      <span>Hotel Reservation</span>
  </a>
</li>
