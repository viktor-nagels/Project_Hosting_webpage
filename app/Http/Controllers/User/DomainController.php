<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Facades\App\Helpers\Json;
use App\Domain;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DomainController extends Controller
{

    
    


    public function setdomain(Request $request){
        
        // $validate = $this->validate($request,
        //     ['domain_name' => 'required|string|min:5|max:30|unique:domains,domain_name'],
        //     ['mysql_username' => 'string|min:5|max:50|unique:domains,mysql_username'],
        //     ['sftp_username' => 'required|varchar|min:5|max:50|unique:domains,sftp_username']
        // );

        $request->validate([
            'domain_name' => 'required|string|min:5|max:30|unique:domains,domain_name',
            'mysql_username' => 'string|min:5|max:50|unique:domains,mysql_username',
            'mysql_password' => 'string|min:8',
            'sftp_username' => 'required|string|min:5|max:50|unique:domains,sftp_username',
            'sftp_password' => 'string|min:8'

        ]);

        
        
        


        if(!Domain::where('user_id', '=', User::findOrFail(auth()->id())->id)->exists()){
        $website = new Domain();
        $website->user_id = User::findOrFail(auth()->id())->id;
        $website->domain_name = $request->domain_name;
        $website->mysql_username = $request->mysql_username;
        $website->mysql_password = $request->mysql_password;
        $website->sftp_username = $request->sftp_username;
        $website->sftp_password = $request->sftp_password;
        $website->mysql_version = $request->mysql_version;
        $website->php_version = $request->php_version;
        $website->laravel_version = $request->laravel_version;
        $request->flash();

        $website->save();

        $id = User::findOrFail(auth()->id())->id;
        $script_values = fopen("scripts/values_domain_$id.txt", "w");
        //$template_script = fopen("scripts/template_script.txt", "r");
        fwrite($script_values, "#!/bin/bash" . "\n");
        fwrite($script_values, "WEBID=");
        fwrite($script_values, '"web' .User::findOrFail(auth()->id())->id . '"' . "\n");
        fwrite($script_values, "DOMAIN=");
        fwrite($script_values, '"' .$request->domain_name . '"' . "\n");
        fwrite($script_values, "MYSQL_USER_ENV=");
        fwrite($script_values, '"' .$request->mysql_username . '"' . "\n");
        fwrite($script_values, "MYSQL_PASSWORD_ENV=");
        fwrite($script_values, '"'. $request->mysql_password . '"' ."\n");
        fwrite($script_values, "SFTP_USERNAME=");
        fwrite($script_values, '"' . $request->sftp_username . '"' . "\n");
        fwrite($script_values, "SFTP_PASSWORD=");
        fwrite($script_values, '"' . $request->sftp_password . '"' ."\n");
        fwrite($script_values, "MYSQL_VERSION=");
        fwrite($script_values, '"' . $request->mysql_version. '"'. "\n");
        fwrite($script_values, "PHP_VERSION=");
        fwrite($script_values, '"' . $request->php_version . '"'. "\n");
        fwrite($script_values, "LARAVEL_VERSION=");
        fwrite($script_values, '"'. $request->laravel_version .'"'. "\n" . "\n");
        fclose($script_values);

        $script = fopen("scripts/script.sh", "w");
        fwrite($script, file_get_contents("scripts/values_domain_$id.txt"));
        fwrite($script, file_get_contents("scripts/template_script.txt"));           

        // Flash a success message to the session
        session()->flash('success', 'Your domain has been submitted');

        // Redirect to previous page
        return redirect('domain');
        //return back();
        }
        else{
            session()->flash('danger', 'user already has a domain');

        // Redirect to previous page
        return redirect('domain');
    }
    
    
    
    }

}
