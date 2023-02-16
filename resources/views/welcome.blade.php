<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Canteen Co.</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen sm:items-center py-4 sm:pt-0" style="background-image:linear-gradient(rgba(13, 13, 13, 0.9), rgba(13, 13, 13, 0.9)), url('https://cdn.pixabay.com/photo/2014/08/14/14/21/shish-kebab-417994_1280.jpg')">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">
                    <svg width="279" height="61" viewBox="0 0 279 61" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M68.5145 28.0168C70.6918 23.4453 75.0488 18.8327 79.3155 16.581C82.7932 14.7456 87.3298 14.467 89.3742 15.9621L90.7933 16.9997L91.1937 20.5557L91.595 24.1117L90.297 29.1794C88.87 34.7474 87.2618 37.0853 84.8573 37.0853H83.2839L83.7825 32.3168C84.0564 29.6939 84.8193 26.5059 85.4778 25.2332C86.1363 23.9598 86.6753 22.3729 86.6753 21.7065V20.4948L84.7251 20.0056L82.7742 19.5157L79.7864 20.9799L76.7979 22.4433L74.4892 26.9926L72.1805 31.542L72.1069 36.4902L72.0333 41.4384L73.1342 44.0478L74.2351 46.6573L76.4583 47.8072C79.4374 49.3482 81.4034 49.2564 85.0259 47.4083C90.4822 44.6248 90.0786 47.8239 84.5669 51.0538L81.0607 53.1084L77.0812 52.7262L73.1026 52.3439L70.9854 50.7926C69.8204 49.9386 68.2224 48.0194 67.4333 46.5267L66 43.8127L66.3221 37.8768L66.645 31.9409L68.5145 28.0168ZM228.307 28.1925C230.455 23.6851 235.082 18.7496 239.191 16.581C242.74 14.7076 247.215 14.4741 249.367 16.0491L250.903 17.1746L250.87 22.5787L250.837 27.9836L249.445 32.0699C248.101 36.0121 247.02 37.0853 244.394 37.0853H243.159L243.657 32.3168C243.931 29.6939 244.694 26.5059 245.353 25.2332C246.011 23.9598 246.55 22.3729 246.55 21.7065V20.4948L244.6 20.0056L242.649 19.5157L239.661 20.9799L236.673 22.4433L234.304 27.1098L231.935 31.7762L231.922 36.6073C231.914 39.2642 232.404 42.6129 233.009 44.0478L234.11 46.6573L236.333 47.8072C239.343 49.364 241.28 49.2556 245.076 47.3189C246.841 46.4182 248.439 45.8326 248.624 46.0185C249.512 46.9066 247.608 49.1978 244.442 51.0538L240.936 53.1084L236.956 52.7262L232.977 52.3439L230.86 50.7926C229.695 49.9386 228.097 48.0194 227.308 46.5267L225.875 43.8127L226.197 37.8768L226.52 31.9409L228.307 28.1925ZM148.483 28.3793L149.831 26.0097C150.572 24.7069 151.754 23.6384 152.457 23.6353L153.734 23.6305L154.257 27.39L154.781 31.1494L153.207 32.4403L151.633 33.7303L150.021 39.5476C149.134 42.7466 148.409 46.1879 148.409 47.1947V49.0245L151.133 46.8512L153.858 44.677L155.142 41.3141C156.534 37.6694 161.069 33.128 163.316 33.128C165.245 33.128 166.613 34.6769 166.613 36.8614V38.6952L162.951 42.2029L159.289 45.7115L159.76 46.939C160.429 48.681 163.022 48.4578 166.193 46.385L168.917 44.6042L170.191 41.2777C171.574 37.6623 176.117 33.128 178.354 33.128C180.283 33.128 181.65 34.6769 181.65 36.8614V38.6952L177.989 42.2029L174.327 45.7115L174.798 46.939L175.269 48.1658L177.075 48.1484C178.068 48.1389 179.771 47.4345 180.859 46.5829C181.947 45.7312 183.152 45.0268 183.537 45.0173C183.92 45.0079 184.937 44.199 185.795 43.2192C186.652 42.2401 188.127 40.548 189.073 39.4597C191.777 36.3461 193.221 35.4367 194.609 35.9694L195.897 36.4633V38.5606C195.897 39.7138 195.564 41.8167 195.158 43.2342L194.418 45.8112L197.811 43.0316C199.678 41.5025 201.964 40.2512 202.893 40.2512H204.581L205.778 43.1139L206.974 45.9766L208.607 45.55L210.24 45.1226L210.683 46.2781C211.208 47.6466 209.011 50.2901 206.752 51.0071L205.152 51.5152L202.573 48.4555L199.993 45.3957L195.134 50.3945C192.462 53.1441 189.848 55.2478 189.327 55.0697L188.378 54.7452L188.412 52.0495C188.431 50.5663 188.738 48.1064 189.094 46.5829L189.742 43.8127L187.476 45.8333C183.446 49.4289 178.769 52.1761 175.882 52.6446L173.061 53.1029L170.884 50.9264L168.709 48.7507L167.067 49.7859C161.1 53.5485 158.7 53.7796 155.791 50.8702L153.747 48.8266L150.454 52.0574C146.95 55.4979 145.246 56.0123 143.665 54.1081L142.685 52.9264L143.245 48.4444L143.805 43.9623L139.493 47.6474C137.121 49.6735 134.807 51.3316 134.352 51.3316C133.897 51.3316 132.444 49.9964 131.123 48.3636L128.721 45.3957L123.593 50.4523L118.465 55.5089L117.212 55.0277C115.668 54.4357 115.66 53.5604 117.157 48.6288C117.806 46.4895 118.179 44.5813 117.985 44.3881C117.792 44.195 115.899 45.5001 113.778 47.288C111.657 49.0767 109.169 50.5402 108.248 50.5402C106.553 50.5402 104.489 48.9731 103.914 47.2501L103.599 46.3058L99.4194 49.6102C93.5657 54.2371 92.3888 54.0234 91.7209 48.2117L91.3726 45.1756L97.0118 40.028C100.113 37.1969 103.859 34.2305 105.334 33.4367L108.016 31.9915L108.991 32.9658L109.966 33.9409L103.662 40.3936L97.36 46.8464L100.793 44.142C108.008 38.4593 108.836 38.3485 108.836 43.068V45.7914H110.372H111.909L116.066 41.0688C120.794 35.6979 122.082 34.9539 123.758 36.6295L124.943 37.8151L123.722 42.2037L122.5 46.5916L125.94 43.4218C127.831 41.6774 130.111 40.2512 131.006 40.2512H132.633L134.268 43.0213C135.3 44.7714 135.735 45.529 136.305 45.6499C136.749 45.744 137.274 45.4525 138.226 44.943C139.726 44.1404 146.035 35.1724 146.035 33.8419C146.035 33.4992 144.522 33.1098 142.671 32.9753L139.307 32.7323L139.057 30.5558L138.806 28.3793H143.645H148.483ZM251.299 46.8021C251.299 46.0518 253.515 43.2025 256.223 40.4704C261.059 35.5911 262.593 34.7181 263.567 36.2939C263.836 36.7292 264.917 37.0853 265.969 37.0853H267.883L269.158 39.0315L270.434 40.9785L269.917 43.3315C269.633 44.6256 268.029 47.2421 266.353 49.1464L263.307 52.6074L260.39 53.5026L257.472 54.3977L255.573 53.6759L253.673 52.9541V50.5599V48.1658H252.486H251.299V46.8021ZM259.949 49.7487C262.525 49.7487 266.086 45.1764 265.235 42.9596C264.997 42.3406 264.473 41.8341 264.069 41.8341C262.96 41.8341 258.422 47.2627 258.422 48.5892V49.7487H259.949ZM272.668 50.4278C272.668 50.0233 273.244 48.8148 273.947 47.7423L275.225 45.7914H277.112L279 48.1856V50.5797L277.028 51.3292C274.939 52.1231 272.668 51.6537 272.668 50.4278Z" fill="white"/>
                        <g clip-path="url(#clip0_206_9)">
                        <path d="M44.4792 27.9583L40.6667 53.375H20.3334L16.5209 27.9583M15.25 20.3333V17.7917C15.25 16.4435 15.7856 15.1505 16.7389 14.1972C17.6922 13.2439 18.9852 12.7083 20.3334 12.7083H40.6667C42.0149 12.7083 43.3079 13.2439 44.2612 14.1972C45.2145 15.1505 45.75 16.4435 45.75 17.7917V20.3333M38.125 12.7083V7.625M12.7084 27.9583H48.2917V20.3333H12.7084V27.9583Z" stroke="#9E0B0F" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_206_9">
                        <rect width="61" height="61" fill="white"/>
                        </clipPath>
                        </defs>
                        </svg>

                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Tentang</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi a quasi obcaecati labore incidunt! Blanditiis, omnis! Excepturi, facilis consectetur. Amet, tempore? Delectus aspernatur velit corporis iusto nobis. Amet ut nihil ex ratione possimus. Doloribus, ex tenetur, dolorum, aut deserunt repudiandae id veritatis beatae accusamus quos perspiciatis iusto blanditiis culpa nostrum.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Tentang</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis repellendus repudiandae eius alias error id maiores ab excepturi assumenda rerum quo dolorum ex nesciunt est at quis, accusamus quod fugiat asperiores quasi, pariatur, corrupti hic. Molestias perferendis ipsam maxime assumenda!
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Tentang</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus vel optio autem nostrum totam culpa nihil, ut minus, id molestiae quod maxime alias dolorem perspiciatis tempora dolor doloribus est temporibus.
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Tentang</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum, sapiente sint? Dolore, quod. Possimus, obcaecati vitae! Doloremque provident corrupti repellat perspiciatis consequuntur a, magni doloribus praesentium, dolores aut, similique reprehenderit facere quas culpa optio pariatur eligendi cumque tempora perferendis quos ipsam quidem voluptatem. Reprehenderit, autem. Porro accusantium nam praesentium perspiciatis?
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                            <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor" class="-mt-px w-5 h-5 text-gray-400">
                                <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>

                            <a href="https://laravel.bigcartel.com" class="ml-1 underline">
                                Shop
                            </a>

                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="ml-4 -mt-px w-5 h-5 text-gray-400">
                                <path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                            </svg>

                            <a href="https://github.com/sponsors/taylorotwell" class="ml-1 underline">
                                Sponsor
                            </a>
                        </div>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </div>
                </div> --}}
            </div>
        </div>
    </body>
</html>
