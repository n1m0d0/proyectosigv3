<h3>Reporte del {{\Carbon\Carbon::now()->toDateTimeString()}}</h3>
<table class="table">
    <thead>
        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
            <th class="whitespace-nowrap">#</th>
            <th class="whitespace-nowrap">Combre Completo</th>
            <th class="whitespace-nowrap">CI</th>
            <th class="whitespace-nowrap">Genero</th>
            <th class="whitespace-nowrap">Es Padre/Madre/Ambos</th>
            <th class="whitespace-nowrap">Estado Civil</th>
            <th class="whitespace-nowrap">Fecha de Nacimiento</th>
            <th class="whitespace-nowrap">Edad</th>
            <th class="whitespace-nowrap">Departamento</th>
            <th class="whitespace-nowrap">Estado</th>
            <th class="whitespace-nowrap">fecha de registro</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($people as $person)
            <tr>
                <td class="border-b dark:border-dark-5">{{ $person->id }}</td>
                <td class="border-b dark:border-dark-5 uppercase">{{ $person->nombres }}
                    {{ $person->paterno }} {{ $person->materno }}</td>
                <td class="border-b dark:border-dark-5">{{ $person->ci }} {{ $person->expedido }}</td>
                <td class="border-b dark:border-dark-5">
                    @if ($person->genero == 'M')
                        Femenino
                    @else
                        Masculino
                    @endif
                </td>
                <td class="border-b dark:border-dark-5">
                    @if ($person->hijos == 1)
                        Si
                    @else
                        No
                    @endif
                </td>
                <td class="border-b dark:border-dark-5">
                    {{ $person->estado_civil }}
                </td>
                <td class="border-b dark:border-dark-5">
                    {{ $person->nacimiento }}
                </td>
                <td class="border-b dark:border-dark-5">
                    @if (\Carbon\Carbon::parse($person->nacimiento)->age > 35)
                        <div class="text-theme-6">
                            {{ $person->edad }}
                        </div>
                    @else
                        @if ($person->edad == \Carbon\Carbon::parse($person->nacimiento)->age)
                            {{ $person->edad }}
                        @else
                            <div class="text-theme-6">
                                {{ $person->edad }}
                            </div>
                        @endif
                    @endif
                </td>
                <td class="border-b dark:border-dark-5">
                    {{ $person->department->nombre }}
                </td>
                <td class="border-b dark:border-dark-5">
                    {{ $person->estado }}
                </td>
                <td class="border-b dark:border-dark-5">
                    {{ $person->created_at }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
