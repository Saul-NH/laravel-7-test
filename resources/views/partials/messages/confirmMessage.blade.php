@if(session('mensaje'))
        <div class="container">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('mensaje')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        </div>
@endif