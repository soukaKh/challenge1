<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
  public function __construct() {
    $this->middleware('auth', ['except' => ['login', 'register',     ]]);
  }
  /**
   * Attempt to register a new user to the API.
   *
   * @param Request $request
   * @return Response
   */
  public function register(Request $request)
  {
    // Are the proper fields present?
    $this->validate($request, [
      'name' => 'required|string',
      'email' => 'required|string',
      'password' => 'required|string',
    ]);
    try {
      $user = new User;
      $user->name = $request->input('name');
      $user->email = $request->input('email');
      $plainPassword = $request->input('password');
      $user->password = app('hash')->make($plainPassword);
      $user->save();
      return response()->json(['user' => $user, 'message' => 'CREATED'], 201);
    } catch (\Exception $e) {
      return response()->json(['status'=>'error','message'=>$e->getMessage()]);
  }
}
  /**
   * Attempt to authenticate the user and retrieve a JWT.
   * Note: The API is stateless. This method _only_ returns a JWT. There is not an
   * indicator that a user is logged in otherwise (no sessions).
   *
   * @param Request $request
   * @return Response
   */
  public function login(Request $request)
  {
   
       $email = $request->email;
      $password = $request->password;
       // Are the proper fields present?
    $this->validate($request, [
      'email' => 'required|string',
      'password' => 'required|string',
    ]);
    $credentials = request(['email', 'password']);

    if (! $token = auth()->attempt($credentials)) {
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    return $this->respondWithToken($token);;
} 
 /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
  /**
   * Log the user out (Invalidate the token). Requires a login to use as the
   * JWT in the Authorization header is what is invalidated
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function logout() {
    auth()->logout();
    return response()->json(['status'=>'logout','message'=>'logout']);
  }
  
  /**
   * Refresh the current token.
   *
   * @return \Illuminate\Http\JsonResponse
   */
  public function refresh() {
    return $this->respondWithToken( auth()->refresh() );
  }

  }