<?php

namespace Modules\Client\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Controller;
use Modules\Client\DTO\ClientDto;
use Modules\Client\Entities\Client;
use Modules\Client\Service\ClientService;
use Modules\Client\Validation\ClientValidation;

class ClientAuthController extends Controller
{
    use ClientValidation;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:client', ['except' => ['login', 'register', 'verifyOtp', 'forgetPassword', 'verifyForgetPassword', 'newPassword']]);
    }

    public function login(Request $request)
    {

        $credentials = $request->only(['email', 'password']);
        $credentials['is_active'] = 1;
        $validation = $this->validateLogin($credentials);
        if ($validation->fails()) return return_msg(
            false,
            'Validation Errors',
            ['validation_errors' => $validation->getMessageBag()],
            'validation_error'
        );
        if (!$token = auth('client')->attempt($credentials)) {
            return return_msg(false, 'Unauthorized', null, 'unauthorized');
        }
        // if (\auth('client')->user()['is_login'] == 1) {
        //     return return_msg(false,'this account is loggined from another device',null,'unauthorized');
        // }
        // Client::whereId(\auth('employee')->id())->update(['is_login'=>1]);
        return $this->respondWithToken($token);
    }

    public function register(Request $request, ClientService $clientService)
    {

        $data = $request->all();
        $validation = $this->validateStoreClient($data);
        if ($validation->fails()) return return_msg(
            false,
            'Validation Errors',
            ['validation_errors' => $validation->getMessageBag()],
            'validation_error'
        );
        $data = (new ClientDto($request))->dataFromRequest();
        $client = $clientService->save($data);
        return return_msg(true, 'Client Registered Successfully', $client);
    }


    public function me()
    {

        return return_msg(true, 'Logged User', auth('client')->user());
        //        return response()->json(auth()->user());
    }


    public function logout()
    {
        // Client::whereId(\auth('employee')->id())->update(['is_login'=>0]);
        auth('client')->logout();
        return return_msg(true, 'Successfully logged out');
        //        return response()->json(['message' => 'Successfully logged out']);
    }


    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token)
    {
        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('client')->factory()->getTTL() * 60,
            'client' => \auth('client')->user(),
        ];
        return return_msg(true, 'Authenticated User', $data);
    }
}
