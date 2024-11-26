<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RSR Dashboard</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])

            
        @endif
    </head>

    <style>
         body 
            {
                color-scheme: light;
                font-family: Arial, sans-serif;
            }
         .Accessibility 
            {
                color-scheme: dark;
                font-family: "Comic Sans MS", "Comic Sans", cursive;
                background-color: Canvas;
                color: CanvasText;
                
                {{-- background-color: black; --}}
                {{-- font-color: white; --}}
            }

            .Accessibility b {
                letter-spacing: 0.1em;
            }

            @media print {
            body * {
                visibility: hidden;
            }
            #print-section, #print-section * {
                visibility: visible;
                
            }
            #print-section {
                position: absolute;
                left: 0;
                top: 0;
            }

            p {
                font-size: 12px;
            }

            .hide {
                display: none;
            }
            .hoverHide:hover + .hide {
               
            }
        }

    </style>

    <body>
        
        <div>
            <div class="bg-red-700 p-4 sticky">
                    <h1 class="text-4xl  text-white font-mono">RSR Dashboard</h1>
            </div>

            <x-layout>
                 <livewire:livewire-sort-table/>
            </x-layout>
        </div>
        

        <script>
        document.getElementById("accessibility-button").addEventListener("click", function() {
            const body = document.body;

            if (body.classList.contains('Accessibility')) {
                body.classList.remove('Accessibility');
            } else {
                body.classList.add('Accessibility');
            }
        });
        Livewire.on('reloadPage', () => {
        window.location.reload();
        });
        
        </script>
    </body>
</html>