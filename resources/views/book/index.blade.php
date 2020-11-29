<x-book-form>
  <x-slot name="logo">
    <x-jet-authentication-card-logo />
  </x-slot>
  <x-jet-validation-errors class="mb-4" />

  @if (session('status'))
  <div class="mb-4 font-medium text-sm text-green-600">
    {{ session('status') }}
  </div>
  @endif

  <form method="POST">
    @csrf

    <div>
      <x-jet-label for="groom" value="{{ __('Groom') }}" />
      <x-jet-input id="groom" class="block mt-1 w-full" type="text" name="groom" :value="old('groom')" required
        autofocus />
    </div>

    <div class="mt-4">
      <x-jet-label for="bride" value="{{ __('Bride') }}" />
      <x-jet-input id="bride" class="block mt-1 w-full" type="text" name="bride" :value="old('bride')" required
        autofocus />
    </div>

    <div class="mt-4">
      <x-jet-label for="password" value="{{ __('Password') }}" />
      <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required
        autocomplete="current-password" />
    </div>

    <div class="flex items-center justify-end mt-4">
      <a class="underline text-sm text-gray-600 hover:text-gray-900" href="#">
        {{ __('Already book invitation?') }}
      </a>

      <x-jet-button class="ml-4">
        {{ __('Book Now !') }}
      </x-jet-button>
    </div>
  </form>
</x-book-form>