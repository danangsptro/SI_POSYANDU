<nav class="navbar navbar-expand-lg navbar-light" id="navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('page') }}" id="nv"><img
                src="{{ asset('assets/img/Logo-Puskesmas.png') }}" alt="" style="width:100px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
            </ul>
            <form class="form-inline my-2 my-lg-0 nav-item">
                <a class="nav-link" href="{{ route('page') }}" id="nv">Home</a>
                <a class="nav-link btn btn-dark" href="{{ route('dataImun') }}" id="nv">Data Imunisasi</a>
            </form>
        </div>
    </div>
</nav>
