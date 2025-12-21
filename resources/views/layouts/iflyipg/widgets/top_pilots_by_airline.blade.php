<div class="card mb-2">
    <div class="card-header p-1">
        <h5 class="m-1">
            Top Pilots
            @if($airline)
                @if($airline->id==$cargo_airline)
                    - Cargo
                @else    
                    - Passenger
                @endif
            @else
                - All Flights 
            @endif
            | {{ $month }}
            {{-- <i class="fas {{ $header_icon }} float-end"></i> --}}
        </h5>
    </div>
    <div class="card-body p-0 table-responsive">
        <table class="table table-sm table-striped table-borderless text-start text-nowrap align-middle mb-0">
            <tr>
                <th>Pilot</th>
                <th class="text-end">Record</th>
            </tr>
                @forelse($pilots as $p)
                    <tr>
                        <td>{{ $p->user->ident }} - {{ $p->user->name_private }}</td>
                        <td class="text-end">{{ $p->flights }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center text-muted">
                            No flights recorded this month.
                        </td>
                    </tr>
                @endforelse
        </table>
    </div>
    <div class="card-footer p-0 px-1 text-end small fw-bold">
        Flights
    </div>
</div>
