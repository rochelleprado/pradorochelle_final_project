<form action="{{ route('two-factor.login') }}" method="post">
    @csrf

    <input type="text" name="code" id="code" placeholder="Authentication Code">
    <x-primary-button>Verify</x-primary-button>
</form>