<x-app-layout>
    <x-slot name="header">
        <h2 class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Apoderado') }}
        </h2>                    
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100 flex justify-between">
                    <p class="font-xl text-gray-800 dark:text-white font-semibold py-2 px-4">Formulario de apoderado</p>
                    <a class="text-gray-800 dark:text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow hover:bg-gray-200 transition duration-300 ease-in-out"
                    href="{{ route('apoderados.index') }}">
                        Atrás
                    </a>                    
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Tabla --}}
                    {{-- {{ __("Mantenedor de apoderado") }} --}}
                    <form method="POST" action="{{ route('apoderados.store') }}" class="max-w-7xl mx-auto">
                        @csrf
                        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                          <div>
                            <label for="nombres" class="block">Nombres:</label>
                            <input required type="text" id="nombres" name="nombres" class="w-full">
                          </div>
                          <div>
                            <label for="apellidos" class="block">Apellidos:</label>
                            <input required type="text" id="apellidos" name="apellidos" class="w-full">
                          </div>
                          <div>
                            <label for="telefono" class="block">Teléfono:</label>
                            <input required type="text" id="telefono" name="telefono" class="w-full">
                          </div>
                          <div>
                            <label for="correo" class="block">Correo:</label>
                            <input required type="email" id="correo" name="correo" class="w-full">
                          </div>
                          <div>
                            <label for="fecha" class="block">Fecha de nacimiento:</label>
                            <input required type="date" id="fecha" name="fecha" class="w-full">
                          </div>
                          <div class="col-span-2 lg:col-span-3">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 border border-blue-500 rounded shadow">
                              Guardar
                            </button>
                            <button type="reset" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 border border-gray-300 rounded shadow">
                              Limpiar
                            </button>
                          </div>
                        </div>
                      </form>                      
                    {{-- Fin tabla --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>