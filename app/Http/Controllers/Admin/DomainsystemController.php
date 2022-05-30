<?php

namespace App\Http\Controllers\Admin;

use App\Domain;
use App\User;
use App\Http\Controllers\Controller;
use Facades\App\Helpers\Json;
use Illuminate\Http\Request;

class DomainsystemController extends Controller
{
    public function index()
    {
        $domains = Domain::orderBy('domain_name')
            ->get();
        foreach ($domains as $key => $domain) {
            $domains[$key]->user=$domain->user;
        }
        
        $result = compact('domains');   
        Json::dump($result);
        return view('admin.domains.index', $result);
    }
    
    public function detail(Domain $domain)
    {        
        $result = compact('domain');
        Json::dump($result);
        return view('admin.domains.detail', $result);
    }

    public function edit(Domain $domain)
    {
        $result = compact('domain');
        Json::dump($result);
        return view('admin.domains.edit', $result);
    }

    public function update(Request $request, Domain $domain)
    {
        // Validate $request
        $this->validate($request,[
            'active' => ':domains,active,' . $domain->id
        ]);

        // Update genre
        $domain->active = $request->active;
        $domain->save();

        // Flash a success message to the session
        session()->flash('success', 'The domain has been updated');
        // Redirect to the master page
        return redirect('admin/domains');
    }
    
    public function destroy(Domain $domain)
    {
        $domain->delete();
        session()->flash('success', "The user <b>$domain->domain_name</b> has been deleted");
        return redirect('admin/domains');
    }
}
