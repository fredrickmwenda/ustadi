<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           	
    	    	
    	$roleSuperAdmin = Role::create(['name' => 'admin']);

		$super = User::create([
            'name' => 'Super Admin',
			'email' => 'admin@admin.com',
			'phone' => '0713723353',
			'password' => Hash::make('123456'),
			'role_id' => $roleSuperAdmin->id,
            'role' => 'admin',
			'status' => 'active',		
		]);
        //create permission
    	$permissions = [
    		[
    			'group_name' => 'dashboard',
    			'permissions' => [
    				'dashboard.index',
    			]
    		],
    		
            //  Transaction
			[
                'group_name' => 'school management',
                'permissions' => [
					'school.create',
					'school.store',
					'school.show',
					'school.edit',
					'school.update',
					'school.delete',
				    'school.list',
					'school.module',
                ]
			],

			// Clubs
			[
                'group_name' => 'club management',
                'permissions' => [
                    'club.create',
                    'club.store',
                    'club.show',
                    'club.edit',
                    'club.update',
                    'club.delete',
                    'club.list',
                    'club.module',
                    'school_club.create',
                    'school_club.store',
                    'school_club.show',
                    'school_club.edit',
                    'school_club.update',
                    'school_club.delete',
                    'school_club.list',
                    'school_club.module',
                    'school_club.activate',
                    'school_club.deactivate',		
                ]
            ],
			// activity
            [
                'group_name' => 'activity management',
                'permissions' => [
                    'activity.create',
                    'activity.store',
                    'activity.show',
                    'activity.edit',
                    'activity.update',
                    'activity.delete',
                    'activity.list',
                    'activity.module',
                    'club_activity.create',
                    'club_activity.store',
                    'club_activity.show',
                    'club_activity.edit',
                    'club_activity.update',
                    'club_activity.delete',
                    'club_activity.list',
                    'club_activity.module',
                    'school_club_activity.create',
                    'school_club_activity.store',
                    'school_club_activity.show',
                    'school_club_activity.edit',
                    'school_club_activity.update',
                    'school_club_activity.delete',
                    'school_club_activity.list',
                    'school_club_activity.module',
                ]
            ],

            //requests
            [
                'group_name' => 'request management',
                'permissions' => [
                    'request.create',
                    'request.store',
                    'request.show',
                    'request.edit',
                    'request.update',
                    'request.delete',
                    'request.list',
                    'request.module',
                    'request.accept',
                    'request.reject',
                ]
            ],
            //schedule
            [
                'group_name' => 'schedule management',
                'permissions' => [
                    'schedule.create',
                    'schedule.store',
                    'schedule.show',
                    'schedule.edit',
                    'schedule.update',
                    'schedule.delete',
                    'schedule.list',
                    'schedule.module',
                ]
            ],
            //Users 
			[
				'group_name' => 'user management',
				'permissions' => [
                    'user.create',
                    'user.store',
                    'user.show',
                    'user.edit',
                    'user.update',
                    'user.delete',
                    'user.list',
                    'user.module',
                    'user.activate',
                    'user.deactivate',
                    'user.profile',
                    'user.profile.update',
                    'user.profile.edit',
                    'user.profile.show',
                    'user.profile.list',
                    'user.profile.module',
                ]
			],
           // Coordinator
			[
				'group_name' => 'coordinator management',
				'permissions' => [
					'coordinator.create',
                    'coordinator.store',
                    'coordinator.show',
                    'coordinator.edit',
                    'coordinator.update',
                    'coordinator.delete',
                    'coordinator.list',
                    'coordinator.module',	
				]
			],
            //Mentor
			
			[
				'group_name' => 'mentor management',
				'permissions' => [
                    'mentor.create',
                    'mentor.store',
                    'mentor.show',
                    'mentor.edit',
                    'mentor.update',
                    'mentor.delete',
                    'mentor.list',
                    'mentor.module',
                    'mentor.activate',
                    'mentor.deactivate',
                ]
			],
            // Mentor Availability
            [
                'group_name' => 'availability management',
                'permissions' => [
                    'availability.create',
                    'availability.store',
                    'availability.show',
                    'availability.edit',
                    'availability.update',
                    'availability.delete',
                    'availability.list',
                    'availability.module',
                ]
            ],


			// Matron

			[
				'group_name' => 'matron management',
				'permissions' => [
                    'matron.create',
                    'matron.store',
                    'matron.show',
                    'matron.edit',
                    'matron.update',
                    'matron.delete',
                    'matron.list',
                    'matron.module',
                    'matron.activate',
                    'matron.deactivate',
                ]
			],

            //location
            [
                'group_name' => 'location management',
                'permissions' => [
                    'location.create',
                    'location.store',
                    'location.show',
                    'location.edit',
                    'location.update',
                    'location.delete',
                    'location.list',
                    'location.module',
                ]
            ],
            //notification
            [
                'group_name' => 'notification management',
                'permissions' => [
                    'notification.create',
                    'notification.store',
                    'notification.show',
                    'notification.edit',
                    'notification.update',
                    'notification.delete',
                    'notification.list',
                    'notification.module',
                ]
            ],

            //resources
            [
                'group_name' => 'resource management',
                'permissions' => [
                    'resource.create',
                    'resource.store',
                    'resource.show',
                    'resource.edit',
                    'resource.update',
                    'resource.delete',
                    'resource.list',
                    'resource.module',
                ]
            ],



			// Reports
			[
				'group_name' => 'report',
				'permissions' => [
                    'report.module',
					'report.session',
					'report.availability',
					'report.school',
					'report.activity',
					'report.schedule',
				]
			],

			// Roles
    		[
    			'group_name' => 'role',
    			'permissions' => [
    				'role.create',
    				'role.edit',
    				'role.update',
    				'role.delete',
    				'role.list',
                    'role.module',
    			]
    		],
            // Permissions
            [
                'group_name' => 'permission',
                'permissions' => [
                    'permission.create',
                    'permission.edit',
                    'permission.update',
                    'permission.delete',
                    'permission.list',
                    'permission.module',
                ]
            ],




			// Settings
			[
				'group_name' => 'settings',
				'permissions' => [
					'system.settings',
					'seo.settings',
					'menu',
					'theme.settings',
                    'front.settings',
                    'email.settings',
				]
			],
	




    	];

        //assign permission

    	foreach ($permissions as $key => $row) {
    		foreach ($row['permissions'] as $per) {
    			$permission = Permission::create(['name' => $per, 'group_name' => $row['group_name']]);
    			$roleSuperAdmin->givePermissionTo($permission);
    			$permission->assignRole($roleSuperAdmin);
    			$super->assignRole($roleSuperAdmin);
    		}
    	}  	
    }
}
