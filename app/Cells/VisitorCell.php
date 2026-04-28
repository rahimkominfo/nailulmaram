<?php

namespace App\Cells;

use App\Models\VisitorModel;

class VisitorCell
{
    private static $recorded = false;

    /**
     * Display visitor counter
     */
    public function render(): string
    {
        $model = new VisitorModel();
        
        // Record the visit if not already done for the current request'S lifecycle
        if (!self::$recorded) {
            $ip = service('request')->getIPAddress();
            $model->recordVisit($ip);
            self::$recorded = true;
        }

        $data = [
            'today'     => $model->getTodayVisitors(),
            'yesterday' => $model->getYesterdayVisitors(),
            'total'     => $model->getTotalVisitors(),
        ];

        return view('cells/visitor_counter', $data);
    }
}
