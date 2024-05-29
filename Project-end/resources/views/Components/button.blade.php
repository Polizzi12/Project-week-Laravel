<button {{ $attributes->merge(['class' => 'btn ciao']) }}>{{ $attributes->get('start') }} {{ $slot }}</button>
