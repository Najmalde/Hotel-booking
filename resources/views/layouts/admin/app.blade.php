<!DOCTYPE html>
<html>
<head>
    <!-- Your head content -->
</head>
<body class="bg-gray-50">
    @include('layouts.admin.navigation')
    
    <main class="max-w-4xl mx-auto p-6">
        @hasSection('content')
            @yield('content')
        @else
            {{ $slot }}
        @endif
    </main>

    @livewireScripts
</body>
</html>