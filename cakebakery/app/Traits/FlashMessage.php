<?php

namespace App\Traits;

trait FlassMessages
{
    protected $errorMessages = [];
    protected $infoMessages = [];
    protected $susccesMessages = [];
    protected $warningMessages = [];


    protected function setFlashMessage($message, $type)
    {
        $model = '';

        switch ($type) {
            case 'error': {
                    $model = 'error Message';
                    break;
                }

            case 'info': {
                    $model = 'info Message';
                    break;
                }

            case 'susses': {
                    $model = 'susses Message';
                    break;
                }

            case 'warning': {
                    $model = 'warning Message';
                    break;
                }
        }

        if (is_array($message)) {
            foreach ($message as $key => $value) {
                array_push($this->$model, $value);
            }
        } else {
            array_push($this->$model, $message);
        }
    }

    protected function getFlashMessage()
    {
        return [
            'error' => $this->errorMessages,
            'info' => $this->infoMessages,
            'success' => $this->susccesMessages,
            'warning' => $this->warningMessages,
        ];
    }

    protected function showFlashMessage()
    {
        session()->flash('error', $this->errorMessages);
        session()->flash('info', $this->infoMessages);
        session()->flash('success', $this->susccesMessages);
        session()->flash('warning', $this->warningMessages);
    }
}