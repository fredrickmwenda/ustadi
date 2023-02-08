<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(\App\Repositories\SchoolRepository::class, \App\Repositories\SchoolRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MentorRepository::class, \App\Repositories\MentorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\MatronRepository::class, \App\Repositories\MatronRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\RequestRepository::class, \App\Repositories\RequestRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StudentClubRepository::class, \App\Repositories\StudentClubRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClubActivityRepository::class, \App\Repositories\ClubActivityRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ActivityTypeRepository::class, \App\Repositories\ActivityTypeRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\CordinatorRepository::class, \App\Repositories\CordinatorRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ResourceRepository::class, \App\Repositories\ResourceRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\StudentRepository::class, \App\Repositories\StudentRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\SchoolClubRepository::class, \App\Repositories\SchoolClubRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ScheduleRepository::class, \App\Repositories\ScheduleRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\ClubRepository::class, \App\Repositories\ClubRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\VideoRepository::class, \App\Repositories\VideoRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\LinkRepository::class, \App\Repositories\LinkRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\BookRepository::class, \App\Repositories\BookRepositoryEloquent::class);
        $this->app->bind(\App\Repositories\AvailabilityRepository::class, \App\Repositories\AvailabilityRepositoryEloquent::class);
        //:end-bindings:
    }
}
