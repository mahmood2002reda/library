<?php

namespace App\Http\Controllers\Api;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::get();

        return response()->json(['data' => $books]);
    }

    public function show(string $id)
    {
        $book = Book::where('id', $id)->first();

        return response()->json(['data' => $book]);
    }

    public function destroy(string $id)
    {
        Book::destroy($id);
        return 'delete is done';
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return Response::json([
                'code' => 0,
                'message' => 'Invalid credentials',
            ], 401);
        }

        $device_name = $request->post('device_name', $request->userAgent());
        $token = $user->createToken($device_name);

        return Response::json([
            'token' => $token->plainTextToken,
            'user' => $user,
        ], 201);
    }
}