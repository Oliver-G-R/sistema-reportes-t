@props([
    'reports' => [],
    'tec' => [],
])


@php
    use Carbon\Carbon;
@endphp

<form action="{{ route('reports.filter', 'fecha') }}" method="GET" class="flex items-center  max-w-sm mx-auto my-4">
    <div class="relative w-full">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 18 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 5v10M3 5a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm0 10a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm12 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm0 0V6a3 3 0 0 0-3-3H9m1.5-2-2 2 2 2" />
            </svg>
        </div>
        <input name="fecha" type="date"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5"
            required />
    </div>
    <button type="submit"
        class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
        <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
        </svg>
    </button>
</form>

<div class="relative overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Descripción
                </th>
                <th scope="col" class="px-6 py-3">
                    Departamento
                </th>
                <th scope="col" class="px-6 py-3">
                    Teléfono
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha
                </th>
                <th scope="col" class="px-6 py-3">
                    Hora
                </th>
                <th scope="col" class="px-6 py-3 ">
                    Tecnico
                </th>
                <th scope="col" class="px-6 py-3 w-[200px]">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($reports as $report)
                <tr class="bg-white border-b ">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                        {{ $report->nombre }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $report->descripcion }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $report->departamento }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $report->telefono }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $report->fecha }}
                    </td>
                    <td class="px-6 py-4">
                        {{ Carbon::parse($report->hora)->format('h:i A') }}
                    </td>

                    <td class="px-6 py-4">
                        @if ($report->tecnico)
                            <p class="  text-green-500 font-semibold">
                                {{ $report->tecnico->nombre }}
                            </p>
                        @else
                            <p class="text-red-500 font-semibold">
                                Sin asignar
                            </p>
                        @endif
                    </td>

                    <td class="px-6 py-4 ">

                        <form action="{{ route('tecnico.asignar', ['id_reporte' => $report->id, 'id_tecnico']) }}"
                            method="GET" class="flex items-center gap-3">
                            <select name="id_tecnico" data-report-id="{{ $report->id }}" id="tecnicos-select"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5 ">

                                <option selected disabled>Asignar</option>
                                @foreach ($tec as $tecnico)
                                    <option value="{{ $tecnico->id }}">{{ $tecnico->nombre }} - {{ $tecnico->area }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit">
                                Guardar
                            </button>
                        </form>


                    </td>


                </tr>
            @empty
                <tr class="bg-white border-b ">
                    <td class="px-6 py-4" colspan="7">
                        No hay reportes
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


<script>
    // (async () => {
    //     const $select = document.querySelectorAll("#tecnicos-select");
    //     const response = await fetch("{{ route('tecnicos.index') }}");
    //     const tecnicos = await response.json();
    //     console.log(tecnicos);
    //     if (response.ok) {
    //         $select.forEach((select) => {
    //             tecnicos.forEach((tecnico) => {
    //                 const option = document.createElement("option");
    //                 option.value = tecnico.id;
    //                 option.textContent = tecnico.nombre;
    //                 select.appendChild(option);
    //             });
    //         });

    //     }

    //     console.log(tecnicos);
    // })();
</script>
