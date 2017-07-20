<?php
/**
 * Created by PhpStorm.
 * User: vestin
 * Date: 7/14/17
 * Time: 4:00 PM
 */

namespace App\ViewModels;


use App\Task;

class TaskViewModel extends ViewModel
{

    public function getStatusClass()
    {
        $bgColor = '';
        switch ($this->status) {
            case Task::STATUS_INIT:
                $bgColor = '';
                break;
            case Task::STATUS_SEND_TO_QUEUE:
                $bgColor = 'bg-info';
                break;
            Case Task::STATUS_HANDING:
                $bgColor = 'bg-warning';
                break;
            case Task::STATUS_ERROR:
                $bgColor = 'bg-danger';
                break;
            case Task::STATUS_DONE:
                $bgColor = 'bg-success';
                break;
        }
        return $bgColor;
    }

    public function getStatusDes()
    {
        return $this->model->statusDes[$this->status];
    }

}