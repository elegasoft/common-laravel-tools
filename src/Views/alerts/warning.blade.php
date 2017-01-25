@if (session()->has('alert-warning'))
    <div class="container">
        <div class="alert alert-warning text-center">
            {{ session()->get('alert-warning') }}
            @include('common-laravel-tools::alerts.dismiss_button')
        </div>
    </div>
@endif