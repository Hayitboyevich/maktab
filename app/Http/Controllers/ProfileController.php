    <?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Image;
use Auth;
class ProfileController extends Controller
{
    public function profile()
    {
    	return view('profiles.profile');
    }

    public function profile_store(Request $request)
    {
    	$profile = new Profile;
    	$profile->name = $request->input('name');
    	$profile->designation = $request->input('designation');
    	$profile->user_id = Auth::user()->id;
    	if ($request->hasFile('profile_pic')) {
    		$file = $request->file('profile_pic');
    		$extension = $file->getClientOriginalExtension();
    		$filename =time().'.'.$extension;
    		$file->move('uploads/', $filename);
    		$profile->profile_pic =$filename;
        }
    	     	else{
    		return $request;
    		$profile->$image = '';
    	}

    	$profile->save();
    	return redirect('profile');

    	
     }
}
