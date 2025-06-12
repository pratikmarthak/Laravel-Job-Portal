<?php

namespace App\Services;

class Notify{
    static function createdNotification()
    {
        return noty()->success('Created Successfully',['position' => 'bottomRight']);
    }
    static function updatedNotification()
    {
        return noty()->success('Updated Successfully',['position' => 'bottomRight']);
    }

    static function deletedNotification()
    {
        return noty()->success('Deleted Successfully',['position' => 'bottomRight']);
    }
}

