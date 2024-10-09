<?php

namespace Deployer;

require 'recipe/laravel.php';
require 'contrib/npm.php';

// Config

require 'contrib/rsync.php';
set('application', 'Knowledge Base'); //for your reference
set('ssh_multiplexing', true); // Speed up deployment


add('rsync', [
    'exclude' => [
        '.git',
        '/.env',
        '/.env.production',
        '/storage/',
        '/vendor/',
        '/node_modules/',
        '.github',
        '.ansible',
        'deploy.php',
    ],
]);

task('deploy:secrets', function () {
    $envContent = getenv('DOT_ENV');
    file_put_contents(__DIR__.'/.env', $envContent);
    upload('.env', get('deploy_path').'/shared');
});

// Hosts

// TODO: дописать хосты или спрятать их в секретс

// Hooks

after('deploy:failed', 'deploy:unlock');

/**
 * Main deploy task.
 */
desc('Deploys your project');
task('deploy', [
    /** Prepare */
    'deploy:info',
    'deploy:setup',
    'deploy:lock',
    'deploy:release',
    'rsync',
    'deploy:secrets',
    'deploy:shared',
    'deploy:writable',

    /** Post process */
    'deploy:vendors',
    'artisan:storage:link',

    'artisan:config:cache',
    'artisan:route:cache',
    'artisan:view:cache',
    'artisan:event:cache',
    'artisan:migrate',

    /** Publish */
    'deploy:symlink',
    'artisan:config:clear',
    'artisan:queue:restart',
    'deploy:unlock',
    'deploy:cleanup',
    'deploy:success',
]);
