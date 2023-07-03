<x-app-layout>
    <x-slot name="header">
        <h2 class="flex-1 font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('auxiliar') }}
        </h2>                    
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-5">
                <div class="px-6 py-4 text-gray-900 dark:text-gray-100 flex justify-between">
                    <p class="font-xl text-gray-800 dark:text-white font-semibold py-2 px-4">Formulario de auxiliar</p>
                    <a class="text-gray-800 dark:text-white font-semibold py-2 px-4 border border-gray-400 rounded shadow hover:bg-gray-200 transition duration-300 ease-in-out"
                    href="{{ route('auxiliares.index') }}" onclick="return confirm('¿Estás seguro de que deseas salir? No se guardarán los cambios')">
                        Atrás
                    </a>                    
                </div>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Tabla --}}
                    {{-- {{ __("Mantenedor de auxiliar") }} --}}
                    <form method="POST" action="{{ route('auxiliares.update', $auxiliar->id) }}" class="max-w-7xl mx-auto">
                        @method('put')
                        @csrf
                        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                          <div>
                            <label for="nombres" class="block">Nombres:</label>
                            <input required type="text" id="nombres" name="nombres" class="w-full dark:text-gray-800" value="{{$auxiliar->nombres}}">
                          </div>
                          <div>
                            <label for="apellidos" class="block">Apellidos:</label>
                            <input required type="text" id="apellidos" name="apellidos" class="w-full dark:text-gray-800" value="{{$auxiliar->apellidos}}">
                          </div>
                          <div>
                            <label for="telefono" class="block">Teléfono:</label>
                            <input required type="text" id="telefono" name="telefono" class="w-full dark:text-gray-800" value="{{$auxiliar->telefono}}">
                          </div>
                          <div>
                            <label for="correo" class="block">Correo:</label>
                            <input required type="email" id="correo" name="correo" class="w-full dark:text-gray-800" value="{{$auxiliar->correo}}">
                          </div>
                          <div>
                            <label for="genero" class="block">Género:</label>
                            <select required id="genero" name="genero" class="w-full dark:text-gray-800">
                              <option value="M"  @if($auxiliar->genero == 'M') selected @endif>Masculino</option>
                              <option value="F" @if($auxiliar->genero == 'F') selected @endif>Femenino</option>
                            </select>
                          </div>
                          <div class="col-span-2 lg:col-span-3">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 border border-blue-500 rounded shadow">
                              Guardar
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