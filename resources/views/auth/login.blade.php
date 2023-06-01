<x-app>
    <div class="d-flex align-items-center justify-content-center vh-100">
        <div class="card">
            <div class="card text-center">
                <div class="card-header">
                    <h3>Velkommen til Funkybooking</h3>
                </div>
                <div class="card-body">
                    <p class="card-text">Vennglist logg inn for å fortsette</p>
                    <a href="{{ route('google.login') }}" class="btn btn-warning">
                        <i class="fab fa-google"></i>
                        Logg inn med Google
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app>
