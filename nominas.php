<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-600">
<div class="max-w-lg mx-auto my-10 bg-white p-8 rounded-xl shadow shadow-slate-300">
    <img src="logo.png" />
    <h1 class="text-center text-4xl	py-10 text-black">Generar Archivo de Nomina BBVA Bancomer</h1>
        <form action="nominas2.php" method="post" enctype="multipart/form-data">
            <div class="flex justify-center items-center w-full">
                <label for="dropzone-file" class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col justify-center items-center pt-5 pb-6">
                        <svg aria-hidden="true" class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Presiona para subir archivo</span></p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">Documento Excel</p>
                    </div>

                    <input type="file" name="dropzone-file" id="dropzone-file" class="hidden">

                </label>
            </div>
            <button class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded mt-5 w-full">

                <input type="submit" value="Subir Documento" name="submit">

            </button>
        </form>
        
        <p class="mt-6">
            <span class="text-sky-400">Notas: </span> el archivo debe estar en formato Excel (.xls version 2003)<br />
            Columna A: Cuenta BBVA<br />
            Columna B: Monto de pago<br />
            Columna C: Nombre del empleado
        </p>
</div>

</body>
</html>




