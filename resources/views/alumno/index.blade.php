<x-app-layout>
    <x-slot name="header">
        <h2 class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Alumno') }}
        </h2>                    
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100 flex justify-end">
                    <a class="text-gray-800 dark:text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow hover:bg-gray-200 transition duration-300 ease-in-out"
                    href="{{ route('alumnos.create') }}">
                        Registrar alumno
                    </a>                    
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Tabla --}}
                    {{-- {{ __("Mantenedor de alumno") }} --}}
                    <div class="w-full overflow-x-auto">
                        <table class="w-full divide-y divide-gray-700 dark:divide-gray-500">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Nombres</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Apellidos</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Edad</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Fecha Nac</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Genero</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Apoderado</th>
                                    <th class="px-6 py-3 text-center text-md font-semibold text-gray-500 uppercase tracking-wider">Opciones</th>
                                </tr>
                            </thead>
                            <tbody class="dark:bg-gray-800 divide-y divide-gray-700 dark:bg-gray-900 dark:divide-gray-500">
                                @foreach ($alumnos as $item)
                                <tr class="text-center">
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->id}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->nombres}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->apellidos}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->edad()}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->fechaNacimiento}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @switch($item->genero)
                                            @case('M')
                                                {{"Masculino"}}
                                                @break
                                        
                                            @default
                                                {{"Femenino"}}
                                        @endswitch
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{$item->apoderado->nombres}} {{$item->apoderado->apellidos}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex">
                                            <a href="{{route('alumnos.edit', $item->id)}}" class="flex-1 font-medium text-blue-600 dark:text-blue-500 hover:underline"> Editar</a>
                                            <form class="flex-1" action="{{ route('alumnos.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" onclick="return confirm('¿Estás seguro de que deseas eliminar esto?')" class="font-medium text-red-600 dark:text-red-500 hover:underline">Eliminar</button>
                                            </form>                                              
                                        </div>
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- Fin tabla --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>