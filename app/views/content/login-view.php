<div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
    <form method="post" action="" autocomplete="off" class=" flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
        <div class="flex flex-col overflow-y-auto md:flex-row">
            <div class="h-32 md:h-auto md:w-1/2">
                <!-- <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="<?php echo APP_URL; ?>app/views/assets/img/login-pizza-w.jpg" alt="Office1" /> -->
                <video autoplay loop muted class="object-cover w-full h-full dark:hidden">
                    <source src="<?php echo APP_URL; ?>app/views/assets/img/video-login-w.mp4" type="video/mp4" />
                </video>
                <!-- <img alt=""> -->
                <!-- <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="<?php APP_URL; ?>app/views/assets/img/login-pizza.jpg" alt="Office2" /> -->
                <!-- mostrar video -->
                <video autoplay loop muted class="hidden object-cover w-full h-full dark:block">
                    <source src="<?php echo APP_URL; ?>app/views/assets/img/video-login.mp4" type="video/mp4" />
                </video>
            </div>
            <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                <div class="w-full">
                    <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                        Login
                    </h1>
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Usuario</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" name="usuario" type="text" />
                    </label>
                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Password</span>
                        <input class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" name="contraseña" type="password" />
                    </label>

                    <!-- You should use a button here, as the anchor is only used for the example  -->
                    <a class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" href="<?php echo APP_URL; ?>inicio">
                        Enviar
                    </a>
                    <!-- boton para enviar -->
                    <!-- <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Iniciar sesión
                    </button> -->


                    <hr class="my-8" />
                    <p class="mt-4">
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./forgot-password.html">
                            ¿Olvidaste tu contraseña?
                        </a>
                    </p>
                    <p class="mt-1">
                        <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./create-account.html">
                            Crear una cuenta
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </form>
</div>