<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="max-w-md mx-auto">
        @csrf

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Role -->
        <div class="mt-4">
            <label for="role" class="block font-medium text-sm text-gray-700">S'inscrire en tant que :</label>
            <select name="role" id="role" class="form-control" onchange="showAdditionalOptions()">
                <option value="expediteur">S'inscrire en tant qu'expéditeur</option>
                <option value="agent">S'inscrire en tant qu'agent</option>
            </select>
        </div>

        <!-- Additional Options for Agent -->
        <div id="additionalOptions" class="mt-4" style="display: none;">
            <label class="block font-medium text-sm text-gray-700">Choisir le rôle :</label>
            <div class="mt-1">
                <input type="radio" id="transporteur" name="role_option" value="transporteur">
                <label for="transporteur" class="ml-2 text-sm text-gray-600">Transporteur</label>
            </div>
            <div class="mt-1">
                <input type="radio" id="livreur" name="role_option" value="livreur">
                <label for="livreur" class="ml-2 text-sm text-gray-600">Livreur</label>
            </div>
            <div class="mt-1">
                <input type="radio" id="les_deux" name="role_option" value="les_deux">
                <label for="les_deux" class="ml-2 text-sm text-gray-600">Les deux</label>
            </div>
        </div>

        <div class="flex items-center justify-end mt-6">
            <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                {{ __('Déjà enregistré ?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('S\'inscrire') }}
            </x-primary-button>
        </div>
    </form>

    <script>
        function showAdditionalOptions() {
            var role = document.getElementById('role').value;
            var additionalOptions = document.getElementById('additionalOptions');

            if (role === 'agent') {
                additionalOptions.style.display = 'block';
            } else {
                additionalOptions.style.display = 'none';
            }
        }
    </script>
</x-guest-layout>
