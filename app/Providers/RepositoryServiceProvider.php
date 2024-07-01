<?php

namespace App\Providers;

use App\Http\Repository\Article\ArticleRepository;
use App\Http\Repository\Article\ArticleRepositoryInterface;
use App\Http\Repository\Category\CategoryRepository;
use App\Http\Repository\Category\CategoryRepositoryInterface;
use App\Http\Repository\Course\CourseRepository;
use App\Http\Repository\Course\CourseRepositoryInterface;
use App\Http\Repository\Permission\PermissionRepository;
use App\Http\Repository\Permission\PermissionRepositoryInterface;
use App\Http\Repository\Product\ProductRepository;
use App\Http\Repository\Product\ProductRepositoryInterface;
use App\Http\Repository\Role\RoleRepository;
use App\Http\Repository\Role\RoleRepositoryInterface;
use App\http\Repository\Student\StudentRepository;
use App\http\Repository\Student\StudentRepositoryInterface;
use App\Http\Repository\User\UserRepository;
use App\Http\Repository\User\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);

        $this->app->bind(StudentRepositoryInterface::class, StudentRepository::class);

        $this->app->bind(CourseRepositoryInterface::class, CourseRepository::class);

        $this->app->bind(ArticleRepositoryInterface::class, ArticleRepository::class);

        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->bind(PermissionRepositoryInterface::class, PermissionRepository::class);

        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
