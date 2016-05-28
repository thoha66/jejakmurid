@if(Session::has('flash_message'))
    <div class="alert alert-success">
        <h4>Berjaya! Tahniah anda berjaya</h4>
        <ul>

            {{ Session::get('flash_message')}}

        </ul>
    </div>
@endif
