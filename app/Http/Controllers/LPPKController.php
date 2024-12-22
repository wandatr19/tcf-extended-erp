<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LPPKController extends Controller
{
    public function index()
    {
        $dataPage = [
            'page' => 'lppk-index'
        ];
        return view('lppk.index', $dataPage);
    }
    public function input()
    {
        $dataPage = [
            'page' => 'lppk-input'
        ];
        return view('lppk.input', $dataPage);
    }
    public function monitor()
    {
        $dataPage = [
            'page' => 'lppk-monitor'
        ];
        return view('lppk.monitor', $dataPage);
    }
    public function logbook()
    {
        $dataPage = [
            'page' => 'lppk-logbook'
        ];
        return view('lppk.logbook', $dataPage);
    }
}
