<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Nuevo Usuario
    </h2>

    <form method="post" action="<?php echo APP_URL ?>app/ajax/usuarioAjax.php" enctype="multipart/form-data" class=" FormularioAjax px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <input type="hidden" name="modulo_usuario" id="" value="registrar">
        
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Nombre</span>
            <input type="text" name="nombre" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane" />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Apellido</span>
            <input type="text" name="apellido" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Doe" />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Correo Electrónico</span>
            <div class="relative text-gray-500 focus-within:text-purple-600 dark:focus-within:text-purple-400">
                <input class="block w-full pl-10 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" placeholder="janedoe@example.com" type="email" name="email" />
                <div class="absolute inset-y-0 flex items-center ml-3 pointer-events-none">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                    </svg>
                </div>
            </div>
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Usuario</span>
            <input type="text" name="usuario" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="jane_doe123" />
        </label>

        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">Clave</span>
            <input type="password" name="clave" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="********" />
        </label>
        <!-- div que se muestre en el centro  -->
        <div class="flex justify-center mt-6">
            <button type="submit" class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-purple-500 focus:outline-none focus:bg-purple-500">
                Registrar
            </button>
        </div>

    </form>

</div>





<!-- 
<div class="flex flex-col flex-1">
    <main class="h-full pb-16 overflow-y-auto">
        <div class="container px-6 mx-auto grid">
        </div>
    </main>
</div> -->