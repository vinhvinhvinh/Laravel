<?php

namespace App\Http\Controllers;

use App\Traits\FlassMessages;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    //

    use FlassMessages;
    protected $data = null;

    protected function setPageTitle($title, $subTitle)
    {
        view()->share(['pageTitle' => $title, 'subTitle' => $subTitle]);
    }

    protected function showErrorPage($errorCode = 404, $message = null)
    {
        $data['messages'] = $message;
        return response()->view('error:' . $errorCode, $message, $errorCode);
    }

    protected function responseJSON($error = true, $responseCode = 200, $message = [], $data = null)
    {
        return response()->json([
            'error' => $error,
            'responseCode' => $responseCode,
            'messages' => $message,
            'data' => $data
        ]);
    }

    protected function responseRedirect($route, $message, $type = 'error', $error = false, $withOldInputWhenError = false)
    {
        $this->FlassMessages($message, $type);
        $this->showFlashMessage();

        if ($error && $withOldInputWhenError) {
            return redirect()->back()->withInput();
        }
        return redirect()->route($route);
    }

    protected function responseRedirectBack($message, $type = 'error', $error = false, $withOldInputWhenError = false)
    {
        $this->FlassMessages($message, $type);
        $this->showFlashMessage();


        return redirect()->back();
    }
}