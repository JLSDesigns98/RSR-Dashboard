<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>RSR Dashboard</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>
        <script>

                
            function updateHex(colour) {
              console.log('updateHex');
              document.getElementById('hex').value = colour;
            }
            function updateColour(hex) {
              document.getElementById('colour').value = hex;
            }


            function updateTextHex(textColour) {
              document.getElementById('textHex').value = textColour;
            }
            function updateTextColour(textHex) {
              document.getElementById('textColour').value = textHex;
            }

                
          </script>
        @livewireStyles
    </head>
    <body class="h-100">
        <div class=" mx-auto ">
            {{ $slot }}
        </div>
        @livewireScripts
        <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v1.x.x/dist/livewire-sortable.js"></script>
        
      </body>
</html>