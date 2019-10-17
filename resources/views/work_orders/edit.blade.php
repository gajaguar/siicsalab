@extends('layouts.edit')

@section('title', 'editar orden de trabajo')
@section('action', route('work_orders.index').'/'.$workOrder->id)
@section('urlToClose', route('work_orders.index').'/'.$workOrder->id)
@section('urlToExit', route('work_orders.index'))
@section('formContent')

  {{-- work id flield --}}
  @component('components.inputs.select')
    @slot('label', 'Obra')
    @slot('fieldName', 'work_id')
    @slot('textHelp', 'workHelp')
    @slot('autofocus', 'true')
    @slot('textDescription', 'Lugar dónde se llevarán a cabo los trabajos.')
    @foreach ($works as $work)
      @component('components.inputs.option')
        @slot('value')
          {{ $work->id }}
        @endslot
        @slot('selected')
          {{ $workOrder->work_id == $work->id ? 'selected' : '' }}
        @endslot
        {{ $work->work_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- id field --}}
  @component('components.inputs.number')
    @slot('label', 'OT')
    @slot('fieldName', 'id')
    @slot('value', $workOrder->id)
    @slot('textHelp', 'idHelp')
    @slot('textDescription', 'Número de órden de trabajo.')
  @endcomponent

  {{-- employee id field --}}
  @component('components.inputs.select')
    @slot('label', 'Personal')
    @slot('fieldName', 'employee_id')
    @slot('textHelp', 'workHelp')
    @slot('textDescription', 'Lugar dónde se llevarán a cabo los trabajos.')
    @foreach ($employees as $employee)
      @component('components.inputs.option')
        @slot('value')
          {{ $employee->id }}
        @endslot
        @slot('selected')
          {{ $workOrder->employee_id == $employee->id ? 'selected' : '' }}
        @endslot
        {{ $employee->employee_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- work order date field --}}
  @component('components.inputs.date')
    @slot('label', 'Fecha')
    @slot('fieldName', 'work_order_date')
    @slot('value', $workOrder->work_order_date)
    @slot('textHelp', 'dateHelp')
    @slot('textDescription', 'Fecha de toma de la muestra.')
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumbs.item')
    @slot('url', route('clients.index'))
    {{ __('clientes') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('clients.index').'/'.$clientId)
    {{ $clientId }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('works.index'))
    {{ __('obras') }}
  @endcomponent
  @component('components.breadcrumbs.item')
  @slot('url', route('works.index').'/'.$workOrder->work_id)
    {{ $workOrder->work_id }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('work_orders.index'))
    {{ __('órdenes de trabajo') }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('url', route('work_orders.index').'/'.$workOrder->id)
    {{ $workOrder->id }}
  @endcomponent
  @component('components.breadcrumbs.item')
    @slot('active', true)
    {{ __('editar') }}
  @endcomponent
@endsection
