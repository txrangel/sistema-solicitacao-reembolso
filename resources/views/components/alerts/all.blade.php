<div class="">
    @if (session('status') === 'sucess')
        @include('components.alerts.sucess')
    @endif
    @if (session('status') === 'error')
        @include('components.alerts.error')
    @endif
</div>