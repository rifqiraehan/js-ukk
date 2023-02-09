<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
    <footer class="text-gray-600 body-font">
        <div class="container px-5 py-4 mx-auto flex items-center sm:flex-row flex-col">
          {{-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-red-500 rounded-full" viewBox="0 0 24 24">
          <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
              <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
              <span class="ml-3 text-xl">Canteen Co.</span>
            </a>
          </svg> --}}
          <svg width="187" height="41" viewBox="0 0 187 41" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M45.9219 17.893C47.3812 14.8289 50.3015 11.7373 53.1613 10.2281C55.4922 8.99793 58.5329 8.8112 59.9031 9.81327L60.8543 10.5087L61.1227 12.8922L61.3917 15.2756L60.5217 18.6722C59.5652 22.4041 58.4873 23.9712 56.8757 23.9712H55.8211L56.1553 20.775C56.3389 19.017 56.8502 16.8803 57.2916 16.0273C57.733 15.1737 58.0942 14.1101 58.0942 13.6635V12.8513L56.7871 12.5235L55.4795 12.1951L53.4769 13.1765L51.4739 14.1573L49.9265 17.2065L48.3791 20.2557L48.3297 23.5722L48.2804 26.8888L49.0183 28.6378L49.7562 30.3867L51.2463 31.1575C53.243 32.1904 54.5607 32.1288 56.9887 30.8902C60.6458 29.0245 60.3753 31.1687 56.681 33.3335L54.331 34.7107L51.6638 34.4544L48.9971 34.1982L47.578 33.1585C46.7972 32.5861 45.7261 31.2997 45.1973 30.2992L44.2366 28.4802L44.4525 24.5016L44.6689 20.5231L45.9219 17.893ZM153.023 18.0107C154.463 14.9897 157.564 11.6816 160.318 10.2281C162.697 8.97247 165.696 8.81598 167.138 9.87162L168.168 10.626L168.146 14.2481L168.124 17.8707L167.19 20.6095C166.29 23.2518 165.565 23.9712 163.805 23.9712H162.977L163.312 20.775C163.495 19.017 164.007 16.8803 164.448 16.0273C164.889 15.1737 165.25 14.1101 165.25 13.6635V12.8513L163.943 12.5235L162.636 12.1951L160.633 13.1765L158.63 14.1573L157.042 17.285L155.455 20.4127L155.446 23.6508C155.441 25.4316 155.769 27.676 156.175 28.6378L156.912 30.3867L158.403 31.1575C160.42 32.201 161.718 32.1283 164.262 30.8302C165.446 30.2265 166.516 29.834 166.64 29.9586C167.236 30.5538 165.96 32.0896 163.837 33.3335L161.487 34.7107L158.82 34.4544L156.153 34.1982L154.734 33.1585C153.953 32.5861 152.882 31.2997 152.354 30.2992L151.393 28.4802L151.609 24.5016L151.825 20.5231L153.023 18.0107ZM99.5207 18.1359L100.425 16.5477C100.921 15.6745 101.713 14.9584 102.184 14.9562L103.04 14.9531L103.391 17.4728L103.742 19.9926L102.687 20.8578L101.632 21.7225L100.552 25.6215C99.9573 27.7657 99.4714 30.0722 99.4714 30.7469V31.9734L101.297 30.5167L103.123 29.0595L103.984 26.8055C104.917 24.3627 107.956 21.3188 109.463 21.3188C110.756 21.3188 111.672 22.3569 111.672 23.821V25.0501L109.218 27.4012L106.764 29.7528L107.079 30.5756C107.528 31.7432 109.266 31.5936 111.391 30.2043L113.217 29.0107L114.071 26.7811C114.998 24.3579 118.042 21.3188 119.542 21.3188C120.835 21.3188 121.751 22.3569 121.751 23.821V25.0501L119.297 27.4012L116.843 29.7528L117.159 30.5756L117.474 31.3978L118.685 31.3862C119.35 31.3798 120.492 30.9077 121.221 30.3369C121.95 29.7661 122.758 29.294 123.016 29.2876C123.273 29.2812 123.954 28.7391 124.529 28.0824C125.103 27.4262 126.092 26.292 126.726 25.5626C128.539 23.4757 129.506 22.8662 130.437 23.2232L131.3 23.5542V24.96C131.3 25.7329 131.077 27.1424 130.805 28.0924L130.309 29.8197L132.583 27.9566C133.834 26.9318 135.367 26.0931 135.989 26.0931H137.121L137.923 28.0118L138.725 29.9305L139.819 29.6446L140.913 29.3582L141.21 30.1326C141.563 31.0498 140.09 32.8216 138.575 33.3022L137.503 33.6428L135.775 31.592L134.045 29.5412L130.789 32.8917C128.998 34.7345 127.246 36.1445 126.896 36.0252L126.26 35.8077L126.283 34.0009C126.296 33.0068 126.502 31.358 126.741 30.3369L127.174 28.4802L125.656 29.8345C122.955 32.2445 119.82 34.0858 117.885 34.3998L115.994 34.7069L114.535 33.2481L113.077 31.7899L111.977 32.4837C107.978 35.0056 106.369 35.1605 104.419 33.2105L103.049 31.8408L100.842 34.0062C98.4932 36.3122 97.3511 36.657 96.2917 35.3807L95.635 34.5886L96.01 31.5846L96.3856 28.5805L93.495 31.0504C91.9052 32.4084 90.3546 33.5197 90.0496 33.5197C89.7446 33.5197 88.7706 32.6248 87.8852 31.5305L86.2752 29.5412L82.8383 32.9304L79.4013 36.3196L78.5616 35.9971C77.5266 35.6003 77.5213 35.0136 78.5245 31.7082C78.9594 30.2743 79.2093 28.9953 79.0799 28.8659C78.9504 28.7364 77.6815 29.6112 76.2599 30.8095C74.8382 32.0084 73.1704 32.9893 72.5534 32.9893C71.4171 32.9893 70.0336 31.9389 69.6485 30.7841L69.4374 30.1512L66.6359 32.366C62.7125 35.4671 61.9237 35.3239 61.476 31.4286L61.2426 29.3937L65.0222 25.9435C67.1012 24.046 69.6114 22.0577 70.6002 21.5257L72.398 20.557L73.051 21.21L73.7045 21.8636L69.4798 26.1886L65.2556 30.5135L67.5563 28.7009C72.3927 24.8921 72.9476 24.8178 72.9476 27.981V29.8064H73.9772H75.0069L77.7935 26.6411C80.962 23.0412 81.8256 22.5426 82.9486 23.6656L83.7433 24.4603L82.9248 27.4018L82.1057 30.3427L84.4112 28.2182C85.679 27.049 87.2073 26.0931 87.8067 26.0931H88.8974L89.9934 27.9497C90.6852 29.1228 90.9767 29.6306 91.3587 29.7116C91.656 29.7746 92.0081 29.5792 92.6463 29.2377C93.6515 28.6998 97.88 22.689 97.88 21.7973C97.88 21.5676 96.8657 21.3066 95.6254 21.2164L93.3709 21.0535L93.2033 19.5947L93.0351 18.1359H96.2779H99.5207ZM168.433 30.4838C168.433 29.9809 169.919 28.0712 171.733 26.24C174.975 22.9696 176.003 22.3845 176.656 23.4407C176.836 23.7324 177.561 23.9712 178.266 23.9712H179.549L180.404 25.2756L181.259 26.5806L180.912 28.1577C180.722 29.025 179.647 30.7788 178.524 32.0551L176.482 34.3749L174.526 34.9748L172.571 35.5748L171.298 35.091L170.025 34.6072V33.0025V31.3978H169.229H168.433V30.4838ZM174.231 32.4588C175.958 32.4588 178.344 29.3942 177.774 27.9084C177.615 27.4935 177.263 27.154 176.993 27.154C176.249 27.154 173.208 30.7926 173.208 31.6816V32.4588H174.231ZM182.756 32.9139C182.756 32.6429 183.142 31.8328 183.613 31.114L184.47 29.8064H185.735L187 31.4111V33.0158L185.679 33.5181C184.278 34.0502 182.756 33.7356 182.756 32.9139Z" fill="#343434"/>
            <g clip-path="url(#clip0_204_14)">
            <path d="M31.8123 17.8538L29.2569 34.8893H15.6285L13.0732 17.8538M12.2214 12.7431V11.0396C12.2214 10.1359 12.5803 9.26933 13.2193 8.63037C13.8583 7.99141 14.7249 7.63245 15.6285 7.63245H29.2569C30.1605 7.63245 31.0272 7.99141 31.6661 8.63037C32.3051 9.26933 32.664 10.1359 32.664 11.0396V12.7431M27.5534 7.63245V4.22534M10.5178 17.8538H34.3676V12.7431H10.5178V17.8538Z" stroke="#9E0B0F" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </g>
            <defs>
            <clipPath id="clip0_204_14">
            <rect width="40.8853" height="40.8853" fill="white" transform="translate(0 0.114685)"/>
            </clipPath>
            </defs>
            </svg>


          <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4">© 2020 Canteen Co. —
            <a href="https://twitter.com/knyttneve" class="text-gray-600 ml-1" rel="noopener noreferrer" target="_blank">SMK Negeri 2 Surabaya</a>
          </p>
          <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start">
            <a class="text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
              </svg>
            </a>
            <a class="ml-3 text-gray-500">
              <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
                <circle cx="4" cy="4" r="2" stroke="none"></circle>
              </svg>
            </a>
          </span>
        </div>
    </footer>
</html>
