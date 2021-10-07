@extends('reports.template')
@section('content')
<table class="w-100 ">
    <tr>
        <th class="w-15 text-left no-padding no-margins align-middle" >
            <img src="{{ public_path('img/logo.png') }}" style=" width: 120px;">
        </th>
        <th class="w-50 align-center text-center">
            <span class="font-semibold uppercase leading-tight " >
                {{ $institution ?? '' }} <br>
                {{-- {{ $direction ?? '  DE BENEFICIOS ECONÓMICOS' }} <br>
                {{ $unit ?? 'UNIDAD DE OTORGACIÓN DE FONDO DE RETIRO POLICIAL, CUOTA MORTUORIA Y AUXILIO MORTUORIO' }} --}}
            </span>
        </th>
        <th class="w-20 no-padding  align-center">

            <img src="{{ public_path('img/logoempleo.png') }}" style=" width: 120px;">
        </th>
    </tr>
    {{-- <tr class="no-border"><td colspan="3" class="no-border" style="border-bottom: 1px solid #22292f;"></td></tr> --}}
    <tr>
        <td colspan="3" class="font-bold text-center text-md uppercase">
            {{ $title }}
            @if (isset($subtitle))
            <br><span class="font-medium">{{ $subtitle ?? '' }}</span>
            @endif
        </td>
    </tr>
    {{-- <tr><td colspan="3"></td></tr>
    <tr><td colspan="3"></td></tr> --}}
 

</table>

<br>
<table class="table-info align-top no-padding no-margins border w-40">
    <tr>
        <td class="text-center bg-grey-darker text-xs text-white w-50 ">Nombre de la empresa:</td>
        <td class="text-xs uppercase">  asda sasdas</td>
    </tr>
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">NIT de la empresa:</td>
        <td class="text-xs uppercase"> asdasd </td>
    </tr>
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Periodo de Reposicion:</td>
        <td class="text-xs uppercase"> asdasd </td>
    </tr>
    <tr>
        <td  class="text-center bg-grey-darker text-xs text-white">Beneficiario SIGEP:</td>
        <td class="text-xs uppercase"> asdasd </td>
    </tr>

</table>

<br>
<table class="table-info w-100">
    <thead class="bg-grey-darker">
        <tr class="font-medium text-white text-sm">
            <td class="px-15 py text-center text-xxs ">
                Nro.
            </td>
            <td class="px-15 py text-center  text-xxs">
                Nombre del Benefeciario
            </td>
            <td class="px-15 py text-center text-xxs">
                CI del Beneficiario
            </td>
            <td class="px-15 py text-center text-xxs">
                Fecha inicio de contrato
            </td>
            <td class="px-15 py text-center text-xxs">
                Dias Cotizados
            </td>
            <td class="px-15 py text-center text-xxs">
                Salario Basico
            </td>
            <td class="px-15 py text-center text-xxs">
                Descuentos
            </td>
            <td class="px-15 py text-center text-xxs">
                Bonificaciones
            </td>
            <td class="px-15 py text-center text-xxs">
                Salario Asignado
            </td>
            </td>
            <td class="px-15 py text-center text-xxs">
                Paquete
            </td>
            </td>
            <td class="px-15 py text-center text-xxs">
                Total Ganado (Bs)
            </td>
            <td class="px-15 py text-center text-xxs">
                Total Percibido (Bs)
            </td>
            <td class="px-15 py text-center text-xxs">
                Reposicion total PAE (Bs)
            </td>
        </tr>
    </thead>
    <tbody>

        {{-- @foreach ($forms as $item)
            <tr class="text-sm">
                <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $count++ }}</td>
                <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{  Carbon\Carbon::parse($item->created_at, 'UTC')->format('d-m-Y') }}</td>
                @if($item->article_income_item_id!=null and $item->type == 'Entrada')
                    <td class="text-center text-xxs font-bold px-5 py-3">{{ $item->type .' (NIº'.$item->article_income_item->article_income->correlative.')' }}</td>
                @else
                    <td class="text-center text-xxs font-bold px-5 py-3">{{ $item->type .' (NSº '.$item->article_request_item->article_request->correlative_out.')' }}</td>
                @endif

                @if($item->article_income_item_id!=null and $item->type == 'Entrada')
                    <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->article_income_item->quantity??'' }}</td>
                @else
                    <td></td>
                @endif
                <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $item->quantity_desc??'' }}</td>
                @if($item->type == 'Entrada')
                    <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $quantity += $item->article_income_item->quantity }}</td>
                @else
                    <td class="text-center text-xxs uppercase font-bold px-5 py-3">{{ $quantity -= number_format((float)$item->quantity_desc, 2, '.', '') }}</td>
                @endif
            </tr>
        @endforeach --}}
    </tbody>
</table>
<br>
<br>
<br>
<br>
<table>
    <tr>
        <td class="text-right text-xxs">Elaborado por</td>
        <td class="text-left text-xxs">  .......................................</td>
        <td class="text-right text-xxs">Aprobado por</td>
        <td class="text-left text-xxs">  .......................................</td>
    </tr>

</table>



@endsection