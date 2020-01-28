<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        $postCount=Post::count();
        $categoryCount=Category::count();
        $commentsCount=Comment::count();
        $userCount=User::count();

        return view('admin/index',compact('postCount','categoryCount','commentsCount','userCount'));
    }



}
