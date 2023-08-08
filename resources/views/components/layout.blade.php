<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Snapp Sell</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <x-navbar></x-navbar>
    @if (session()->has('access.denied'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let messageModal = new bootstrap.Modal(document.querySelector('#alertDanger'));
                messageModal.show();
                
                messageModal._element.addEventListener('hide.bs.modal', function() {
                    location.reload();
                });
            });
        </script>
        <x-alertDanger></x-alertDanger>
    @endif
    @if (session()->has('message'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let messageModal = new bootstrap.Modal(document.querySelector('#alertSuccess'));
                messageModal.show();
                
                messageModal._element.addEventListener('hide.bs.modal', function() {
                    location.reload();
                });
            });
        </script>
        <x-alertSuccess></x-alertSuccess>
    @endif
    @if (session()->has('messageRevisor'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                let messageModal = new bootstrap.Modal(document.querySelector('#alertSuccess'));
                messageModal.show();
                
                let progress = document.querySelector(".progress");
                let timer;
                let toast = new bootstrap.Toast(document.querySelector('#liveToast'));
                messageModal._element.addEventListener('hide.bs.modal', function() {
                    toast.show()
                    progress.classList.add("active");
                    timer = setTimeout(() => {
                        progress.classList.remove("active");
                    }, 10000);
                });
            });
        </script>
        <x-alertSuccess></x-alertSuccess>
    @endif
    {{$slot}}

    <x-footer></x-footer>
    
    @livewireScripts
    <script src="https://kit.fontawesome.com/2aed272892.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
</body>
</html>