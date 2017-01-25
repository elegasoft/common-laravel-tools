@if (session()->has('alert-info'))
    <div class="container">
        <div class="alert alert-info text-center">
            {{ session()->get('alert-info') }}
            @include('common-laravel-tools::alerts.dismiss_button')
        </div>
    </div>
@endif