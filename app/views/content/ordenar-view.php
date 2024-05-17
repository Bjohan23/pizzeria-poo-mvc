<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        Realizar orden
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mt-6">
        <?php
        $mesas = [
            ['mesa' => ['idMesa' => 1, 'total' => 50, 'atiende' => 'Juan', 'cliente' => 'Cliente 1', 'estado' => 'ocupada'], 'insumos' => [['codigo' => 'A1', 'nombre' => 'Insumo 1', 'caracteristicas' => 'Desc 1', 'cantidad' => 2, 'precio' => 10, 'estado' => 'pendiente']]],
            ['mesa' => ['idMesa' => 2, 'total' => null, 'atiende' => null, 'cliente' => null, 'estado' => 'libre'], 'insumos' => []],
            ['mesa' => ['idMesa' => 3, 'total' => 30, 'atiende' => 'Pedro', 'cliente' => 'Cliente 2', 'estado' => 'ocupada'], 'insumos' => [['codigo' => 'B2', 'nombre' => 'Insumo 2', 'caracteristicas' => 'Desc 2', 'cantidad' => 3, 'precio' => 10, 'estado' => 'entregado']]],
            ['mesa' => ['idMesa' => 4, 'total' => null, 'atiende' => null, 'cliente' => null, 'estado' => 'libre'], 'insumos' => []],
            ['mesa' => ['idMesa' => 5, 'total' => 20, 'atiende' => 'Maria', 'cliente' => 'Cliente 3', 'estado' => 'ocupada'], 'insumos' => [['codigo' => 'C3', 'nombre' => 'Insumo 3', 'caracteristicas' => 'Desc 3', 'cantidad' => 1, 'precio' => 20, 'estado' => 'pendiente']]],
        ];

        foreach ($mesas as $mesa) { ?>
            <div class="bg-white p-4 rounded-lg shadow-md">
                <div class="text-xl font-semibold text-gray-700">
                    Mesa #<?php echo $mesa['mesa']['idMesa']; ?>
                    <?php if ($mesa['mesa']['total']) { ?>
                        <span class="text-2xl font-bold float-right">S/<?php echo $mesa['mesa']['total']; ?></span>
                    <?php } ?>
                </div>
                <?php if ($mesa['mesa']['atiende']) { ?>
                    <p><strong>Atiende:</strong> <?php echo $mesa['mesa']['atiende']; ?></p>
                <?php } ?>
                <?php if ($mesa['mesa']['cliente']) { ?>
                    <p><strong>Cliente:</strong> <?php echo $mesa['mesa']['cliente']; ?></p>
                <?php } ?>

                <?php if ($mesa['mesa']['estado'] === 'ocupada') { ?>
                    <details class="mt-4">
                        <summary class="cursor-pointer text-gray-700 font-medium">Insumos en la orden</summary>
                        <div class="mt-2">
                            <table class="min-w-full bg-white">
                                <thead>
                                    <tr>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Código</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Nombre</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Características</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Cantidad</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b">Subtotal</th>
                                        <th class="py-2 px-4 bg-gray-100 border-b"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mesa['insumos'] as $insumo) { ?>
                                        <tr>
                                            <td class="py-2 px-4 border-b"><?php echo $insumo['codigo']; ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo $insumo['nombre']; ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo $insumo['caracteristicas']; ?></td>
                                            <td class="py-2 px-4 border-b"><?php echo $insumo['cantidad']; ?> X S/<?php echo $insumo['precio']; ?></td>
                                            <td class="py-2 px-4 border-b">S/<?php echo $insumo['cantidad'] * $insumo['precio']; ?></td>
                                            <td class="py-2 px-4 border-b">
                                                <?php if ($insumo['estado'] === 'pendiente') { ?>
                                                    <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                <?php } elseif ($insumo['estado'] === 'entregado') { ?>
                                                    <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                    </svg>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </details>
                <?php } ?>

                <div class="mt-4 text-center">
                    <?php if ($mesa['mesa']['estado'] === 'libre') { ?>
                        <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="ocuparMesa(<?php echo $mesa['mesa']['idMesa']; ?>)">Ocupar</button>
                    <?php } elseif ($mesa['mesa']['estado'] === 'ocupada') { ?>
                        <div class="flex justify-center space-x-2">
                            <button class="bg-green-500 text-white px-4 py-2 rounded" onclick="cobrar(<?php echo $mesa['mesa']['idMesa']; ?>)">Cobrar</button>
                            <button class="bg-blue-500 text-white px-4 py-2 rounded" onclick="agregarInsumos(<?php echo $mesa['mesa']['idMesa']; ?>)">Agregar insumos</button>
                            <button class="bg-yellow-500 text-white px-4 py-2 rounded" onclick="marcarInsumosEntregados(<?php echo $mesa['mesa']['idMesa']; ?>)">Marcar entrega</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded" onclick="cancelarOrden(<?php echo $mesa['mesa']['idMesa']; ?>)">Cancelar</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<script>
    function ocuparMesa(idMesa) {
        // Lógica para ocupar mesa
        console.log('Ocupar mesa', idMesa);
    }

    function cobrar(idMesa) {
        // Lógica para cobrar mesa
        console.log('Cobrar mesa', idMesa);
    }

    function agregarInsumos(idMesa) {
        // Lógica para agregar insumos a la mesa
        console.log('Agregar insumos a mesa', idMesa);
    }

    function marcarInsumosEntregados(idMesa) {
        // Lógica para marcar insumos como entregados
        console.log('Marcar insumos como entregados en mesa', idMesa);
    }

    function cancelarOrden(idMesa) {
        // Lógica para cancelar la orden
        console.log('Cancelar orden en mesa', idMesa);
    }
</script>