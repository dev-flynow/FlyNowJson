<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight Search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles
    <style>
        .nav-link.active.custom-active {
            background-color:rgb(124, 188, 165) !important;
            color: #fff !important;
            border-color: transparent;
            
        }
        .nav-tabs .nav-link {
        border-radius: 2rem;
         }
    .flight-path {
        position: relative;
        width: 110px;
        height: 20px;
        overflow: hidden;
    }
    .plane {
        display: inline-block;
        animation: fly 4s linear infinite;
    }
    @keyframes fly {
        0% { transform: translateX(-20px); }
        100% { transform: translateX(120px); }
    }
    .text-warning-orange {
        color: #FFA500 !important; /* Orange */
        font-size: 0.875rem; /* Small text */
    }
    
    
    </style>

</head>
<body class="bg-light">

    <div class="container py-5">
        <h1 class="mb-4"></h1>

        <div class="card shadow mt-5">
            <div class="card-body ">
                <livewire:header/>
                <livewire:flight-search />
            </div>
        </div>
    </div>

    @livewireScripts
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script
            type="module"
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script
            nomodule
            src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
