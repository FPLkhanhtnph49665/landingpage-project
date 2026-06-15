<section>
    <h5 class="mb-3">{{ __('Profile Information') }}</h5>
    <p class="text-muted mb-4">{{ __("Update your account's profile information and email address.") }}</p>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="row g-3">
        @csrf
        @method('patch')

        <div class="col-12">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="form-control" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" />
        </div>

        <div class="col-12">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="form-control" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3">
                    <p class="mb-2">{{ __('Your email address is unverified.') }}</p>
                    <button form="send-verification" class="btn btn-link p-0 align-baseline">{{ __('Click here to re-send the verification email.') }}</button>
                    @if (session('status') === 'verification-link-sent')
                        <div class="mt-2 text-success small">{{ __('A new verification link has been sent to your email address.') }}</div>
                    @endif
                </div>
            @endif
        </div>

        <div class="col-12">
            <button class="btn btn-success">{{ __('Save') }}</button>
            @if (session('status') === 'profile-updated')
                <span class="text-success small ms-3">{{ __('Saved.') }}</span>
            @endif
        </div>
    </form>
</section>
