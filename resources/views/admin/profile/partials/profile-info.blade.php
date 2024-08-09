<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Your account's profile information.") }}
        </p>
    </header>

    <div>
        <div>Name</div>
        <div>{{ $user->name }}</div>
    </div>

    <div>
        <div>Email</div>
        <div>{{ $user->email }}</div>
    </div>

</section>