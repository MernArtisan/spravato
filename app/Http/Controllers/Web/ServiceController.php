<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\service;
use App\Models\User;

class ServiceController extends Controller
{
    public function index()
    {
       $services_provider = User::where('role','provider')->whereHas('provider', function ($query) {
            $query->where('status', 'active');
        })->get();
        return view('web.service.services-provider',array(
            'providers' => $services_provider
        ));
    }

    public function provider_service($id)
    {   
        $services = service::with('addedBy')->where('user_id', $id)->where('status', 'active')->get();
    
        return view('web.service.specific-service',array(
            'services' => $services
        ));
    }
}
