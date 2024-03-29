<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Acer Service Reports</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
            <!-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">


<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="40.000000pt" height="30.000000pt" viewBox="0 0 2525.000000 1991.000000"
 preserveAspectRatio="xMidYMid meet">
<g transform="translate(0.000000,1991.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M16800 19883 c-382 -26 -589 -49 -910 -99 -2645 -416 -6130 -2101
-9410 -4548 -1667 -1244 -3162 -2610 -4291 -3921 -1168 -1357 -1906 -2629
-2109 -3634 -78 -385 -81 -760 -10 -1105 79 -384 266 -788 543 -1175 601 -838
1660 -1638 3157 -2384 402 -201 617 -300 1030 -477 2574 -1100 6034 -1963
9361 -2334 727 -82 1206 -121 2039 -167 309 -17 1452 -23 1780 -10 2089 85
3609 485 4775 1256 290 192 501 362 749 605 267 262 443 471 635 755 569 841
905 1868 1036 3160 50 495 70 1343 46 1927 -96 2295 -576 4673 -1334 6603
-869 2213 -2092 3827 -3569 4713 -820 492 -1682 760 -2673 832 -125 9 -729 11
-845 3z m-6840 -7983 l0 -310 6655 0 6655 0 0 -310 0 -310 -6655 0 -6656 0 4
-2327 c5 -2648 0 -2513 91 -2553 49 -22 199 -40 331 -40 l95 0 0 -445 0 -445
-412 0 c-650 0 -993 21 -1154 71 -275 85 -506 310 -568 554 -50 198 -56 478
-56 2963 l0 2222 -2050 0 -2050 0 0 310 0 310 2050 0 2050 0 0 310 0 310 835
0 835 0 0 -310z m-3717 -1195 c346 -41 659 -147 893 -301 160 -106 314 -278
398 -446 77 -152 94 -277 103 -745 l6 -333 -741 0 -742 0 0 223 c0 255 -13
449 -35 522 -26 90 -91 128 -220 128 -141 0 -222 -62 -261 -198 -21 -75 -22
-340 0 -461 19 -110 44 -155 145 -255 131 -130 297 -231 786 -477 704 -355
976 -585 1093 -927 68 -201 92 -377 92 -688 0 -737 -152 -1124 -543 -1384
-325 -217 -817 -323 -1361 -293 -389 21 -688 90 -966 221 -311 148 -515 357
-610 626 -83 235 -110 437 -117 861 l-6 312 739 -2 739 -3 6 -355 c7 -434 21
-533 86 -618 43 -56 99 -75 213 -70 165 6 235 61 266 208 34 161 15 552 -32
670 -37 91 -133 153 -1039 667 -359 204 -631 413 -774 593 -178 225 -270 653
-242 1130 23 384 78 614 193 807 43 72 172 209 257 273 231 173 612 296 1026
330 146 12 489 4 648 -15z m6562 15 c495 -36 900 -184 1202 -440 227 -191 421
-525 478 -823 45 -232 47 -300 52 -1302 7 -1398 -13 -1719 -123 -2036 -126
-363 -402 -678 -739 -847 -399 -199 -1037 -262 -1640 -161 -486 81 -809 262
-1013 568 -192 286 -266 587 -292 1176 -13 306 -13 1758 0 2016 43 830 228
1247 690 1556 344 230 832 333 1385 293z m5141 -1 c274 -27 487 -122 659 -293
157 -155 230 -312 269 -576 39 -259 39 -259 43 -2498 l4 -2192 -833 2 -833 3
-6 2175 c-6 2268 -5 2248 -48 2330 -58 112 -305 113 -379 1 -12 -19 -26 -50
-32 -70 -32 -120 -33 -208 -39 -2321 l-6 -2115 -830 0 -830 0 -3 2733 -2 2732
844 0 c465 0 847 -3 849 -7 2 -5 -2 -102 -9 -218 -7 -115 -13 -223 -13 -239
-1 -25 5 -19 55 50 78 109 142 181 219 244 252 210 557 296 921 259z m3715
-14 c470 -58 821 -217 1105 -499 228 -226 346 -456 418 -818 60 -294 76 -537
76 -1140 l0 -448 -1076 0 -1075 0 4 -752 c3 -660 5 -762 20 -822 34 -140 93
-186 239 -186 115 0 178 30 225 109 67 112 83 277 83 872 l0 429 791 0 792 0
-6 -402 c-6 -414 -13 -526 -47 -709 -42 -223 -124 -399 -290 -624 -198 -269
-438 -443 -750 -544 -408 -133 -1001 -143 -1465 -26 -378 95 -679 266 -867
492 -228 273 -325 522 -375 953 -16 140 -18 266 -18 1320 0 1271 -1 1257 60
1554 101 498 345 832 762 1040 235 118 508 191 799 216 142 11 437 4 595 -15z"/>
<path d="M12590 9750 c-90 -11 -149 -67 -170 -163 -28 -130 -31 -346 -27
-1787 3 -1302 5 -1484 19 -1553 32 -152 90 -207 223 -207 128 0 181 45 213
182 16 67 17 197 17 1653 0 1686 -1 1705 -48 1790 -38 67 -119 98 -227 85z"/>
<path d="M21299 9750 c-103 -13 -149 -58 -169 -165 -7 -35 -14 -232 -17 -477
l-5 -418 242 0 243 0 -6 373 c-7 439 -19 542 -69 617 -41 59 -113 82 -219 70z"/>
</g>
</svg>

                </div>

                <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="grid grid-cols-1 md:grid-cols-2">
                        <div class="p-6">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="/import" class="underline text-gray-900 dark:text-white">Report 1</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                  Report 1
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-t-0 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"></path><path d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="/export" class="underline text-gray-900 dark:text-white">Report 2</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                   Report 2
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold"><a href="https://laravel-news.com/" class="underline text-gray-900 dark:text-white">Report 3</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                 Report 3
                                </div>
                            </div>
                        </div>

                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white">Report 4</div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                     Report 4
                                </div>
                            </div>
                        </div>
                        <div class="p-6 border-t border-gray-200 dark:border-gray-700 md:border-l">
                            <div class="flex items-center">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" class="w-8 h-8 text-gray-500"><path d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                <div href="https://laravel-news.com/" class="ml-4 text-lg leading-7 font-semibold text-gray-900 dark:text-white"><a href="/" class="underline text-gray-900 dark:text-white">Main Menu</a></div>
                            </div>

                            <div class="ml-12">
                                <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                                     back to menu
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center mt-4 sm:items-center sm:justify-between">
                    <div class="text-center text-sm text-gray-500 sm:text-left">
                        <div class="flex items-center">
                        <P> Having a issue? click the email box to contact support.</p>
                        <a href="helpdesk@stonegroup.co.uk">
                        <svg xmlns="http://www.w3.org/2000/svg" height="10pt" viewBox="-17 -101 560 560"  class="-mt-px w-5 h-5 text-gray-400" width="10pt"><path d="m462.5-5.582031h-400c-34.511719.011719-62.484375 27.988281-62.5 62.5v233.371093c.015625 34.511719 27.988281 62.492188 62.5 62.5h400c34.511719-.007812 62.484375-27.988281 62.5-62.5v-233.371093c-.015625-34.511719-27.988281-62.488281-62.5-62.5zm-400 25h400c18.003906.046875 33.453125 12.824219 36.875 30.496093l-236.875 132.003907-236.875-132.003907c3.421875-17.671874 18.871094-30.449218 36.875-30.496093zm400 308.25h-400c-20.683594-.0625-37.441406-16.816407-37.5-37.5v-212l231.375 128.996093c1.875 1.03125 3.980469 1.59375 6.125 1.628907 2.152344.023437 4.265625-.539063 6.125-1.628907l231.375-128.996093v212c-.015625 20.703125-16.796875 37.480469-37.5 37.5zm0 0"/></svg>
                        </a>
                    </div>

                    <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
                     
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
