<?php

namespace App\Models;

class VisitorModel extends \CodeIgniter\Model
{
    protected $table            = 'visitor';
    protected $primaryKey       = 'visitor_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['ip_address', 'visit_date'];

    // Dates
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at'; 

    /**
     * Get total visitor count
     */
    public function getTotalVisitors()
    {
        return $this->builder()->countAllResults();
    }

    /**
     * Get today's visitor count
     */
    public function getTodayVisitors()
    {
        return $this->builder()->where('visit_date', date('Y-m-d'))->countAllResults();
    }

    /**
     * Get yesterday's visitor count
     */
    public function getYesterdayVisitors()
    {
        $yesterday = date('Y-m-d', strtotime('-1 day'));
        return $this->builder()->where('visit_date', $yesterday)->countAllResults();
    }

    /**
     * Record a visit if not already recorded for this IP today
     */
    public function recordVisit($ip)
    {
        $today = date('Y-m-d');
        // Using a separate builder instance to avoid polluting the model's shared builder
        $exists = $this->builder()->where([
            'ip_address' => $ip,
            'visit_date' => $today
        ])->get()->getRow();

        if (!$exists) {
            return $this->insert([
                'ip_address' => $ip,
                'visit_date' => $today
            ]);
        }
        return false;
    }
}
