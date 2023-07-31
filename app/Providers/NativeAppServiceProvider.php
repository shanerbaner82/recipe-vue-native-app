<?php

namespace App\Providers;

use Native\Laravel\Facades\ContextMenu;
use Native\Laravel\Facades\Dock;
use Native\Laravel\Facades\Window;
use Native\Laravel\Facades\GlobalShortcut;
use Native\Laravel\Menu\Menu;

class NativeAppServiceProvider
{
    /**
     * Executed once the native application has been booted.
     * Use this method to open windows, register global shortcuts, etc.
     */
    public function boot(): void
    {
//        Menu::new()
//            ->appMenu()
//            ->submenu('Settings', Menu::new()
//                ->link('/apikey', 'Edit Your API Key')
//            )
//            ->register();

        Window::open()
//            ->alwaysOnTop()
            ->rememberState()
            ->showDevTools(false)
            ->width(800)
            ->height(800);

    }
}
