@if (session()->has('alert-danger'))
    <div class="container">
        <div class="alert alert-danger text-center">
            {{ session()->get('alert-danger') }}
            @include('common-laravel-tools::alerts.dismiss_button')
        </div>
    </div>
@endif