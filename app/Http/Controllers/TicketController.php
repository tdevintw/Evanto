<?php

namespace App\Http\Controllers;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

use App\Models\Ticket;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use App\Mail\TicketPdfEmail;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Retrieving $request_id from session
        $request_id = session('request_id');
        $request_user_id = session('request_user_id');
        $event_id = session('event_id');
        // Destroying $request_id from session
        session()->forget('request_id');
        session()->forget('request_user_id');
        session()->forget('event_id');

        $user = $request_user_id;
        $userEntity = User::find($user);
        $ticket =  Ticket::create([
            'user_id' => $user,
            'request_id' => $request_id
        ]);

        


        $event = Event::where('id',$event_id)->first();
        $event->tickets = $event->tickets - 1;
        $event->save();

        $pdfContent = $this->generatePdf($ticket);

        // Save PDF to storage
        $pdfPath = 'pdf/' . uniqid() . '.pdf';
        Storage::disk('public')->put($pdfPath, $pdfContent);

        // Update ticket record with PDF path
        $ticket->pdf = $pdfPath;
        $ticket->save();
        

        $data["email"] = $userEntity->email;
        $data["title"] = "From Evanto.com";
        $data["body"] = "content";
  
        $pdf = $pdfContent;
  
        Mail::send('content', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf, "ticket.pdf");
        });
  



            if($userEntity->role =='user'){
                return redirect()->route('profile.edit');
            }elseif($userEntity->role =='organizer'){
                return redirect()->route('reserve.index');
            }
    }
    private function generatePdf($ticket)
{
    $event = $ticket->request->event;

    

    // instantiate and use the dompdf class
    $options = new Options();
    $options->set('isRemoteEnabled', TRUE);
    $html = View::make('pdf',['ticket' => $ticket])->render();
    $dompdf = new Dompdf($options);

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A5', 'landscape');
        
      

    $dompdf->render();
    return $dompdf->output();



}

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTicketRequest $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
