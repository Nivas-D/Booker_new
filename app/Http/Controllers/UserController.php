<?php
namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
//use App\Models\Role;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{
    public function __construct(){
        $this->authorizeResource(User::class);
    }
    public function index(User $model){
        $this->authorize('manage-users', User::class);
        return view('users.index', ['users' => $model->with('role')->get()]);
    }
    public function create(Role $model){
        return view('users.create', ['roles' => $model->get(['id', 'name'])]);
    }
    public function store(UserRequest $request, User $model){
        $model->create($request->merge([
            'picture' => $request->photo ? $request->photo->store('profile_user', 'public') : null,
            'password' => Hash::make($request->get('password'))
        ])->all());
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }
    public function edit(User $user, Role $model){
        return view('users.edit', ['user' => $user->load('role'), 'roles' => $model->get(['id', 'name'])]);
    }
    public function update(UserRequest $request, User $user){
        $hasPassword = $request->get("password");
        $user->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('profile_user', 'public') : $user->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([$hasPassword ? '' : 'password'])
        );
        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }
    public function destroy(User $user){
        if ($user->id == 1) {
            return abort(403);
        }
        $user->delete();
        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
