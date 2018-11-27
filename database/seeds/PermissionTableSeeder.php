<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


        $permissions = [
            'admin-list',
            'admin-create',
            'admin-edit',
            'admin-delete',
            ////////////////////
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            ////////////////////
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            ////////////////////
            'bodypart-list',
            'bodypart-create',
            'bodypart-edit',
            'bodypart-delete',
            ///////////////////////
            'category-list',
            'category-create',
            'category-edit',
            'category-delete',
            ///////////////////////v
             'equipment-list',
            'equipment-create',
            'equipment-edit',
            'equipment-delete',
            ///////////////////////
             'exercise-list',
            'exercise-create',
            'exercise-edit',
            'exercise-delete',
            ///////////////////////
           'goal-list',
            'goal-create',
            'goal-edit',
            'goal-delete',
            ///////////////////////
             'level-list',
            'level-create',
            'level-edit',
            'level-delete',
            ///////////////////////
             'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            ///////////////////////
            'recipe-list',
            'recipe-create',
            'recipe-edit',
            'recipe-delete',
            ///////////////////////
             'slider-list',
            'slider-edit',
            ///////////////////////
            'tag-list',
            'tag-create',
            'tag-edit',
            'tag-delete',
            ///////////////////////
            ///////////////////////
            'workout-list',
            'workout-create',
            'workout-edit',
            'workout-delete',
            ///////////////////////
        ];


        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

    }
}
