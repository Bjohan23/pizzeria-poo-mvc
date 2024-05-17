<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Insumos
    </h2>
    <div class="flex justify-between mb-4">
        <div>
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
                Nuevo insumo
            </button>
        </div>
        <div>
            <!-- Botón para filtrar -->
            <button id="filtrar-btn" class="block text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800" type="button">
                Filtrar
            </button>
        </div>
    </div>
    <!-- Campos de filtrado (inicialmente ocultos) -->
    <div id="campos-filtro" class="hidden mb-4 flex flex-wrap">
        <div class="w-1/3 md:pr-2 mb-2 md:mb-0">
            <input type="text" placeholder="Tipo" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        </div>
        <div class="w-1/3 md:px-2 mb-2 md:mb-0">
            <input type="text" placeholder="Código" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        </div>
        <div class="w-1/3 md:pl-2 mb-2 md:mb-0">
            <input type="text" placeholder="Nombre" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Tipo</th>
                    <th scope="col" class="px-6 py-3">Código</th>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Categoría</th>
                    <th scope="col" class="px-6 py-3">Precio</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas de ejemplo de insumos -->
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingrediente</td>
                    <td class="px-6 py-4 whitespace-nowrap">INS001</td>
                    <td class="px-6 py-4 whitespace-nowrap">Queso Mozzarella</td>
                    <td class="px-6 py-4 whitespace-nowrap">Queso italiano tradicional para pizza</td>
                    <td class="px-6 py-4 whitespace-nowrap">Quesos</td>
                    <td class="px-6 py-4 whitespace-nowrap">$5.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!-- Botones de acciones (editar y eliminar) -->
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Editar</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingrediente</td>
                    <td class="px-6 py-4 whitespace-nowrap">INS002</td>
                    <td class="px-6 py-4 whitespace-nowrap">Pepperoni</td>
                    <td class="px-6 py-4 whitespace-nowrap">Salchicha italiana picante</td>
                    <td class="px-6 py-4 whitespace-nowrap">Embutidos</td>
                    <td class="px-6 py-4 whitespace-nowrap">$7.99</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <!-- Botones de acciones (editar y eliminar) -->
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full mr-2">Editar</button>
                        <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Eliminar</button>
                    </td>
                </tr>
                <!-- Fin de filas de ejemplo -->
            </tbody>
        </table>
    </div>


    <!-- Formulario para registrar nuevo insumo -->
    <div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Crear nuevo insumo
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Cerrar modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form id="insumoForm" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
                            <input type="text" name="tipo" id="tipo" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Tipo de insumo" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="codigo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Código</label>
                            <input type="text" name="codigo" id="codigo" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Código de insumo" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Nombre de insumo" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea id="descripcion" rows="4" class="bg-gray-900 block p-2.5 w-full text-sm text-gray-900 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Descripción de insumo"></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="categoria" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                            <select id="categoria" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                <option selected="">Seleccionar categoría</option>
                                <!-- Aquí puedes agregar opciones de categorías -->
                                <option value="Quesos">Quesos</option>
                                <option value="Embutidos">Embutidos</option>
                                <option value="Vegetales">Vegetales</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="precio" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Precio</label>
                            <input type="number" name="precio" id="precio" class="bg-gray-900 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Precio de insumo" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Agregar nuevo insumo
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>




<script>
    // Función para mostrar los campos de filtrado al hacer clic en el botón de Filtrar
    document.getElementById('filtrar-btn').addEventListener('click', function() {
        var camposFiltro = document.getElementById('campos-filtro');
        camposFiltro.classList.toggle('hidden');
    });
</script>