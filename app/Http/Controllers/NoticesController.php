<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Provider;
use App\Notice;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class NoticesController extends Controller {


	//create noticecontroller instance
	public function __construct()
	{
		$this->middleware('auth');//used to verify if you are singed in
		parent::__construct();//for using $this->user
	}
	//show all notice
	public function index()
	{
		//return \Auth::user()->notices;
		//this will return json directly
		//return $this->user->notices;
		//$notices=$this->user->notices()->latest()->get();
		//or benig ordered in relation
		//$notices=$this->user->notices;
		//filter content_removed
		$notices=$this->user->notices()->where('content_removed',0)->get();
		return view('notices.index',compact('notices'));
		
	}
	//show page to create a new notice
	public function create()
	{
		//get list of providers
		$providers = Provider::lists('name', 'id');
		//load a view to create a new notice
		return view('notices.create', compact('providers'));
	}

	public function confirm(Requests\PrepareNoticeRequest $request)//, Guard $auth)
	{
		//get list of providers
		//load a view to create a new notice
		//return $request->all();
		$template = $this->compileDmcaTemplate($data = $request->all());//$auth);

		session()->put('dmca',$data);

		return view('notices.confirm', compact('template'));
	}

	public function compileDmcaTemplate($data)//, Guard $auth)
	{
		$data = $data + [
			//'name' => \Auth::user()->name,
			//'email' => $auth->user()->email
			'name' => $this->user->name,
			'email' => $this->user->email			
		];
		return view()->file(app_path('Http/Template/dmca.blade.php'),$data);
	}

	public function store(Request $request)
	{
		$notice = $this->createNotice($request);

		//fire of the mail.
		//\Mail::send();
		\Mail::queue(['html'=>'emails.dmca'],compact('notice'),function($message) use ($notice){
			$message->to($notice->getRecipientEmail())
					->from($notice->getOwnerEmail())
					->subject('DMCA Notice');
		});
		//event('DmcaWasCreated',$notices);
		//flash to session
		//laracast/flash
		flash("DMCA notices has been delivered!");
		
		return redirect('notices');
	}

	public function update($noticeId22, Request $request)
	{
		$isRemoved = $request->has('content_removed');

		Notice::findOrFail($noticeId22)
			->update(['content_removed'=>$isRemoved]);

		//return redirect()->back();			
	}

	public function createNotice($request)
	{
		//method1
		//$data = session()->get('dmca');
		//$notice = Notice::open($data)->useTemplate($request->input('template'));
		//\Auth::user()->notices()->save($notice);

		//method2
		$notice = session()->get('dmca')+['template' => $request->input('template')];
		//$notice = \Auth::user()->notices()->create($notice);
		$notice = $this->user->notices()->create($notice);		
		return $notice;
		
	}

}
