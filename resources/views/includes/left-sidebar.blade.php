<aside class="left-sidebar">
    {{-- Sidebar scroll--}}
    <div class="scroll-sidebar">
        {{-- Sidebar navigation--}}
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li>
                    <a href="{{ route('home') }}"><i class="mdi mdi-gauge"></i> Dashboard</a>
                </li>
                @role('admin')
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-clipboard-account"></i><span class="hide-menu"> Accounts</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.users.index') }}"><i class="mdi mdi-account"></i> Data User</a>
                        </li>
                        <li><a href="#"><i class="mdi mdi-account-key"></i> Data Level</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-google-maps"></i><span class="hide-menu"> Locations</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.provinces.index') }}"><i class="mdi mdi-map-marker-radius"></i>
                                Data Province</a>
                        </li>
                        <li><a href="{{ route('admin.cities.index') }}"><i class="mdi mdi-city"></i> Data City</a></li>
                    </ul>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false">
                        <i class="mdi mdi-home-modern"></i><span class="hide-menu"> Data Rooms</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('admin.roomtypes.index') }}"><i class="mdi mdi-clipboard-text"></i> Room
                                Types</a>
                        </li>
                        <li><a href="{{ route('admin.facilities.index') }}"><i class="mdi mdi-playlist-check"></i> Type
                                Facilities</a></li>
                        <li><a href="{{ route('admin.rooms.index') }}"><i class="mdi mdi-hotel"></i> Room List</a></li>
                    </ul>
                </li>
                <li>
                    <a href="{{ route('admin.hotels.index') }}"><i class="mdi mdi-hotel"></i> Hotel List</a>
                </li>
                @else
                <li>
                    <a href="{{ route('rooms.index') }}"><i class="mdi mdi-home-modern"></i> Room List</a>
                </li>
                <li>
                    <a href="{{ route('reservations.index') }}"><i class="mdi mdi-clipboard-text"></i> Reservation</a>
                </li>
                @endrole
            </ul>
        </nav>
        {{-- End Sidebar navigation --}}
    </div>
    {{-- End Sidebar scroll--}}
</aside>
