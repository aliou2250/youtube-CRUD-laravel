<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel CRUD</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" defer src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script>
        // Fonction de notification
        function toast_notification(msg, type) {
            let bg;
            if (type == 'error') bg = '#f30000';
            else if (type == 'success') bg = '#009f7f';
            Toastify({
                text: msg,
                duration: 5000,
                close: true,
                className: "info",
                gravity: "bottom",
                position: "right",
                style: {
                    background: bg,
                }
            }).showToast();
        }
    </script>
</head>

<body class="antialiased">
    <header class="header">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container">
                <a class="navbar-brand fw-bold" href="{{ route('home') }}">LARAVEL CRUD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('tasks.create') }}">CREER</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    @if ($message = Session::get('success'))
        <script>
            window.addEventListener("DOMContentLoaded", (event) => {
                toast_notification('{{ $message }}', 'success')
            });
        </script>
    @endif
    @if ($message = Session::get('error'))
        <script>
            window.addEventListener("DOMContentLoaded", (event) => {
                toast_notification('{{ $message }}', 'error')
            });
        </script>
    @endif

    @yield('content')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');

        function supprime (id) {
            let form = document.querySelector(`#submit${id}`);
            Swal.fire({
                title: 'Etes-vous sûr de bien vouloir supprimer cet élement ?',
                text: "Cette action est irréversible !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#009f7f',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Oui, j\'en suis sûr !',
                cancelButtonText: 'Annuler !'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        }
    </script>
</body>

</html>