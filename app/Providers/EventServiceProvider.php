<?php

namespace App\Providers;

use App\Events\UserActionEvent;
use App\User;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\UserActionEvent::class => [
            \App\Listeners\UserActionListener::class,
        ],
    ];

    /**
     * Register any other events for your application.
     */
    public function boot(DispatcherContract $events): void
    {
        parent::boot($events);

        // Fired on each authentication attempt...
        $events->listen('auth.attempt', function ($credentials, $remember, $login) {

            // get the email and query the user
            $email = $credentials['email'];
            $user = User::where('email', '=', $email)->first();

            event(new UserActionEvent([
                'section_id' => null,
                'sub_section_id' => null,
                'user_id' => $user->id,
                'change_severity' => 1,
                'summary' => "$user->first_name attempted to login with $email.",
                'old_value' => null,
                'new_value' => null,
            ]));
        });

        // Fired on successful logins...
        $events->listen(\Illuminate\Auth\Events\Login::class, function ($user, $remember) {
            event(new UserActionEvent([
                'section_id' => null,
                'sub_section_id' => null,
                'user_id' => $user->id,
                'change_severity' => 1,
                'summary' => "$user->first_name logged in with $user->email.",
                'old_value' => null,
                'new_value' => null,
            ]));
        });

        // Fired on logouts...
        $events->listen(\Illuminate\Auth\Events\Logout::class, function ($user) {
            event(new UserActionEvent([
                'section_id' => null,
                'sub_section_id' => null,
                'user_id' => $user->id,
                'change_severity' => 1,
                'summary' => $user->first_name.' logged out',
                'old_value' => null,
                'new_value' => null,
            ]));
        });
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
