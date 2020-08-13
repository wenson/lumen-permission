<?php

namespace Mingzaily\Permission\Commands;

use Illuminate\Console\Command;
use Mingzaily\Permission\Contracts\Permission as PermissionContract;

class CreatePermission extends Command
{
    protected $signature = 'permission:create-permission
                {name : The name of the permission}';

    protected $description = 'Create a permission';

    public function handle()
    {
        $permissionClass = app(PermissionContract::class);

        $permission = $permissionClass::findOrCreate($this->argument('guard'));

        $this->info("Permission `{$permission->name}` created");
    }
}