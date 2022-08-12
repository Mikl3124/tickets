<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\CommentEmailNotification;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    use MediaUploadingTrait;

    public function __construct()
    {
      $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $user = Auth::user();
      $categories = Category::all();
      $user->load('sites');

      return view('tickets.create', compact('categories', 'user'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $user = Auth::user();

        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
        ]);

        $request->request->add([
            'status_id'     => 1,
            'priority_id'   => 1,
            'author_id'     => $user->id,
        ]);

        $ticket = Ticket::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $ticket->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('attachments');
        }

        return redirect()->back()->withStatus('Your ticket has been submitted, we will be in touch. You can view ticket status <a href="'.route('tickets.show', $ticket->id).'">here</a>');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $ticket->load('comments');

        return view('tickets.show', compact('ticket'));
    }

    public function storeComment(Request $request, Ticket $ticket)
    {
        $request->validate([
            'comment_text' => 'required'
        ]);

        $comment = $ticket->comments()->create([
            'author_name'   => $ticket->author_name,
            'author_email'  => $ticket->author_email,
            'comment_text'  => $request->comment_text
        ]);

        $ticket->sendCommentNotification($comment);

        return redirect()->back()->withStatus('Your comment added successfully');
    }
}
