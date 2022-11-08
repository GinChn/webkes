<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Login Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>
</head>
<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">TAKES.</p>
                <form class="flex flex-col pt-3 md:pt-8" method="POST">
                    {{ csrf_field() }}
                    <div class="flex flex-col pt-4">
                        <label for="username" class="text-lg">Username</label>
                        <input type="text" name="nik" placeholder="Masukkan Username" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
    
                    <div class="flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" name="password" placeholder="Masukkan Password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
    
                    <input type="submit" value="Log In" class="bg-black text-white font-bold text-lg hover:bg-red-700 p-2 mt-8">
                </form>
            </div>
        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block" src="https://source.unsplash.com/IXUM4cJynP0">
        </div>
    </div>

</body>
</html>