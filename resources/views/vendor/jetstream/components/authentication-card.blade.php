<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0" style="background-image:linear-gradient(rgba(214, 214, 214, 0.5), rgba(214, 214, 214, 0.5)), url('https://cdn.pixabay.com/photo/2014/08/14/14/21/shish-kebab-417994_1280.jpg')">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
