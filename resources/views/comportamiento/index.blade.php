<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Comportamientos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100 flex justify-between">
                    <p class="font-xl text-gray-800 dark:text-white font-semibold py-2 px-4">Toma de comportamiento</p>
                    <a class="text-gray-800 dark:text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow hover:bg-gray-200 transition duration-300 ease-in-out"
                    href="{{ route('comportamientos.show') }}">
                        Por alumno
                    </a>                    
                </div>
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div class="py-5 text-gray-900 dark:text-gray-100 text-5xl">
                            <p>{{Str::title("Comportamientos")}}</p>
                        </div>
                        @if ($enable)
                            <form id="myForm" method="POST" action="{{ route('comportamientos.store') }}" class="max-w-7xl mx-auto">
                                @csrf
                                <div class="grid grid-cols-2 gap-4 lg:grid-cols-4">
                                    {{-- <input type="hidden" name="fecha" value="{{$today}}"> --}}
                                    <div class="col-span-2">
                                        <label for="alumno" class="block">Alumno: </label>
                                        <select required id="alumno" name="alumno" class="w-full dark:text-gray-800" required>
                                        <option value="" disabled selected>Seleccionar</option>
                                        @foreach ($alumnos as $al)
                                            <option value="{{$al->id}}">{{$al->nombres}} {{$al->apellidos}}</option>  
                                        @endforeach
                                        </select>
                                    </div>
                                    <div class="col-span-1">
                                        <label for="fecha" class="block">Fecha:</label>
                                        <input required type="date" id="fecha" name="fecha" class="w-full dark:text-gray-800" value="{{$hoy}}">
                                    </div>
                                    <div class="col-span-2 lg:col-span-1">
                                        <label for="tipo" class="block">Tipo:</label>
                                        <select required id="tipo" class="w-full dark:text-gray-800" required onchange="populateAsuntosDropdown()">
                                        <option value="" selected disabled>Seleccionar</option>
                                        <option value="D">Demérito</option>
                                        <option value="M">Mérito</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2 lg:col-span-1">
                                        <label for="tipo" class="block">Asuntos: </label>
                                        <select required id="asunto" name="asunto" class="w-full dark:text-gray-800" disabled>
                                        <option value="" selected disabled>Seleccionar</option>
                                        </select>
                                    </div>
                                    <div class="col-span-1 lg:col-span-1">
                                        <label for="bimestre" class="block">Bimestre: </label>
                                        <select required id="bimestre" name="bimestre" class="w-full dark:text-gray-800">
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3" selected>3</option>
                                        <option value="4">4</option>
                                        </select>
                                    </div>
                                    <div class="col-span-2">
                                        <label for="tipo" class="block">Observacion </label>
                                        <input type="text" required id="observacion" name="observacion" class="w-full dark:text-gray-800">
                                    </div>
                                    <div class="col-span-2 lg:col-span-3">
                                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 border border-blue-500 rounded shadow">
                                        Guardar
                                        </button>
                                    </div>
                                </div>
                            </form>         
                        @else
                        <div class="p-5 text-gray-900 dark:text-gray-100 text-xl">
                            <p>Día no habilitado</p>
                        </div>
                        @endif
                                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    const dropDownTipo = document.getElementById("tipo");
    const dropDownAsunto = document.getElementById("asunto");
    // const puntosText = document.getElementById("puntos");

    function populateAsuntosDropdown(){
        const demeritos = @json($demeritos);
        const meritos = @json($meritos);
        
        dropDownAsunto.disabled = false;
        // opcion.text="Seleccionar"
        // opcion.value="";
        // dropdown.add(opcion);
        switch(dropDownTipo.value){
            case 'D':
                vaciarDropdown();
                demeritos.forEach(element => {
                    const opcion = document.createElement("option");
                    opcion.text=element.nombre + ' ('+element.puntaje+')';
                    opcion.value=element.id;
                    dropDownAsunto.add(opcion);
                }); break;
            case 'M':
                vaciarDropdown();
                meritos.forEach(element => {
                    const opcion = document.createElement("option");
                    opcion.text=element.nombre + ' (+'+element.puntaje+')';
                    opcion.value=element.id;
                    dropDownAsunto.add(opcion);
                }); break;
            default: vaciarDropdown(); dropDownAsunto.disabled = true;break;
        }
        
    }

    function vaciarDropdown(){
        while(dropDownAsunto.options.length > 1){
            dropDownAsunto.remove(1);
        }
        dropDownAsunto.selectedIndex=0;
    }
    
</script>