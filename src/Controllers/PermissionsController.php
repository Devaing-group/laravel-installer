<?php

namespace Devaing\LaravelInstaller\Controllers;

use App\Http\Requests;
use Illuminate\Routing\Controller;
use Devaing\LaravelInstaller\Helpers\PermissionsChecker;

class PermissionsController extends Controller
{

    /**
     * @var PermissionsChecker
     */
    protected $permissions;

    /**
     * @param PermissionsChecker $checker
     */
    public function __construct(PermissionsChecker $checker)
    {
        $this->permissions = $checker;
    }

    /**
     * Display the permissions check page.
     *
     * @return \Illuminate\View\View
     */
    public function permissions()
    {
        $permissions = $this->permissions->check(
            config('installer.permissions')
        );

        return view('vendor.installer.permissions', compact('permissions'));
    }
}
