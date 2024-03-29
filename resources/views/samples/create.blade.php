@extends('layouts.create')

{{-- header --}}
@section('title', 'nuevo ensaye')

{{-- nav --}}
@section('urlToExit', route('samples.index'))

{{-- main --}}
@section('action', route('samples.store'))
@section('formContent')
  @component('components.form_row')

    {{-- work order id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Orden de trabajo')
      @slot('fieldName', 'work_order_id')
      @slot('value', old('work_order_id'))
      @slot('autofocus', 'true')
      @slot('textDescription', 'Orden de trabajo a la que pertenece el ensaye.')
      @component('components.input_select_option')
        @slot('value', '')
        {{ __('SELECCIONAR') }}
      @endcomponent
      @foreach ($workOrders as $workOrder)
        @component('components.input_select_option')
          @slot('value')
            {{ $workOrder->id }}
          @endslot
          @slot('selected')
            {{ old('work_order_id') == $workOrder->id ? 'selected' : '' }}
          @endslot
          {{ $workOrder->id }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- id field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Ensaye')
      @slot('fieldName', 'id')
      @slot('value', old('id'))
      @slot('textDescription', 'Número de ensaye.')
    @endcomponent

    {{-- sample time field --}}
    @component('components.input_time')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Hora')
      @slot('fieldName', 'sample_time')
      @slot('value', old('sample_time'))
      @slot('textDescription', 'Hora en la que se tomó la muestra.')
    @endcomponent
  @endcomponent

  {{-- sample description field --}}
  @component('components.input_list')
    @slot('label', 'Descripción')
    @slot('fieldName', 'sample_description')
    @slot('value', old('sample_description'))
    @slot('maxLength', '250')
    @slot('textDescription', 'Información petrográfica del material.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_description')
    @foreach ($descriptions as $description)
      @component('components.input_select_option')
        @slot('value')
          {{ $description->sample_description }}
        @endslot
        {{ $description->sample_description }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample treatment field --}}
  @component('components.input_list')
    @slot('label', 'Tratamiento')
    @slot('fieldName', 'sample_treatment')
    @slot('value', old('sample_treatment'))
    @slot('maxLength', '100')
    @slot('textDescription', 'Realizado sobre el material, previo al muestreo.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_treatment')
    @foreach ($treatments as $treatment)
      @component('components.input_select_option')
        @slot('value')
          {{ $treatment->sample_treatment }}
        @endslot
        {{ $treatment->sample_treatment }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample location field --}}
  @component('components.input_list')
    @slot('label', 'Localización')
    @slot('fieldName', 'sample_location')
    @slot('value', old('sample_location'))
    @slot('maxLength', '100')
    @slot('textDescription', 'Ubicación general de la muestra.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_location')
    @foreach ($locations as $location)
      @component('components.input_select_option')
        @slot('value')
          {{ $location->sample_location }}
        @endslot
        {{ $location->sample_location }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample road name field --}}
  @component('components.input_list')
    @slot('label', 'Camino')
    @slot('fieldName', 'sample_road_name')
    @slot('value', old('sample_road_name'))
    @slot('maxLength', '100')
    @slot('textDescription', 'Anotarlo si la muestra fue tomada en un camino o vía.')
  @endcomponent
  @component('components.input_text_datalist')
    @slot('fieldName', 'sample_road_name')
    @foreach ($roadNames as $roadName)
      @component('components.input_select_option')
        @slot('value')
          {{ $roadName->sample_road_name }}
        @endslot
        {{ $roadName->sample_road_name }}
      @endcomponent
    @endforeach
  @endcomponent
  @component('components.form_row')

    {{-- sample road station start field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento inicio')
      @slot('fieldName', 'sample_road_station_start')
      @slot('value', old('sample_road_station_start'))
      @slot('maxLength', '11')
      @slot('textDescription', 'Inicio del tramo que representa la muestra.')
    @endcomponent

    {{-- sample road station end field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento fin')
      @slot('fieldName', 'sample_road_station_end')
      @slot('value', old('sample_road_station_end'))
      @slot('maxLength', '11')
      @slot('textDescription', 'Fin del tramo que representa la muestra.')
    @endcomponent

    {{-- sample road station field --}}
    @component('components.input_text')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cadenamiento muestra')
      @slot('fieldName', 'sample_road_station')
      @slot('value', old('sample_road_station'))
      @slot('maxLength', '11')
      @slot('textDescription', 'Kilometraje exacto donde se tomó la muestra.')
    @endcomponent
  @endcomponent
  @component('components.form_row')

    {{-- sample road body field --}}
    @component('components.input_list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Cuerpo')
      @slot('fieldName', 'sample_road_body')
      @slot('value', old('sample_road_body'))
      @slot('maxLength', '20')
      @slot('textDescription', 'Designación del cuerpo del camino.')
    @endcomponent
    @component('components.input_text_datalist')
      @slot('fieldName', 'sample_road_body')
      @foreach ($roadBodies as $roadBody)
        @component('components.input_select_option')
          @slot('value')
            {{ $roadBody->sample_road_body }}
          @endslot
          {{ $roadBody->sample_road_body }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample road side field --}}
    @component('components.input_list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Lado')
      @slot('fieldName', 'sample_road_side')
      @slot('value', old('sample_road_side'))
      @slot('maxLength', '10')
      @slot('textDescription', 'Lado o desviación del camino.')
    @endcomponent
    @component('components.input_text_datalist')
      @slot('fieldName', 'sample_road_side')
      @foreach ($roadSides as $roadSide)
        @component('components.input_select_option')
          @slot('value')
            {{ $roadSide->sample_road_side }}
          @endslot
          {{ $roadSide->sample_road_side }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample road stripe field --}}
    @component('components.input_list')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Franja')
      @slot('fieldName', 'sample_road_stripe')
      @slot('value', old('sample_road_stripe'))
      @slot('maxLength', '10')
      @slot('textDescription', 'Sección longitudinal.')
    @endcomponent
    @component('components.input_text_datalist')
      @slot('fieldName', 'sample_road_stripe')
      @foreach ($roadStripes as $roadStripe)
        @component('components.input_select_option')
          @slot('value')
            {{ $roadStripe->sample_road_stripe }}
          @endslot
          {{ $roadStripe->sample_road_stripe }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent

  {{-- sample location complement field --}}
  @component('components.input_list')
    @slot('label', 'Complemento de localización')
    @slot('fieldName', 'sample_location_complement')
    @slot('value', old('sample_location_complement'))
    @slot('maxLength', '100')
    @slot('textDescription', 'Datos adicionales sobre la ubicación de la muestra.')
  @endcomponent

  {{-- bank id field --}}
  @component('components.input_select')
    @slot('label', 'Banco')
    @slot('fieldName', 'bank_id')
    @slot('value', old('bank_id'))
    @slot('textDescription', 'Banco de donde procede el material.')
    @component('components.input_select_option')
      @slot('value', '')
      {{ __('NO ESPECIFICADO') }}
    @endcomponent
    @foreach ($banks as $bank)
      @component('components.input_select_option')
        @slot('value')
          {{ $bank->id }}
        @endslot
        @slot('selected')
          {{ old('bank_id') == $bank->id ? 'selected' : '' }}
        @endslot
        {{ $bank->bank_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample purpose id field --}}
  @component('components.input_select')
    @slot('label', 'Para utilizar en')
    @slot('fieldName', 'sample_purpose_id')
    @slot('value', old('sample_purpose_id'))
    @slot('textDescription', 'Empleo que se le dará al material.')
    @component('components.input_select_option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($purposes as $purpose)
      @component('components.input_select_option')
        @slot('value')
          {{ $purpose->id }}
        @endslot
        @slot('selected')
          {{ old('sample_purpose_id') == $purpose->id ? 'selected' : '' }}
        @endslot
        {{ $purpose->sample_purpose_name }}
      @endcomponent
    @endforeach
  @endcomponent
  @component('components.form_row')

    {{-- sample phreatic level field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'N. A. F.')
      @slot('fieldName', 'sample_phreatic_level')
      @slot('value', old('sample_phreatic_level'))
      @slot('textDescription', 'Nivel freático.')
    @endcomponent

    {{-- sampling seq field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Muestreo')
      @slot('fieldName', 'sampling_seq')
      @slot('value', old('sampling_seq'))
      @slot('textDescription', 'Número de muestreo.')
    @endcomponent

    {{-- sample seq field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Muestra')
      @slot('fieldName', 'sample_seq')
      @slot('value', old('sample_seq'))
      @slot('textDescription', 'Número de muestra.')
    @endcomponent

    {{-- sampling env temp field --}}
    @component('components.input_number')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Temperatura')
      @slot('fieldName', 'sampling_env_temp')
      @slot('value', old('sampling_env_temp'))
      @slot('textDescription', 'Temperatura ambiente.')
    @endcomponent
  @endcomponent

  {{-- sample weather id field --}}
  @component('components.input_select')
    @slot('label', 'Clima')
    @slot('fieldName', 'sample_weather_id')
    @slot('value', old('sample_weather_id'))
    @slot('textDescription', 'Condiciones climáticas al momento de tomar la muestra.')
    @component('components.input_select_option')
      @slot('value', '')
      {{ __('SELECCIONAR') }}
    @endcomponent
    @foreach ($weathers as $weather)
      @component('components.input_select_option')
        @slot('value')
          {{ $weather->id }}
        @endslot
        @slot('selected')
          {{ old('sample_weather_id') == $weather->id ? 'selected' : '' }}
        @endslot
        {{ $weather->sample_weather_name }}
      @endcomponent
    @endforeach
  @endcomponent

  {{-- sample tests field --}}
  @component('components.input_text')
    @slot('label', 'Pruebas')
    @slot('fieldName', 'sample_tests')
    @slot('value', old('sample_tests'))
    @slot('maxLength', '100')
    @slot('textDescription', 'Estudios que se ralizarán al material.')
  @endcomponent

  {{-- sammple notes field --}}
  @component('components.input_textarea')
    @slot('label', 'Notas')
    @slot('fieldName', 'sample_notes')
    @slot('value', old('sample_notes'))
    @slot('maxLength', '500')
    @slot('textDescription', 'Cualquier observación o comentario adicional.')
  @endcomponent
  @component('components.form_row')

    {{-- sample receipt date field --}}
    @component('components.input_date')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Recibido')
      @slot('fieldName', 'sample_receipt_date')
      @slot('value', old('sample_receipt_date'))
      @slot('textDescription', 'Fecha de recibido en el laboratorio.')
    @endcomponent

    {{-- sample priority id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Prioridad')
      @slot('fieldName', 'sample_priority_id')
      @slot('value', old('sample_priority_id'))
      @slot('textDescription', 'Relevancia con respecto de los demás trabajos.')
      @foreach ($priorities as $priority)
        @component('components.input_select_option')
          @slot('value')
            {{ $priority->id }}
          @endslot
          @slot('selected')
            {{ old('sample_priority_id') == $priority->id ? 'selected' : '' }}
          @endslot
          {{ $priority->sample_priority_name }}
        @endcomponent
      @endforeach
    @endcomponent

    {{-- sample status id field --}}
    @component('components.input_select')
      @slot('style', 'col-12 col-md')
      @slot('label', 'Estado')
      @slot('fieldName', 'sample_status_id')
      @slot('value', old('sample_status_id'))
      @slot('textDescription', 'Empleo que se le dará al material.')
      @foreach ($statuses as $status)
        @component('components.input_select_option')
          @slot('value')
            {{ $status->id }}
          @endslot
          @slot('selected')
            {{ old('sample_status_id') == $status->id ? 'selected' : '' }}
          @endslot
          {{ $status->sample_status_name }}
        @endcomponent
      @endforeach
    @endcomponent
  @endcomponent
@endsection

{{-- footer --}}
@section('breadcrumb')
  @component('components.breadcrumb_item')
    @slot('url', route('samples.index'))
    {{ __('ensayes') }}
  @endcomponent
  @component('components.breadcrumb_item')
    @slot('active', true)
    {{ __('nuevo') }}
  @endcomponent
@endsection
