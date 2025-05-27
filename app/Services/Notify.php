<?php

namespace App\Services;

class Notify{
    static function createdNotification()
    {
        return notify()->success('Created Successfully','Success');
    }
    static function updatedNotification()
    {
        return notify()->success('Updated Successfully','Success');
    }

    static function deletedNotification()
    {
        return notify()->success('Deleted Successfully','Success');
    }
}

