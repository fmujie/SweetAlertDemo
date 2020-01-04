<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Alert;


class SweetAlertDemo extends Controller
{

    public function index($alertType = null)
    {
        Alert::message('Message', 'Optional Title');
        switch ($alertType) {
            case 'success':
                Alert::success('Success Message', 'Optional Title');
                break;
            case 'basic':
                alert()->basic('Basic Message', 'Mandatory Title');
                break;
            case 'info':
                Alert::info('Info Message', 'Optional Title');
                break;
            case 'error':
                Alert::error('Error Message', 'Optional Title');
                break;
            case 'warning':
                Alert::warning('Warning Message', 'Optional Title');
                break;
            default:
                Alert::message('Robots are working!');
                break;
        }
        return view('SweetAlert');
    }

}
