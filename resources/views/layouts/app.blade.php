<!DOCTYPE html>
<html>
<head>
    <!-- Your existing head content -->
</head>
<body class="bg-gray-100">
    @include('layouts.navigation')
    
    <main class="container mx-auto p-4">
        {{ $slot }}
    </main>

    @livewireScripts
</body>
</html>