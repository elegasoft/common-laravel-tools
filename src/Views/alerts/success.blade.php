@if (session()->has('alert-success'))
    <div class="container">
        <div class="alert alert-success text-center">
            {{ session()->get('alert-success') }}
            @include('common-laravel-tools::alerts.dismiss_button')
        </div>
    </div>
@endif