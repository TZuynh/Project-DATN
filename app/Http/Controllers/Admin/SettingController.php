<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function generalSetting()
    {
        $title = __('General Settings');

        return view('admin.preference.general_setting', compact('title'));
    }
}
