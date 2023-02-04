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
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
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
                    <svg width="293" height="64" viewBox="0 0 293 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="64" height="64" fill="#9E0B0F"/>
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M82.5145 24.0168C84.6918 19.4453 89.0488 14.8327 93.3155 12.581C96.7932 10.7456 101.33 10.467 103.374 11.9621L104.793 12.9997L105.194 16.5557L105.595 20.1117L104.297 25.1794C102.87 30.7474 101.262 33.0853 98.8573 33.0853H97.2839L97.7825 28.3168C98.0564 25.6939 98.8193 22.5059 99.4778 21.2332C100.136 19.9598 100.675 18.3729 100.675 17.7065V16.4948L98.7251 16.0056L96.7742 15.5157L93.7864 16.9799L90.7979 18.4433L88.4892 22.9926L86.1805 27.542L86.1069 32.4902L86.0333 37.4384L87.1342 40.0478L88.2351 42.6573L90.4583 43.8072C93.4374 45.3482 95.4034 45.2564 99.0259 43.4083C104.482 40.6248 104.079 43.8239 98.5669 47.0538L95.0607 49.1084L91.0812 48.7262L87.1026 48.3439L84.9854 46.7926C83.8204 45.9386 82.2224 44.0194 81.4333 42.5267L80 39.8127L80.3221 33.8768L80.645 27.9409L82.5145 24.0168ZM242.307 24.1925C244.455 19.6851 249.082 14.7496 253.191 12.581C256.74 10.7076 261.215 10.4741 263.367 12.0491L264.903 13.1746L264.87 18.5787L264.837 23.9836L263.445 28.0699C262.101 32.0121 261.02 33.0853 258.394 33.0853H257.159L257.657 28.3168C257.931 25.6939 258.694 22.5059 259.353 21.2332C260.011 19.9598 260.55 18.3729 260.55 17.7065V16.4948L258.6 16.0056L256.649 15.5157L253.661 16.9799L250.673 18.4433L248.304 23.1098L245.935 27.7762L245.922 32.6073C245.914 35.2642 246.404 38.6129 247.009 40.0478L248.11 42.6573L250.333 43.8072C253.343 45.364 255.28 45.2556 259.076 43.3189C260.841 42.4182 262.439 41.8326 262.624 42.0185C263.512 42.9066 261.608 45.1978 258.442 47.0538L254.936 49.1084L250.956 48.7262L246.977 48.3439L244.86 46.7926C243.695 45.9386 242.097 44.0194 241.308 42.5267L239.875 39.8127L240.197 33.8768L240.52 27.9409L242.307 24.1925ZM162.483 24.3793L163.831 22.0097C164.572 20.7069 165.754 19.6384 166.457 19.6353L167.734 19.6305L168.257 23.39L168.781 27.1494L167.207 28.4403L165.633 29.7303L164.021 35.5476C163.134 38.7466 162.409 42.1879 162.409 43.1947V45.0245L165.133 42.8512L167.858 40.677L169.142 37.3141C170.534 33.6694 175.069 29.128 177.316 29.128C179.245 29.128 180.613 30.6769 180.613 32.8614V34.6952L176.951 38.2029L173.289 41.7115L173.76 42.939C174.429 44.681 177.022 44.4578 180.193 42.385L182.917 40.6042L184.191 37.2777C185.574 33.6623 190.117 29.128 192.354 29.128C194.283 29.128 195.65 30.6769 195.65 32.8614V34.6952L191.989 38.2029L188.327 41.7115L188.798 42.939L189.269 44.1658L191.075 44.1484C192.068 44.1389 193.771 43.4345 194.859 42.5829C195.947 41.7312 197.152 41.0268 197.537 41.0173C197.92 41.0079 198.937 40.199 199.795 39.2192C200.652 38.2401 202.127 36.548 203.073 35.4597C205.777 32.3461 207.221 31.4367 208.609 31.9694L209.897 32.4633V34.5606C209.897 35.7138 209.564 37.8167 209.158 39.2342L208.418 41.8112L211.811 39.0316C213.678 37.5025 215.964 36.2512 216.893 36.2512H218.581L219.778 39.1139L220.974 41.9766L222.607 41.55L224.24 41.1226L224.683 42.2781C225.208 43.6466 223.011 46.2901 220.752 47.0071L219.152 47.5152L216.573 44.4555L213.993 41.3957L209.134 46.3945C206.462 49.1441 203.848 51.2478 203.327 51.0697L202.378 50.7452L202.412 48.0495C202.431 46.5663 202.738 44.1064 203.094 42.5829L203.742 39.8127L201.476 41.8333C197.446 45.4289 192.769 48.1761 189.882 48.6446L187.061 49.1029L184.884 46.9264L182.709 44.7507L181.067 45.7859C175.1 49.5485 172.7 49.7796 169.791 46.8702L167.747 44.8266L164.454 48.0574C160.95 51.4979 159.246 52.0123 157.665 50.1081L156.685 48.9264L157.245 44.4444L157.805 39.9623L153.493 43.6474C151.121 45.6735 148.807 47.3316 148.352 47.3316C147.897 47.3316 146.444 45.9964 145.123 44.3636L142.721 41.3957L137.593 46.4523L132.465 51.5089L131.212 51.0277C129.668 50.4357 129.66 49.5604 131.157 44.6288C131.806 42.4895 132.179 40.5813 131.985 40.3881C131.792 40.195 129.899 41.5001 127.778 43.288C125.657 45.0767 123.169 46.5402 122.248 46.5402C120.553 46.5402 118.489 44.9731 117.914 43.2501L117.599 42.3058L113.419 45.6102C107.566 50.2371 106.389 50.0234 105.721 44.2117L105.373 41.1756L111.012 36.028C114.113 33.1969 117.859 30.2305 119.334 29.4367L122.016 27.9915L122.991 28.9658L123.966 29.9409L117.662 36.3936L111.36 42.8464L114.793 40.142C122.008 34.4593 122.836 34.3485 122.836 39.068V41.7914H124.372H125.909L130.066 37.0688C134.794 31.6979 136.082 30.9539 137.758 32.6295L138.943 33.8151L137.722 38.2037L136.5 42.5916L139.94 39.4218C141.831 37.6774 144.111 36.2512 145.006 36.2512H146.633L148.268 39.0213C149.3 40.7714 149.735 41.529 150.305 41.6499C150.749 41.744 151.274 41.4525 152.226 40.943C153.726 40.1404 160.035 31.1724 160.035 29.8419C160.035 29.4992 158.522 29.1098 156.671 28.9753L153.307 28.7323L153.057 26.5558L152.806 24.3793H157.645H162.483ZM265.299 42.8021C265.299 42.0518 267.515 39.2025 270.223 36.4704C275.059 31.5911 276.593 30.7181 277.567 32.2939C277.836 32.7292 278.917 33.0853 279.969 33.0853H281.883L283.158 35.0315L284.434 36.9785L283.917 39.3315C283.633 40.6256 282.029 43.2421 280.353 45.1464L277.307 48.6074L274.39 49.5026L271.472 50.3977L269.573 49.6759L267.673 48.9541V46.5599V44.1658H266.486H265.299V42.8021ZM273.949 45.7487C276.525 45.7487 280.086 41.1764 279.235 38.9596C278.997 38.3406 278.473 37.8341 278.069 37.8341C276.96 37.8341 272.422 43.2627 272.422 44.5892V45.7487H273.949ZM286.668 46.4278C286.668 46.0233 287.244 44.8148 287.947 43.7423L289.225 41.7914H291.112L293 44.1856V46.5797L291.028 47.3292C288.939 48.1231 286.668 47.6537 286.668 46.4278Z" fill="white"/>
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
