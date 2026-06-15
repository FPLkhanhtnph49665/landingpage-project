<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="row g-3">
        @csrf

        <div class="col-12">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="col-12">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="col-12">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="col-12">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <div class="col-12 d-flex flex-column flex-sm-row justify-content-between align-items-center gap-2">
            <a class="text-secondary" href="{{ route('login') }}">{{ __('Already registered?') }}</a>
            <x-primary-button class="btn btn-success">{{ __('Register') }}</x-primary-button>
        </div>
    </form>
</x-guest-layout>
