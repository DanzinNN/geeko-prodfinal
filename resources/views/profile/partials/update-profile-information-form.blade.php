<section>
    <header>
        <h2 class="text-2xl font-bold text-white mb-4 font-poppins">
            {{ __('Informações do Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300 font-poppins">
            {{ __("Atualize as informações do seu perfil e endereço de e-mail.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mb-4">
            <x-input-label for="name" :value="__('Nome')" class="block text-sm font-medium text-gray-300 mb-2 font-poppins" />
            <x-text-input id="name" name="name" type="text"
                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
                :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div class="mb-4">
            <x-input-label for="email" :value="__('E-mail')" class="block text-sm font-medium text-gray-300 mb-2 font-poppins" />
            <x-text-input id="email" name="email" type="email"
                class="p-2 w-full rounded-xl border-2 border-rosa bg-transparent text-white font-poppins placeholder:font-poppins focus:outline-none focus:ring-2 focus:ring-rosa focus:border-rosa transition duration-200"
                :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-300 font-poppins">
                        {{ __('Seu endereço de e-mail não foi verificado.') }}

                        <button form="send-verification"
                            class="underline text-sm text-rosa hover:text-rosa/80 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rosa transition duration-200 font-poppins">
                            {{ __('Clique aqui para reenviar o e-mail de verificação.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-rosa font-poppins">
                            {{ __('Um novo link de verificação foi enviado para seu endereço de e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"
                class="p-2 bg-rosa text-white rounded-xl hover:bg-rosa/80 transition duration-200 font-poppins">
                {{ __('Salvar') }}
            </button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-300 font-poppins"
                >{{ __('Salvo.') }}</p>
            @endif
        </div>
    </form>
</section>
