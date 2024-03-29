@extends('layouts.app')

@section('content')
  @component('components.container')

    {{-- header --}}
    @component('components.heading_title')
      {{ __('panel de control') }}
    @endcomponent

    {{-- nav --}}
    @component('components.nav')
      @yield('navLinks')
    @endcomponent

    @component('components.rule_top')
    @endcomponent

    {{-- main --}}
    <div class="row row-cols-1 row-cols-md-3 mt-4">
      @foreach ($statuses as $status)
        <div class="col mb-4">
          <div class="card h-100 shadow border-left-primary-lg">
            <div class="card-body">
              <h5 class="card-title mb-2 text-uppercase">{{ $status->sample_status_name }}</h5>
              <a
                href="{{ '/statuses/'.$status->id }}"
                class="h6 card-link mb-2 text-muted"
              >
                {{ $status->samples.' ensayes' }}
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @endcomponent
@endsection
