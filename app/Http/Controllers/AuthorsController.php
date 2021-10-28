<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Resources\AuthorsResource;
use App\Http\Requests\AuthorsRequest;

class AuthorsController extends Controller
{
    public function showAuthors() {
        return AuthorsResource::collection(Author::all());
    }

    public function showAuthor(Author $author) {
        return new AuthorsResource($author);
    }

    public function createAuthor(AuthorsRequest $request) {
        $author = Author::create([
            "name" => $request->input("name"),
            "age" => $request->input("age")
        ]);

        return new AuthorsResource($author);
    }

    public function updateAuthor(AuthorsRequest $request, Author $author) {
        $author->update([
            "name" => $request->input("name"),
            "age" => $request->input("age")
        ]);

        return new AuthorsResource($author);
    }

    public function deleteAuthor(Author $author) {
        $author->delete();
        return "Author deleted successfully";
    }
}
