<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>{{ $title??'' }}</title>
    {{-- <link rel="stylesheet" href="{{ public_path('css/materialicons.css') }}" media="all" /> --}}
    <link rel="stylesheet" href="{{ public_path('css/wkhtml.css') }}" media="all" />
</head>

<body style="border:none">
    <div style=" padding: 15px;">

    
            <table class="w-100 ">
                <tr>
                    <th class="w-15 text-left no-padding no-margins align-middle">
                     
                        <img src="{{$document_type->logo??''}}" style=" width: 148px;">
                    </th>
                    <th class="w-50 align-center text-left">

                        <p  >
                            <div class="font-thin text-xxxs uppercase no-paddings">
                               <strong class="font-semibold text-xxs uppercase leading-tight"><h5>ANEXO 2: CUADRO DETALLE DE SOLICITUD DE RESPOSICION POR SALARIO</h5></strong>
                               
                            </div>
                        </p>
                        
                        
                    </th>
                    <th class="w-20 no-padding  align-center">

                        <table class="table-code align-top no-padding no-margins">
                            <tbody>
                                <tr>
                                    <td class="text-center bg-grey-darker text-xxs text-white">Fecha de Emisión</td>
                                    <td class="text-xs"></td>
                                </tr>
                                <tr>
                                    <td class="text-center bg-grey-darker text-xxs text-white">Usuario</td>
                                    <td class="text-xs"></td>
                                </tr>

                                <tr>
                                    <td class="text-center bg-grey-darker text-xxs text-white">Nota #</td>
                                    <td class="text-xs"></td>
                                </tr>

                            </tbody>
                        </table>

                    </th>
                </tr>
                <tr class="no-border">
                    <td colspan="3" class="no-border" style="border-bottom: 1px solid #22292f;"></td>
                </tr>
                

            </table>
                        
            <br>
            <footer class="text-right text-xxs">
               MINISTERIO DE PLANIFICACION DEL DESARROLLO
            </footer>
            
    </div>
</body>

</html>

