<?php

declare(strict_types=1);

/**
 * This file is part of CodeIgniter Shield.
 *
 * (c) CodeIgniter Foundation <admin@codeigniter.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Config;

use CodeIgniter\Shield\Config\AuthGroups as ShieldAuthGroups;

class AuthGroups extends ShieldAuthGroups
{
    /**
     * --------------------------------------------------------------------
     * Default Group
     * --------------------------------------------------------------------
     * The group that a newly registered user is added to.
     */
    public string $defaultGroup = 'user';

    /**
     * --------------------------------------------------------------------
     * Groups
     * --------------------------------------------------------------------
     * An associative array of the available groups in the system, where the keys
     * are the group names and the values are arrays of the group info.
     *
     * Whatever value you assign as the key will be used to refer to the group
     * when using functions such as:
     *      $user->addGroup('superadmin');
     *
     * @var array<string, array<string, string>>
     *
     * @see https://codeigniter4.github.io/shield/quick_start_guide/using_authorization/#change-available-groups for more info
     */
    public array $groups = [
        'superadmin' => [
            'title' => 'Super Admin',
            'description' => 'Complete control of the site.',
        ],
        'admin' => [
            'title' => 'Admin',
            'description' => 'Day to day administrators of the site.',
        ],
        'developer' => [
            'title' => 'Developer',
            'description' => 'Site programmers.',
        ],
        'supervisor' => [
            'title' => 'Supervisor',
            'description' => 'Validation verificator action.',
        ],
        'verifikator' => [
            'title' => 'Verifikator',
            'description' => 'Verification user request.',
        ],
        'asesor' => [
            'title' => 'Asesor',
            'description' => 'Expert reviewer of user request.',
        ],
        'prodi' => [
            'title' => 'Program Studi',
            'description' => 'Management of study programs.',
        ],
        'user' => [
            'title' => 'User',
            'description' => 'General users of the site. Often customers.',
        ],
        'hukum' => [
            'title' => 'Biro Hukum',
            'description' => 'Biro Hukum - View Usulan Selesai.',
        ]
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions
     * --------------------------------------------------------------------
     * The available permissions in the system.
     *
     * If a permission is not listed here it cannot be used.
     */
    public array $permissions = [
        'admin.access' => 'Can access the sites admin area',
        'admin.settings' => 'Can access the main site settings',
        'supervisor.access' => 'Can access the sites Supervisor area',
        'verifikator.access' => 'Can access the sites Verifikator area',
        'asesor.access' => 'Can access the sites Asesor area',
        'hukum.access' => 'Can access the sites Biro Hukum area',
        'users.manage-admins' => 'Can manage other admins',
        'users.create' => 'Can create new non-admin users',
        'users.edit' => 'Can edit existing non-admin users',
        'users.delete' => 'Can delete existing non-admin users',
        'beta.access' => 'Can access beta-level features',
    ];

    /**
     * --------------------------------------------------------------------
     * Permissions Matrix
     * --------------------------------------------------------------------
     * Maps permissions to groups.
     *
     * This defines group-level permissions.
     */
    public array $matrix = [
        'superadmin' => [
            'admin.*',
            'users.*',
            'beta.*',
        ],
        'admin' => [
            'admin.access',
            'users.create',
            'users.edit',
            'users.delete',
            'beta.access',
        ],
        'supervisor' => [
            'supervisor.access'
        ],
        'verifikator' => [
            'verifikator.access'
        ],
        'asesor' => [
            'asesor.access'
        ],
        'hukum' => [
            'hukum.access'
        ],
        'user' => [],
        'beta' => [
            'beta.access',
        ],
    ];
}
