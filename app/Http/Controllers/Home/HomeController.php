<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\User;
use App\Models\Questionnaire;
use App\Models\UserQuestionnaire;
use App\Models\UserRegistration;
use Alert;
use Auth;
use Carbon\Carbon;
use DB;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{

	public function index() {
		return view('home.index');
	}

	public function about() {
		return view('home.about');
	}

	public function profile() {
		$existingRegister = UserRegistration::where('user_id', Auth::id())->first();
		if($existingRegister) {
			$data['register'] = $existingRegister;
			return view('home.profile', $data);
		} else {
			return view('home.404');
		}
	}

	public function document($id) {
		$data['register'] = UserRegistration::find($id);
		return view('home.document', $data);
	}

	public function contact() {
		return view('home.contact');
	}

	public function studentRegistration() {
		if(Auth::user() != null) {
			$data['questionMotorik'] = Questionnaire::where('type', 'Motorik Anak')->get();
			$data['questionCalon'] = Questionnaire::where('type', 'Calon Murid')->get();
			return view('home.registration', $data);
		} else {
			alert()->error('Silahkan Login Dahulu');
			return redirect('sign-in');
		}
	}

	public function studentRegistrationSubmit(Request $request) {
		$answers = $request->only(['q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13','q14']);
		try {
			DB::beginTransaction();
			$registration = new UserRegistration;
			$registration->user_id = Auth::id();
			$registration->name = $request->name;
			$registration->place_of_birth = $request->place_of_birth;
			$registration->date_of_birth = $request->date_of_birth;
			$registration->gender = $request->gender;
			$registration->guardian_phone_number = $request->guardian_phone_number;
			$registration->address = $request->address;
			$registration->year = $request->year;
			$registration->class = $request->class;
			$registration->guardian_name = Auth::user()->name;
			if ($request->hasFile('child_photo')) {
				$child_photo = $request->file('child_photo');
				$child_photo_name = $request->file('child_photo')->getClientOriginalName();
				$child_photo->move('uploads/images', $child_photo_name);
				$registration->child_photo = $child_photo_name;
			}
			$registration->save();

			$i = 0;
			foreach ($answers as $item) {
				$userQuestioner = new UserQuestionnaire;
				$userQuestioner->user_id = Auth::id();
				$userQuestioner->question_id = $i + 1;
				$userQuestioner->answer = $item;
				$userQuestioner->save();
				$i += 1; // Increment $i by 1 for each iteration
			}

			DB::commit();
			alert()->success('Pendaftaran Berhasil, Menunggu Konfirmasi Admin');
			return redirect('/');
		} catch(Exception $e) {
			DB::rollback();
			alert()->error($e);
			return redirect()->back();
		}
		
	}

	public function userRegisterSubmit(Request $request) {
		$existingUser = User::where('email', $request->email)->first();
		if($existingUser) {
			alert()->error('Akun sudah terdaftar');
			return redirect()->back();
		} else {
			$user = new User;
			$user->name = $request->name;
			$user->email = $request->email;
			$user->role = 'user';
			$user->password = bcrypt($request->password);
			$user->save();
			alert()->success('Akun berhasil dibuat');
			return redirect('sign-in');
		}
	}

	public function loginPage() {
		return view('home.login');
	}

	public function registerPage() {
		return view('home.register');
	}

	public function userLogin(Request $request) {
		$request->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);   
        $email = $request->get('email');
        $credentials = $request->only('email', 'password');
        $user = User::where('email', $email)->first();
        if (auth()->guard('web')->attempt($credentials) && $user->role == 'user') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Sukses Login');
            return redirect('/');
        } 
        else if (auth()->guard('web')->attempt($credentials) && $user->role == 'admin') {
            session(["email" => $email]);
            session(["role" => $user->role]);
            alert()->success('Sukses Login');
            return redirect('/admin');

        } else {
            alert()->error('Wrong email or password!' );
            return redirect('/sign-in');
        }
	}

	public function userLogout() {
        session()->flush();
        Auth::logout();
        return redirect('/');
    }

}

